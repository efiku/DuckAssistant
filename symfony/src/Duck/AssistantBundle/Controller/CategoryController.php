<?php

namespace  Duck\AssistantBundle\Controller;

use Duck\AssistantBundle\Entity\Category;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends BaseController
{
    public function indexAction()
    {
        return $this->BaseList(
            'DuckAssistantBundle:Category',
            'DuckAssistantBundle:categories:index.html.twig',
            'categories'
        );
    }

    public function addAction(Request $request )
    {
        return $this->BaseAdd(
            $request,
            'DuckAssistantBundle:categories:category_mod.html.twig',
            'duck_assistantBundle_cat_Lists',
            'CATEGORY'
        );
    }

    public function editAction(Request $request, $id)
    {
        return  $this->BaseEdit(
            $request,
            $id,
            'DuckAssistantBundle:categories:category_mod.html.twig',
            'duck_assistantBundle_cat_Lists',
            'DuckAssistantBundle:Category',
            'CATEGORY'
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
