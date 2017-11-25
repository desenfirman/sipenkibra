<?php

namespace SIPENKIBRA\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{

    use AuthenticatesUsers;
    protected $redirectTo = '/';

    /**
     * Redirect to specific page if authenticate
     *
     * @return http redirect
     */
    public function index()
    {
        $authenticate_user = Auth::user();
        if ($authenticate_user == null) {
            return view('auth.login');
        }else{
            if ($authenticate_user->role == 0) {
                return redirect('/panitia');
            }
            if ($authenticate_user->role == 1) {
                return redirect('/juri');
            }
            if ($authenticate_user->role == 2) {
                return redirect('/regu_peserta');
            }
        }
    }

    /**
     * Login use 'username field instead email'
     *
     * @return 'username'
     */
    public function username()
    {
        return 'username';
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }
        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }

}
