<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    // use AuthenticatesUsers;

    /**
     * Where to redirect admins after login
     * 
     * @var string
     */

     protected $redirectTo = '/admin';

     /**
      * create a new controller instance
      * @return void
      */

      public function __construct()
      {
        $this->middleware('guest:admin')->except('logout');
      }

      /**
       * 
       * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
       * 
       * 
       */

       public function showLoginForm()
       {
        return view('admin.auth.login');
       }

       /**
        * @param Request $request
        * @return \Illuminate\Http\RedirectResponse
        * @throws \Illuminate\Validation\ValidationException
        * 
        */

        public function login(Request $request)
        {
            // dd($request->_token);
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required|min:6'
            ]);

            if(Auth::guard('admin')->attempt([
                'email' => $request->email,
                'password' => $request->password
            ], $request->get('remember'))){
                return redirect()->intended(route('admin.dashboard'));
            }
            return back()->withInput($request->only('email', 'remember'));
        }

        /**
         * 
         * @param Request $request
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         * 
         */

         public function logout(Request $request)
         {
            Auth::guard('admin')->logout();
            $request->session()->invalidate();
            return redirect()->route('admin.login');
         }
}
