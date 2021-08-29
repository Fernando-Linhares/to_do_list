<?php

namespace App\Controller;

use App\Entity\ListEntity;
use DateTimeImmutable;
use DateTimeZone;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ToDoListController extends AbstractController
{
    /**
     * @Route("/list", name="list")
     */
    public function index(): Response
    {
        $list = $this->getDoctrine()->getRepository(ListEntity::class)->findAll();
        return $this->render('to_do_list/index.html.twig', [
            'list' => $list,
        ]);
    }

    /**
     * @Route("/form", name="form")
     */
    public function show()
    {
        return $this->render('to_do_list/form.html.twig');
    }

    /**
     * @Route("/add", name="add", methods="POST")
     */
    public function addItem(Request $request)
    {
        try{
            $requestdata = $request->request->all();
            $manager = $this->getDoctrine()->getManager();
            $list = new  ListEntity;
            $list->setTitle($requestdata['title']);
            $list->setContent($requestdata['content']);
            $list->setUpdatedAt(new DateTimeImmutable('now',new  DateTimeZone('America/Bahia')));
            $list->setCreatedAt(new DateTimeImmutable('now',new  DateTimeZone('America/Bahia')));
            $manager->persist($list);
            $manager->flush();
            return $this->redirectToRoute('list');
        }catch(Exception $exception){
            $this->addFlash('error', $exception->getMessage());
            return $this->redirectToRoute('list');

        }
    }
}
