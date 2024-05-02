<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller {

    // this method will show login page for customer
    public function index() {
        return view("login");
    }
    // this method will authenticate the user
    public function authenticate(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validator->passes()) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route("home");
            } else {
                return redirect()->route("acocount.login")->with("Either email or password incorrect");
            }
        } else {
            return redirect()->route("acocount.login")->withInput()->withErrors($validator);
        }
    }

    // This method will show register page
    public function register() {
        return view("register");
    }
}
