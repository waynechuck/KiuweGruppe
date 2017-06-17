<?php
/**
 * Created by PhpStorm.
 * User: Micha
 * Date: 16.06.2017
 * Time: 12:37
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StellenangeboteController extends Controller
{
    public function anzeigenAction()
    {
        $stellenangebot = $this->getDoctrine()
            ->getRepository('AppBundle:Stellenangebote')
            ->findAll();

        return $this->render('stellenangebote/anzeigen.html.twig', [
            'stellenangebot' => $stellenangebot
        ]);
    }

    public function bewerbenAction()
    {
        return $this->render('stellenangebot/bewerben.html.twig');
    }

}