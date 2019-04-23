<?php
/**
 * Created by PhpStorm.
 * User: Fuad
 * Date: 4/23/2019
 * Time: 1:25 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Register;
use Illuminate\Support\Facades\DB;


class RegisterController extends Controller
{
    public function store(Request $request) {
        $user = new Register();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return redirect('/welcome');
    }

    public function logs(Request $request) {
        $email = $request->input('email');
        $password = $request->input('password');

        $data = DB::select('select id from registers where email=? and password=?', [$email, $password]);

        if (count($data)) {
            echo 'successful';
        } else {
            echo "please enter correct email and password";
        }

    }
}
