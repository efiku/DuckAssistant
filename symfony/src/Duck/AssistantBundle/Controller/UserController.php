<?php

namespace Duck\AssistantBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Duck\AssistantBundle\Entity\User;

class UserController extends BaseController
{
    public function indexAction()
    {
        return $this->BaseList(
            'DuckAssistantBundle:User',
            'DuckAssistantBundle:User:index.html.twig',
            'users'
        );
    }

    public function addAction(Request $request )
    {
        return $this->BaseAdd(
            $request,
            'DuckAssistantBundle:User:form.html.twig',
            'duck_assistantBundle_user_index',
            'USER'
        );
    }

    public function editAction(Request $request, $id)
    {
        return  $this->BaseEdit(
            $request,
            $id,
            'DuckAssistantBundle:User:form.html.twig',
            'duck_assistantBundle_user_index',
            'DuckAssistantBundle:User',
            'USER'
        );
    }

    public function delAction($id)
    {
        return $this->BaseDelete(
            $id,
            'User not found in database',
            'duck_assistantBundle_user_index',
            'DuckAssistantBundle:User'
        );
    }

}
