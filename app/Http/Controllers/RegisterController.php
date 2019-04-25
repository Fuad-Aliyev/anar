<?php
/**
 * Created by PhpStorm.
 * User: Fuad
 * Date: 4/23/2019
 * Time: 1:25 PM
 */

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use App\Register;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class RegisterController extends Controller
{
    public function index() {
        return view('home');
    }

    public function store(Request $request) {
        $this->validate($request, [
           'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = new Register();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        
        $data = DB::select('select id from registers where email=?', [$user->email]);
        $user_id = $data[0]->id;

        Session::put('door', 'open');
        Session::put('user', $user_id);

        $fulname = $request->name . ' ' . $request->surname;
        $data = array(
            'fulname' => $fulname
        );
        Mail::to($user->email)->send(new SendMail($data));


        return redirect('/home');
    }

    public function logs(Request $request) {
        $this->validate($request, [
             'password' => 'required',
             'email' => 'required|email'
         ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $data = DB::select('select id from registers where email=? and password=?', [$email, $password]);
        $user_id = $data[0]->id;

        if (count($data)) {
            Session::put('door', 'open');
            Session::put('user', $user_id);
            return redirect('/home');

        } else {
            echo "please enter correct email and password";
        }

    }

    public function logout() {
       
        Session::remove('door');
        Session::remove('user');

        return redirect('/');
    }
}
