<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Users;
use function Couchbase\defaultDecoder;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticate(Request $request)
    {
        $login = $request->input('staff');
//        dd($login);
        if (Auth::attempt(array('staff_id' => $login['id'], 'password' => $login['password']))) {
            // 认证通过...
            return redirect('api/info/index');
        } else {
            return redirect('login');
        }
    }

    public function staffauthenticate(Request $request)
    {
        $login = $request->input('staff');
//        dd($login);
//        $info = Users::where('staff_id', '=', $login['id'])->select('password')->get();
////        dd($info);
//        if (Hash::check($login['password'],$info)) {
//            // 认证通过...
//            $staff = Users::find($login['staff_id'])->get();
//            return view('api/staff/index', [
//                'info' => $staff,
//            ]);
//        } else {
//            return redirect('stafflogin');
//        }

        if (Auth::guard('staff')->attempt(['staff_id' => $login['id'], 'password' => $login['password']]))
        {
            $id = DB::table('user')->where('staff_id','=',$login['id'])->value('id');
//            dd($id);
            $info = Users::find($id);
//            dd($info);
            return view('staff/index', [
                'info' => $info,
            ]);
        } else {
            return view('stafflogin');
        }
    }

}
