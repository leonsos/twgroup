<?php

namespace App\Jobs;

use App\Mail\SendMailable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
     protected $mails;
    public function __construct($mails)
    {
        $this->mails=$mails;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email =new SendMailable($this->mails);
        Mail::to('test@yahoo.com')->send($email);
        //Mail::to('test@yahoo.com')->send(new SendMailable( $this->mails));
    }
}
