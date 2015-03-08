<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Task;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Constraints\DateTime;

class CategoryController extends Controller
{
    /**
     * @Route("/app/list", name="listCategory")
     */
    public function indexAction()
    {
        $EN = $this->getDoctrine()->getManager();

        $repo = $EN->getRepository('AppBundle:Category');

        $categories = $repo->findAll();


        return $this->render('categories/index.html.twig', array(
            'categories' =>  $categories
        ));
    }

    /**
     * @Route("/app/add", name="addCategory")
     */
    public function addAction(){}

    /**
     * @Route("/app/edit/{id}", name="editCategory")
     */
    public function editAction() {}


}
