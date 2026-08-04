<?php

namespace App\Mail;

use App\Models\requeteCm\CmRequestValidationModel;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CmRequestValidatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $validation;

    public function __construct(CmRequestValidationModel $validation)
    {
        $this->validation = $validation;
    }

    public function build()
    {
        $subject = $this->validation->decision === 'validee'
            ? 'Votre requête a été validée'
            : 'Votre requête a été refusée';

        return $this->subject($subject)
                    ->view('emails.cm-request-validated')
                    ->with([
                        'validation' => $this->validation,
                        'decision' => $this->validation->decision,
                    ]);
    }

    
}