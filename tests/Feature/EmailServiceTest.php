<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\EmailService;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Config;

class EmailServiceTest extends TestCase
{
    protected $emailService;

    protected function setUp(): void
    {
        parent::setUp();

        // Configura l'email service con PHPMailer reale
        $this->emailService = new EmailService(new PHPMailer());
    }

    public function test_send_email()
    {
        // Chiama il metodo di invio email
        $result = $this->emailService->sendEmail('test@example.com', 'Test Subject', 'This is a test email.');

        // Verifica che l'email sia stata inviata correttamente
        $this->assertTrue($result);

        // Aggiungi ulteriori assert se necessario per verificare che l'email
        // abbia le intestazioni corrette, il corpo, ecc.
        // test
         // test
    }
}
