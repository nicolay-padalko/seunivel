<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class RespostasMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->view('emails.respostas')
                    ->with([
                        'userName' => $this->data['userName'],
                        'multipleOption' => $this->data['multipleOption'],
                        'reading' => $this->data['reading'],
                        'write' => $this->data['write'],
                    ]);
    }
}
