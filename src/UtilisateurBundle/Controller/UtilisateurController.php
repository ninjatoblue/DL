<?php

namespace Site\UtilisateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Site\UtilisateurBundle\Entity\Utilisateur;
use Site\UtilisateurBundle\Form\UtilisateurInscriptionType;

class UtilisateurController extends Controller
{
    public function inscriptionAction()
    {
        $utilisateur = new Utilisateur();
        $request = $this->getRequest();
        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();
        
        if($session->get('rang') == 'Administrateur'){
            $form = $this->createForm(new UtilisateurInscriptionType, $utilisateur);
            if($request->getMethod() == 'POST'){
                $form->bind($request);
                $em->persist($utilisateur);
                $em->flush();
                $session->getFlashBag()->add('success', 'L\'inscription est un franc succès');

                return $this->redirect($this->generateUrl('inscription'));
            }
        }else{
             return $this->render('SitePageBundle::index.thml.twig');
        }
         return $this->render('SiteUtilisateurBundle::inscription.html.twig', array(
                'form' => $form->createView(),
            ));
    }
    
}
