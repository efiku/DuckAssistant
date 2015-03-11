<?php

namespace  Duck\AssistantBundle\Controller;

use Duck\AssistantBundle\Entity\Category;
use Duck\AssistantBundle\Forms\CategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends Controller
{
  /* Main Route / for prefix /cat */
    public function indexAction()
    {
        $EN = $this->getDoctrine()->getManager();

        $repo = $EN->getRepository('DuckAssistantBundle:Category');

        $categories = $repo->findAll();


        return $this->render('DuckAssistantBundle:categories:index.html.twig', array(
            'categories' =>  $categories
        ));
    }

    /* Route /add for prefix /cat */
    public function addAction( Request $request){
        $category = new Category();
        $form = $this->createForm( new CategoryType(), $category);

        if($form->handleRequest($request)->isValid())
        {
            $entityMenager = $this->getDoctrine()->getManager();
            $entityMenager->persist($category);
            $entityMenager->flush();
            return $this->redirectToRoute('listCategory');
        }


        return $this->render('DuckAssistantBundle:categories:category_mod.html.twig', array(
            'form' => $form->createView()

        ));
    }

    /* Route /edit/id for prefix /cat */
    public function editAction( Category $category, Request $request ) {

         $form = $this->createForm( new CategoryType(), $category);
        if($form->handleRequest($request)->isValid())
        {
         $entityMenager = $this->getDoctrine()->getManager();
         $entityMenager->flush();
            return $this->redirectToRoute('listCategory');
        }
        return $this->render('DuckAssistantBundle:categories:category_mod.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }


    //TODO: Delete category

}