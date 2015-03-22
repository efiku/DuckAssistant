<?php

namespace  Duck\AssistantBundle\Controller;

use Duck\AssistantBundle\Entity\Category;
use Duck\AssistantBundle\Form\CategoryType;
use Duck\AssistantBundle\Interfaces\ContrInterfaces;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoryController extends Controller implements  ContrInterfaces
{
    public function createNewItem(){
        return new Category();
    }

    public function createFormType(){
        return new CategoryType();
    }

    public function getDoctrimeManager(){
        return $this->getDoctrine()->getManager();
    }


    public function indexAction()
    {
        return $this->render('DuckAssistantBundle:categories:index.html.twig', array(
            'list'  => $this->get('duck_assistantbundle.lists.listprovider')->getProviderLists('DuckAssistantBundle:Category')
        ));
    }

    public function addAction(Request $request )
    {
        $form = $this->createForm($this->createFormType(),$this->createNewItem() );

        if($form->handleRequest($request)->isValid())
        {
            $entity = $form->getData();
            $this->getDoctrimeManager()->persist($entity);
            $this->getDoctrimeManager()->flush();

            return $this->redirectToRoute('duck_assistantBundle_cat_Lists');
        }

        return $this->render( 'DuckAssistantBundle:categories:form.html.twig' , array(
            'form' => $form->createView()
        ));
    }

    public function editAction(Request $request, Category $category)
    {
        $form = $this->createForm( $this->createFormType(), $category);

        if($form->handleRequest($request)->isValid()){

            $this->getDoctrimeManager()->flush();
            return $this->redirectToRoute('duck_assistantBundle_cat_Lists');
        }

        return $this->render('DuckAssistantBundle:categories:form.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function deleteAction(Category $category)
    {
        if( null == $category){
            throw $this->createNotFoundException();
        }

        $this->getDoctrimeManager()->remove($category);
        $this->getDoctrimeManager()->flush();

        return $this->redirectToRoute('duck_assistantBundle_cat_Lists');
    }
}
