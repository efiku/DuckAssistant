<?php

namespace  Duck\AssistantBundle\Controller;

use Duck\AssistantBundle\Form\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Duck\AssistantBundle\Entity\Task;


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

    public function addAction( Request $request)
    {
       $task = new Task();
       $form = $this->createForm(new TaskType(), $task);

        if($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();
            return $this->redirectToRoute('duck_assistantBundle_task_Lists');
        }

        return $this->render('DuckAssistantBundle:tasks:form.html.twig', array(
                'form' => $form->createView()

        ));
    }


    //TODO: Edit task
    //TODO: Delete task
}



