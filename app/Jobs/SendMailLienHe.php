<?php

namespace App\Jobs;

use App\Mail\SendMailLienHe as MailSendMailLienHe;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailLienHe implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $dataMail;

    public function __construct($dataMail)
    {
        $this->dataMail = $dataMail;
    }

    public function handle()
    {
        Mail::to($this->dataMail['email'])->send(new MailSendMailLienHe($this->dataMail));
    }
}
