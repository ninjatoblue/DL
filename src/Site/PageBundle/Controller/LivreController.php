<?php

namespace Site\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Site\PageBundle\Entity\Livre;

class LivreController extends Controller
{
            public function listeAction()
    {
        $request = $this->getRequest();
        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();
        
        $livre = $em->getRepository('SitePageBundle:Livre')->findBy(array('etat' => true), array('id' => 'DESC'));
        
        return $this->render('SitePageBundle:livre:livre.html.twig');        
    }
    
     public function supprimerAction(Livre $livre)
    {

      
    }
    
}