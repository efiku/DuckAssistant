<?php
/**
 * Created by PhpStorm.
 * User: efik
 * Date: 19.03.15
 * Time: 17:06
 */

namespace Duck\AssistantBundle\Controller;

use Duck\AssistantBundle\Entity\Category;
use Duck\AssistantBundle\Entity\Task;
use Duck\AssistantBundle\Entity\User;
use Duck\AssistantBundle\Form\CategoryType;
use Duck\AssistantBundle\Form\TaskType;
use Duck\AssistantBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


/**
 * Class BaseController
 * @package Duck\AssistantBundle\Controller
 */
class BaseController  extends  Controller{

    /**
     * Show list of Entities
     * @param $repository
     * @param $template_to_render
     * @param $first_param
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function BaseList( $repository , $template_to_render, $first_param){
        $enMan = $this->getDoctrine()->getManager();
        $repo = $enMan->getRepository($repository);
        $entities = $repo->findAll();

        return $this->render($template_to_render, array(
           $first_param  => $entities
        ));
    }

    /**
     * Return entity Array [0] Entity object, [1] FormBuilder for [0]
     * @param $type
     * @return array
     */
    public function BaseEntity($type){

        $entity = array(null,null);
        switch ($type){
            case 'CATEGORY' :
                $entity[0] = new Category();
                $entity[1] = new CategoryType();

                break;
            case 'USER':
                $entity[0] = new User();
                $entity[1] = new UserType();

                break;
            case 'TASK' :
                $entity[0] = new Task();
                $entity[1] = new TaskType();

                break;

            default :
                $entity = null;
        }

        return $entity;
    }

    /**
     * Add Users/Cat/Tasks universal method
     * @param Request $request
     * @param $template_to_render
     * @param $route
     * @param $type
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function BaseAdd( Request $request, $template_to_render, $route,  $type){

        $ent = $this->BaseEntity($type);

        if( !is_array($ent) && null == $ent )
        {
            throw new \Exception('Unable to detect entity!');
        }

        $form = $this->createForm($ent[1], $ent[0]);

        if($form->handleRequest($request)->isValid())
        {
            $enMen = $this->getDoctrine()->getManager();
            $enMen->persist($ent[0]);
            $enMen->flush();

            return $this->redirectToRoute($route);
        }

        return $this->render($template_to_render, array(
            'form' => $form->createView()
        ));

    }


    /**
     * Edit Entities
     * @param Request $request
     * @param $id
     * @param $render_template
     * @param $route
     * @param $entity
     * @param $type
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function BaseEdit(Request $request, $id, $render_template, $route,$entity, $type){
        $ent = $this->BaseEntity($type);

        $entObject = $this->getDoctrine()->getRepository($entity)->find($id);

        $form = $this->createForm($ent[1],$entObject);

        if($form->handleRequest($request)->isValid()){
            $enM = $this->getDoctrine()->getManager();
            $enM->flush();
            return $this->redirectToRoute($route);
        }

        return $this->render($render_template, array(
            'form' => $form->createView()
        ));
    }

    /**
     * Delete entities from database
     * @param $id
     * @param $exception
     * @param $route
     * @param $repository
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function BaseDelete($id, $exception , $route, $repository){

        $repo = $this->getDoctrine()->getRepository($repository);
        $entity = $repo->find($id);
        if( null == $entity){
            throw $this->createNotFoundException($exception);
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl($route));
    }
}