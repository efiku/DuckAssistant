<?php

namespace  Duck\AssistantBundle\Controller;

use Duck\AssistantBundle\Entity\Price;
use Duck\AssistantBundle\Form\PriceType;
use Duck\AssistantBundle\Interfaces\ContrInterfaces;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PriceController extends Controller implements  ContrInterfaces
{
    public function createNewItem(){
        return new Price();
    }

    public function createFormType(){
        return new PriceType();
    }

    public function getDoctrimeManager(){
        return $this->getDoctrine()->getManager();
    }


    public function indexAction()
    {
        return $this->render('DuckAssistantBundle:Price:index.html.twig', array(
            'list'  => $this->get('duck_assistantbundle.lists.listprovider')->getProvidersAll('DuckAssistantBundle:Price')
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

            return $this->redirectToRoute('duck_assistantBundle_Price_index');
        }

        return $this->render( 'DuckAssistantBundle:Price:form.html.twig' , array(
            'form' => $form->createView()
        ));
    }

    public function editAction(Request $request, Price $price)
    {
        $form = $this->createForm( $this->createFormType(), $price);

        if($form->handleRequest($request)->isValid()){

            $this->getDoctrimeManager()->flush();
            return $this->redirectToRoute('duck_assistantBundle_Price_index');
        }

        return $this->render('DuckAssistantBundle:Price:form.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function deleteAction(Price $price)
    {
        if( null == $price){
            throw $this->createNotFoundException();
        }

        $this->getDoctrimeManager()->remove($price);
        $this->getDoctrimeManager()->flush();

        return $this->redirectToRoute('duck_assistantBundle_Price_index');
    }
}
