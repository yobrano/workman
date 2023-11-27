<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    public function redirectTo()
    {
        $usr = Auth::user();
        // Log::info('User logged-in:'.$usr->id);

        // $log = [];
        // $log['url'] = $request->fullUrl();
        // $log['method'] = $request->method();
        // $log['ip'] = $request->ip();
        // $log['agent'] = $request->header('user-agent');
        // $log['user_id'] = auth()->check() ? auth()->user()->id : 1;
        activity()
            // ->withProperties(['customProperty' => 'customValue'])
            ->log('User Logged-in:' . $usr->name);

        // if (is_null($usr->email_verified_at) && $usr->role == 'clerk') {
        //     Auth::logout();
        //     return '/login';
        // }
        // if (is_null($usr->email_verified_at) && $usr->role == 'admin' && $usr->approved == 0) {
        //     Auth::logout();
        //     return '/login';
        // }
        $role = $usr->role;
        switch ($role) {
            case 'worker':
                $worker_session_id = Session::get('worker_session_id');
                if (empty($worker_session_id)) {
                    $worker_session_id = Str::random(40);
                    Session::put('worker_session_id', $worker_session_id);
                }
                return '/worker';
                break;
            case 'admin':
                $admin_session_id = Session::get('admin_session_id');
                if (empty($admin_session_id)) {
                    $admin_session_id = Str::random(40);
                    Session::put('admin_session_id', $admin_session_id);
                }
                return '/admin';
                break;
         
            default:
                $customer_session_id = Session::get('customer_session_id');
                if (empty($customer_session_id)) {
                    $customer_session_id = Str::random(40);
                    Session::put('customer_session_id', $customer_session_id);
                }
                return '/cust';
                break;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $usr = Auth::user();
        // Log::info('User logged-out:'.$usr->id);
        // $log = [];
        // $log['url'] = $request->fullUrl();
        // $log['method'] = $request->method();
        // $log['ip'] = $request->ip();
        // $log['agent'] = $request->header('user-agent');
        // $log['user_id'] = auth()->check() ? auth()->user()->id : 1;
        activity()
            // ->withProperties(['customProperty' => 'customValue'])
            ->log('User Logged-out:' . $usr->name);


        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
