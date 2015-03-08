<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Task;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Constraints\DateTime;

class HelloController extends Controller
{
    /**
     * @Route("/app/example", name="homepage")
     */
    public function indexAction()
    {
        $taks = new Task();

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->find(1);
        $taks->setContent("KOT");
        $taks->setDate( new \DateTime() );
        $taks->setCreatedBy($user);
        $taks->setDueDate( new \DateTime('+10 days'));
        $taks->setDone(true);
        $taks->setPriority(2);
        $em->persist($taks);
        $em->flush();
        return $this->render('default/index.html.twig');
    }

}
