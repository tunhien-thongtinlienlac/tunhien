<?php
namespace App\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    private $data;

    public function __construct($data = null){
        $this->data = $data;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.sendmail')
        	->with(['data' => $this->data])
            ->to('congminh699669@gmail.com')
            ->from('phukiendienthoaingonbore@gmail.com')
            ->subject('Hello');
    }
    //nreoxzqhnqvxxqwe
}