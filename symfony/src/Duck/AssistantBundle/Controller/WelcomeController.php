<?php

namespace Duck\AssistantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WelcomeController extends Controller
{
    /* Route for / with prefix / */
    public function indexAction()
    {
        return $this->render('DuckAssistantBundle:Default:welcome.html.twig');
    }
}
