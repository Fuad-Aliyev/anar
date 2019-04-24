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
            'email' => 'required|email'
        ]);
        $user = new Register();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        Session::put('door', 'open');

        $fulname = $request->name . ' ' . $request->surname;
        $data = array(
            'fulname' => $fulname
        );
        Mail::to($user->email)->send(new SendMail($data));


        return redirect('/home');
    }

    public function logs(Request $request) {
        $email = $request->input('email');
        $password = $request->input('password');

        $data = DB::select('select id from registers where email=? and password=?', [$email, $password]);

        if (count($data)) {
            return redirect('/home');
        } else {
            echo "please enter correct email and password";
        }

    }
}
