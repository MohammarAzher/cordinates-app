<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

//    use AuthenticatesUsers;

    public function login(request $request){
        $creds = $request->only('email','password');
        if(Auth::guard('web')->attempt($creds)){


            $user = Auth::user();

            // Example: Check if the user has the 'admin' role
            if ($user->name == 'admin') {
                $msg = [
                    'success' => 'Login Successfully',
                    'redirect' => route('home')
                ];
            }else{
                Auth::guard('web')->logout();
                $msg = [
                    'error' => 'You Do Not Have Access!',
                ];
            }

            return response()->json($msg);
    }
    else{
        $msg = [
            'error' => 'Credentials Invalid..!',

        ];
        return response()->json($msg);
    }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        $msg = [
            'success' => 'Logout Successfully',
            'redirect' => route('login')
        ];
        return response()->json($msg);
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
