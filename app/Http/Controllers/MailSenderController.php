<?php
/**
 * Created by PhpStorm.
 * User: Fuad
 * Date: 4/24/2019
 * Time: 6:12 AM
 */

namespace App\Http\Controllers;

use App\Mail\MultipleMail;
use App\Mail\SendMail;
use function foo\func;
use Illuminate\Http\Request;
use App\Client;
use App\Jobs\MultipleMail as Mmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Object_;

class MailSenderController extends Controller
{
    public function save(Request $request) {
       $this->validate($request, [
           'receivers' => 'required',
           'date' => 'required',
           'time' => 'required',
           'email_body' => 'required'
       ]);

        $client = new Client();
        $client_emails = str_replace(' ', '', $request->receivers);
        $client_emails = explode(',', $request->receivers);
        $date = $request->date;
        $content = $request->email_body;

        $data = DB::select('select * from registers');
        $obj = array();

        foreach($data as $value) {
            $value = (array) $value;
            $obj[$value['email']] = $value['id'];
        }



        foreach ($client_emails as $client_email) {
            $client_email = str_replace(' ', '', $client_email);
            $client  = new Client();
            $client->date = $date;
            $client->content = $content;
            $client->fk_user = $obj[$client_email];
            $client->save();
        }

        mMail::dispatch($client_emails)->delay(now()->addDays(7));

        return back();
    }
}
