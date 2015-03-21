<?php

namespace Duck\AssistantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LoginController extends Controller
{
    public function loginAction()
    {
        return $this->render('DuckAssistantBundle:Login:login.html.twig', array(
                // ...
            ));    }

}
