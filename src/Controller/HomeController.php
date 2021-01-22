<?php

namespace App\Controller;
use App\services\Fetcher;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Fetcher $fetcher): Response
    {
        $data = $fetcher->get();

        return $this->render('home/index.html.twig', [
            "data" => $data
        ]);
    }
}
