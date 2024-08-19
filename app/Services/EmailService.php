<?php

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailService
{
    protected $mailer;

    public function __construct(PHPMailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendEmail($to, $subject, $body)
    {
        try {
            // Configura il server SMTP
            $this->mailer->isSMTP();
            $this->mailer->Host       = 'smtp.mailtrap.io'; // Cambia con il tuo host SMTP
            $this->mailer->SMTPAuth   = true;
            $this->mailer->Username   = 'your_username'; // Cambia con il tuo username SMTP
            $this->mailer->Password   = 'your_password'; // Cambia con la tua password SMTP
            $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $this->mailer->Port       = 2525; // Cambia con la tua porta SMTP

            // Imposta l'email da inviare
            $this->mailer->setFrom('noreply@example.com', 'Example');
            $this->mailer->addAddress($to);
            $this->mailer->isHTML(true);
            $this->mailer->Subject = $subject; // Usa la proprietà direttamente
            $this->mailer->Body    = $body;    // Usa la proprietà direttamente

            // Invia l'email
            $this->mailer->send();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
