<?php

namespace  Duck\AssistantBundle\Controller;

use Duck\AssistantBundle\Entity\Category;
use Duck\AssistantBundle\Form\CategoryType;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends BaseController
{
    public function createNewItem(){
        return new Category();
    }

    public function createFormType(){
        return new CategoryType();
    }

    public function indexAction()
    {
        return $this->BaseList(
            'DuckAssistantBundle:Category',
            'DuckAssistantBundle:categories:index.html.twig'
        );
    }

    public function addAction(Request $request )
    {
        return $this->BaseAdd(
            $request,
            'DuckAssistantBundle:categories:form.html.twig',
            'duck_assistantBundle_cat_Lists'
        );
    }

    public function editAction(Request $request, $id)
    {
        return  $this->BaseEdit(
            $request,
            $id,
            'DuckAssistantBundle:categories:form.html.twig',
            'duck_assistantBundle_cat_Lists',
            'DuckAssistantBundle:Category'
        );
    }

    public function delAction($id)
    {
        return $this->BaseDelete(
            $id,
            'Category not found in database',
            'duck_assistantBundle_cat_Lists',
            'DuckAssistantBundle:Category'
        );
    }
}
