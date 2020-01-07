<?php

namespace App\Controller\Front;

use App\Repository\UserRepository;
use App\Service\NotificationService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user", name="user_")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function show(UserRepository $userRepository, NotificationService $notification): Response
    {
        //$notification->create("message de la notification");
        $this->addFlash('green', 'message du flash message');

        return $this->render('front/user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }
}
