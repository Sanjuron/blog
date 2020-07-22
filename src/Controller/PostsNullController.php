<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class PostsNullController extends AbstractController
{
    /**
     * @Route("/postsnull")
    */
    public function number(): Response
    {
        $number = random_int(0, 100);

        return new Response(
            '<html><body><h1>Posts sans catégories et tags</h1></html>'
        );
    }
}