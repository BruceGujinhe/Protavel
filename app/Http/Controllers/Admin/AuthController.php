<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Validator;

class AuthController extends Controller
{
    /**
     * construct
     */
    public function __construct()
    {
        $this->middleware('auth.admin', ['only' => ['getLogOut']]);
        $this->middleware('guest.admin', ['only' => ['getLogIn', 'postLogIn']]);
    }

    /**
     * 登入
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogIn()
    {
        return view('admin.auth.log-in');
    }

    /**
     * 登入
     *
     * @return Redirect
     */
    public function postLogIn(Request $request)
    {
        $this->validate($request, [
            'username'      =>  'required|string',
            'password'      =>  'required|string',
        ]);

        $usernameField = 'username';
        $validator  = Validator::make($request->only('username'), [
            'username'      =>  'email',
        ]);
        if ($validator->fails()) {
            $usernameField = 'username';
        } else {
            $usernameField = 'email';
        }

        if (Auth::admin()->attempt([$usernameField => $request->username, 'password' => $request->password])) {
            return redirect()->to('admin');
        } else {
            dd($usernameField, $request->username, $request->password);
            return back()->withInput()->withErrors(['fail' => trans('dashboard.The email or password is incorrect')]);
        }
    }

    /**
     * 登出
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getLogOut()
    {
        Auth::admin()->logout();
        return redirect()->to('admin');
    }
}
