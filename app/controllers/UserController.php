<?php
/**
 * Created by PhpStorm.
 * User: Jack
 * Date: 4/28/14
 * Time: 2:00 AM
 */

class UserController extends BaseController {

    public function showRegistration() {
        return View::make("register");
    }

    public function createUser() {
        $rules = array(
            'firstname'=>'required|alpha|min:2',
            'lastname'=>'required|alpha|min:2',
            'email'=>'required|email|unique:users',
            'password'=>'required|alpha_num|between:6,12|confirmed',
            'password_confirmation'=>'required|alpha_num|between:6,12'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes()) {
            // validation has passed, save user in DB
            $user = new User;
            $user->firstname = Input::get('firstname');
            $user->lastname = Input::get('lastname');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->save();

            return Redirect::to('users/login')
                ->with('message', 'You registered successfully.');
        } else {
            // validation has failed, display error messages
            return Redirect::to('users/register')
                ->with('message', 'The following errors occurred')
                ->withErrors($validator)->withInput();
        }
    }

    public function showLogin() {
        return View::make("login");
    }

    public function login() {
        if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
            return Redirect::to('restaurants');
        } else {
            return Redirect::to('users/login')
                ->with('error', 'Your username/password combination was incorrect.')
                ->withInput();
        }
    }

    public function logout() {
        Auth::logout();
        return Redirect::to("users/login");
    }

} 