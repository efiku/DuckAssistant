<?php

namespace  Duck\AssistantBundle\Controller;

use Duck\AssistantBundle\Entity\Product;
use Duck\AssistantBundle\Form\ProductType;
use Duck\AssistantBundle\Interfaces\ContrInterfaces;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller implements  ContrInterfaces
{
    public function createNewItem(){
        return new Product();
    }

    public function createFormType(){
        return new ProductType();
    }

    public function getDoctrimeManager(){
        return $this->getDoctrine()->getManager();
    }


    public function indexAction()
    {
        return $this->render('DuckAssistantBundle:Product:index.html.twig', array(
            'list'  => $this->get('duck_assistantbundle.lists.listprovider')->getProviderLists('DuckAssistantBundle:Product')
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

            return $this->redirectToRoute('duck_assistantBundle_Product_index');
        }

        return $this->render( 'DuckAssistantBundle:Product:form.html.twig' , array(
            'form' => $form->createView()
        ));
    }

    public function editAction(Request $request, Product $category)
    {
        $form = $this->createForm( $this->createFormType(), $category);

        if($form->handleRequest($request)->isValid()){

            $this->getDoctrimeManager()->flush();
            return $this->redirectToRoute('duck_assistantBundle_Product_index');
        }

        return $this->render('DuckAssistantBundle:Product:form.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function deleteAction(Product $product)
    {
        if( null == $product){
            throw $this->createNotFoundException();
        }

        $this->getDoctrimeManager()->remove($product);
        $this->getDoctrimeManager()->flush();

        return $this->redirectToRoute('duck_assistantBundle_Product_index');
    }
}
