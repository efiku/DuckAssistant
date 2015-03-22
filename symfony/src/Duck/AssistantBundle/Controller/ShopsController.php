<?php

namespace Duck\AssistantBundle\Controller;

use Duck\AssistantBundle\Form\ShopsType;
use Duck\AssistantBundle\Interfaces\ContrInterfaces;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Duck\AssistantBundle\Entity\Shops;

class ShopsController extends  Controller implements ContrInterfaces
{

    public function createNewItem(){
        return new Shops();
    }

    public function createFormType(){
        return new ShopsType();
    }

    public function getDoctrimeManager(){
        return $this->getDoctrine()->getManager();
    }
    public function indexAction()
    {
        return $this->render( 'DuckAssistantBundle:Shop:index.html.twig',  array(
            'list' =>  $this->get('duck_assistantbundle.lists.listprovider')->getProvidersAll('DuckAssistantBundle:Shops')
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

            return $this->redirectToRoute('duck_assistantBundle_Shop_index');
        }

        return $this->render( 'DuckAssistantBundle:Shop:form.html.twig' , array(
            'form' => $form->createView()
        ));
    }

    public function editAction(Request $request, Shops $shops)
    {
        $form = $this->createForm( $this->createFormType(), $shops);

        if($form->handleRequest($request)->isValid()){

            $this->getDoctrimeManager()->flush();
            return $this->redirectToRoute('duck_assistantBundle_Shop_index');
        }

        return $this->render('DuckAssistantBundle:Shop:form.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function delAction( Shops $shops)
    {
        if( null == $shops){
            throw $this->createNotFoundException();
        }

        $this->getDoctrimeManager()->remove($shops);
        $this->getDoctrimeManager()->flush();

        return $this->redirectToRoute('duck_assistantBundle_Shop_index');
    }


}
