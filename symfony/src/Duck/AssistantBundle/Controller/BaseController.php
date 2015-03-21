<?php
/**
 * Created by PhpStorm.
 * User: efik
 * Date: 19.03.15
 * Time: 17:06
 */

namespace Duck\AssistantBundle\Controller;

use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence;

/**
 * Class BaseController
 * @package Duck\AssistantBundle\Controller
 */
abstract class BaseController  extends  Controller{


    /**
     * Return new Entity
     * @return Entity
     */
    abstract public function createNewItem();

    /**
     * Return new Form type
     * @return FormType
     */
    abstract public function createFormType();

    /**
     * Show list of Entities
     * @param $repository
     * @param $template_to_render
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function BaseList( $repository , $template_to_render){
        $entitleManager = $this->getDoctrine()->getManager();
        $repo = $entitleManager->getRepository($repository);
        $entities = $repo->findall();
        return $this->render($template_to_render, array(
           'list'  => $entities
        ));
    }


    /**
     * Add Users/Cat/Tasks universal method
     * @param Request $request
     * @param $template_to_render
     * @param $route
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function BaseAdd( Request $request, $template_to_render, $route){
        $type[0] = $this->createFormType();
        $type[1] = $this->createNewItem() ;

        $form = $this->createForm($type[0],$type[1] );

        if($form->handleRequest($request)->isValid())
        {
            $enMen = $this->getDoctrine()->getManager();
            $enMen->persist($type[1]);
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
     * @return \Symfony\Component\HttpFoundation\RedirectResponse | \Symfony\Component\HttpFoundation\Response
     */
    public function BaseEdit(Request $request, $id, $render_template, $route,$entity){
        $type = $this->createFormType();

        $entObject = $this->getDoctrine()->getRepository($entity)->find($id);
        $form = $this->createForm($type,$entObject);

        if($form->handleRequest($request)->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();
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