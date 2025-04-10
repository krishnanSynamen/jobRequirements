<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Login $request)
    {
        $requestData = $request->validated();

        if (Auth::attempt($requestData)) {
            return redirect('/applicationData');
            print_r(Auth::user());exit;
        }

        return back()->withErrors(['password' => 'Invalid User Name Or Password']);
        print_r($requestData);
    }
}
