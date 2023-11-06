<?php

namespace App\EventListener;

use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class UserCreatedListener implements EventSubscriberInterface
{
    private MailerInterface $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            BeforeEntityPersistedEvent::class => 'onUserCreated',
        ];
    }

    public function onUserCreated(BeforeEntityPersistedEvent $event): void
    {
        $user = $event->getEntityInstance();
        $password = $user->getPassword();
        $mail = $user->getEmail();
        $email = (new TemplatedEmail())
            ->from('g-parrot@contact.fr')
            ->to($user->getEmail())
            ->subject('Monsieur parrot vous à créer un compte')
            // ->text('Voici vos identifiants de connexion : Votre mail : ' . $user->getEmail() . ' Votre mot de passe : ' . $user->getpassword());
            // ->html('<h1>voici vos identifiants et mot de passe de connexion</h1><p>Votre email : </p>' . $user->getEmail() . '<p>votre mot de passe : </p>' . $user->getpassword());
            ->htmlTemplate('_partials/_mail.html.twig')
            ->context([
                'user' => $user,
                'mail' => $mail,
                'password' => $password
            ]);

            

        $this->mailer->send($email);
    }
}