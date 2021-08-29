<?php

namespace App\Controller;

use App\Entity\ListEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ToDoListController extends AbstractController
{
    /**
     * @Route("/list", name="to_do_list")
     */
    public function index(): Response
    {
        $list = $this->getDoctrine()->getRepository(ListEntity::class)->findAll();
        return $this->render('to_do_list/index.html.twig', [
            'list' => $list,
        ]);
    }
}
