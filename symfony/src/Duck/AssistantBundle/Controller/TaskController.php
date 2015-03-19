<?php

namespace  Duck\AssistantBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Duck\AssistantBundle\Entity\Task;


class TaskController extends BaseController
{

    public function indexAction()
    {
        return $this->BaseList(
            'DuckAssistantBundle:Task',
            'DuckAssistantBundle:tasks:index.html.twig',
            'tasks'
        );
    }

    public function addAction(Request $request )
    {
        return $this->BaseAdd(
            $request,
            'DuckAssistantBundle:tasks:form.html.twig',
            'duck_assistantBundle_task_Lists',
            'TASK'
        );
    }

    public function editAction(Request $request, $id)
    {
        return  $this->BaseEdit(
            $request,
            $id,
            'DuckAssistantBundle:tasks:form.html.twig',
            'duck_assistantBundle_task_Lists',
            'DuckAssistantBundle:Task',
            'TASK'
        );
    }

    public function delAction($id)
    {
        return $this->BaseDelete(
            $id,
            'Task not found in database',
            'duck_assistantBundle_task_Lists',
            'DuckAssistantBundle:Task'
        );
    }
}



