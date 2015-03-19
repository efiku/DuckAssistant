<?php

namespace Duck\AssistantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Duck\AssistantBundle\Entity\User;
use Duck\AssistantBundle\Form\UserType;

class UserController extends Controller
{
    public function indexAction()
    {
        $EN = $this->getDoctrine()->getManager();

        $repo = $EN->getRepository('DuckAssistantBundle:User');

        $users = $repo->findAll();


        return $this->render('DuckAssistantBundle:User:index.html.twig', array(
            'users' => $users
        ));
    }

    public function addAction(Request $request )
    {
        $user = new User();
        $form = $this->createForm( new UserType(), $user);

        if($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('duck_assistantBundle_user_index');
        }
        return $this->render('DuckAssistantBundle:User:form.html.twig', array(
                'form' => $form->createView()
            ));    }

    public function delAction($id)
    {
        $repo = $this->getDoctrine()->getRepository('DuckAssistantBundle:User');
        $user = $repo->find($id);
        if( NULL == $user){
            throw $this->createNotFoundException('Nie ma takiego uzytkownika!');
        }
        $em = $this->getDoctrine()->getManager();

        $em->remove($user);
        $em->flush();
        return $this->redirect($this->generateUrl('duck_assistantBundle_user_index') );

    }

    public function editAction(User $user, Request $request)
    {
        $form = $this->createForm(new UserType(), $user);
        $form->handleRequest($request);

        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();

            $em->flush();
            return $this->redirectToRoute('duck_assistantBundle_user_index');
        }
        return $this->render('DuckAssistantBundle:User:form.html.twig', array(
               'form' => $form->createView()
            ));    }

}
