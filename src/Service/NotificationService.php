<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

class NotificationService
{
    /**
     * @var MailerInterface $mailer
     */
    private $mailer;

    /**
     * @var EntityManagerInterface $manager
     */
    private $manager;

    public function __construct(MailerInterface $mailer, EntityManagerInterface $manager)
    {
        $this->mailer = $mailer;
        $this->manager = $manager;
    }

    public function create($text, $type = "success")
    {
        $email = (new TemplatedEmail())
            ->from('amorin@vetixy.com')
            ->to('amorin@vetixy.com')
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->htmlTemplate('emails/notification.html.twig')
            ->context([
                'text' => $text,
            ])
        ;

        $sentEmail = $this->mailer->send($email);
    }
}