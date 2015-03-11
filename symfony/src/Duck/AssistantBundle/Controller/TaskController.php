<?php

namespace  Duck\AssistantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TaskController extends Controller
{

    /* Route / for prefix /task */
    public function indexAction()
    {
        $EN = $this->getDoctrine()->getManager();

        $repo = $EN->getRepository('DuckAssistantBundle:Task');

        $tasks = $repo->findAll();


        return $this->render('DuckAssistantBundle:tasks:index.html.twig', array(
            'tasks' => $tasks
        ));
    }

    //TODO: Add task method

    //TODO: Edit task
    //TODO: Delete task
}



