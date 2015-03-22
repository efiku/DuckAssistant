<?php

namespace Duck\AssistantBundle\Controller;

use Duck\AssistantBundle\Form\ProductType;
use Symfony\Component\HttpFoundation\Request;
use Duck\AssistantBundle\Entity\Product;

class ProductController extends BaseController
{

    public function createNewItem(){
        return new Product();
    }

    public function createFormType(){
        return new ProductType();
    }

    public function indexAction()
    {
        return $this->BaseList(
            'DuckAssistantBundle:Product',
            'DuckAssistantBundle:Product:index.html.twig'
        );
    }

    public function addAction(Request $request )
    {
        return $this->BaseAdd(
            $request,
            'DuckAssistantBundle:Product:form.html.twig',
            'duck_assistantBundle_Product_index'
        );
    }

    public function editAction(Request $request, $id)
    {
        return  $this->BaseEdit(
            $request,
            $id,
            'DuckAssistantBundle:Product:form.html.twig',
            'duck_assistantBundle_Product_index',
            'DuckAssistantBundle:Product'
        );
    }

    public function delAction($id)
    {
        return $this->BaseDelete(
            $id,
            'Shop not found in database',
            'duck_assistantBundle_Product_index',
            'DuckAssistantBundle:Product'
        );
    }

}
