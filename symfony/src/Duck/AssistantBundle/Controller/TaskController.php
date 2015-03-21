<?php

namespace  Duck\AssistantBundle\Controller;

use Duck\AssistantBundle\Form\TaskType;
use Symfony\Component\HttpFoundation\Request;
use Duck\AssistantBundle\Entity\Task;


class TaskController extends BaseController
{

    public function createNewItem(){
        return new Task();
    }

    public function createFormType(){
        return new TaskType();
    }
    public function indexAction()
    {
        return $this->BaseList(
            'DuckAssistantBundle:Task',
            'DuckAssistantBundle:tasks:index.html.twig'
        );
    }

    public function addAction(Request $request )
    {
        return $this->BaseAdd(
            $request,
            'DuckAssistantBundle:tasks:form.html.twig',
            'duck_assistantBundle_task_Lists'
        );
    }

    public function editAction(Request $request, $id)
    {
        return  $this->BaseEdit(
            $request,
            $id,
            'DuckAssistantBundle:tasks:form.html.twig',
            'duck_assistantBundle_task_Lists',
            'DuckAssistantBundle:Task'
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

//TODO: This dragon is so dangerous, we must kill it , adding services and listeners :>



