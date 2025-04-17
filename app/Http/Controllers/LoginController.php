<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login;
use App\Http\Requests\Register;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Login $request) {

        $requestData = $request->validated();

        if (Auth::attempt($requestData)) {

            if ($request->session()->has('jobId')) {
                return redirect('/user/selectedJob/'.session('jobId'));
            }

            return redirect('/');
        }

        return back()->withErrors(['password' => 'Invalid User Name Or Password']);

    }

    public function register(Register $request) {
        $requestData = $request->validated();
        $requestData['role'] = 'Candidate';

        User::create($requestData);
        return redirect('/user/login')->with('success', 'User Registered SuccessFully');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->flush();
        return redirect('/')->with('success', 'logout SuccessFully');
    }
}
