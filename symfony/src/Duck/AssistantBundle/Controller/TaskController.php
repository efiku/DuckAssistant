<?php

namespace  Duck\AssistantBundle\Controller;

use Duck\AssistantBundle\Entity\Category;
use Duck\AssistantBundle\Form\TaskType;
use Duck\AssistantBundle\Interfaces\ContrInterfaces;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Duck\AssistantBundle\Entity\Task;


class TaskController extends Controller implements  ContrInterfaces
{

    public function createNewItem(){
        return new Task();
    }

    public function createFormType(){
        return new TaskType();
    }


    public function getDoctrimeManager(){
        return $this->getDoctrine()->getManager();
    }

    public function indexAction()
    {
        return $this->render('DuckAssistantBundle:tasks:index.html.twig', array(
            'list'  => $this->get('duck_assistantbundle.lists.listprovider')->getProviderLists('DuckAssistantBundle:Task')
        ));
    }

    public function addAction(Request $request )
    {
        $form = $this->createForm($this->createFormType(),$this->createNewItem() );

        if($form->handleRequest($request)->isValid())
        {
            $entity = $form->getData();

            $this->getDoctrimeManager()->persist($entity);
            $this->getDoctrimeManager()->flush();

            return $this->redirectToRoute('duck_assistantBundle_task_Lists');
        }

        return $this->render( 'DuckAssistantBundle:tasks:form.html.twig' , array(
            'form' => $form->createView()
        ));

    }

    public function editAction(Request $request, Task $task)
    {
        $form = $this->createForm( $this->createFormType(), $task);

        if($form->handleRequest($request)->isValid()){
            $this->getDoctrimeManager()->flush();
            return $this->redirectToRoute('duck_assistantBundle_task_Lists');
        }

        return $this->render( 'DuckAssistantBundle:tasks:form.html.twig', array(
            'form' => $form->createView()
        ));

    }

    public function delAction(Task $task)
    {
        if( null == $task){
            throw $this->createNotFoundException();
        }
        $this->getDoctrimeManager()->remove($task);
        $this->getDoctrimeManager()->flush();

        return $this->redirectToRoute('duck_assistantBundle_task_Lists');
    }

}


