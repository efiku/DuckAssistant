<?php

namespace Duck\AssistantBundle\Controller;

use Duck\AssistantBundle\Form\ShopsType;
use Symfony\Component\HttpFoundation\Request;
use Duck\AssistantBundle\Entity\Shops;

class ShopsController extends BaseController
{

    public function createNewItem(){
        return new Shops();
    }

    public function createFormType(){
        return new ShopsType();
    }

    public function indexAction()
    {
        return $this->BaseList(
            'DuckAssistantBundle:Shops',
            'DuckAssistantBundle:Shop:index.html.twig'
        );
    }

    public function addAction(Request $request )
    {
        return $this->BaseAdd(
            $request,
            'DuckAssistantBundle:Shop:form.html.twig',
            'duck_assistantBundle_Shop_index'
        );
    }

    public function editAction(Request $request, $id)
    {
        return  $this->BaseEdit(
            $request,
            $id,
            'DuckAssistantBundle:Shop:form.html.twig',
            'duck_assistantBundle_Shop_index',
            'DuckAssistantBundle:Shops'
        );
    }

    public function delAction($id)
    {
        return $this->BaseDelete(
            $id,
            'Shop not found in database',
            'duck_assistantBundle_Shop_index',
            'DuckAssistantBundle:Shops'
        );
    }

}
