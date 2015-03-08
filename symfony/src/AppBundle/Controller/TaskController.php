<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Task;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Constraints\DateTime;

class TaskController extends Controller
{
    /**
     * @Route("/app/tasks", name="task")
     */

    public function indexAction()
    {
        $EN = $this->getDoctrine()->getManager();

        $repo = $EN->getRepository('AppBundle:Task');

        $tasks = $repo->findAll();


        return $this->render('tasks/index.html.twig', array(
            'tasks' => $tasks
        ));
    }

}



