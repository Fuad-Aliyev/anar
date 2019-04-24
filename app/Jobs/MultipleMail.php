<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\MultipleMail as Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;    

class MultipleMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $emails;
    /**
     * Create a new job instance.
     *
     * @return void
     */

     
    public function __construct($emails)
    {
        //
        $this->emails = $emails;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $data = "true";
        $emails = $this->emails;
        foreach($emails as $email) {
            $email = str_replace(' ', '', $email);
            Mail::to($email)->send(new Mailer($data));
        }
    }
}
