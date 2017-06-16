<?php
/**
 * Created by PhpStorm.
 * User: Micha
 * Date: 16.06.2017
 * Time: 12:37
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class KarriereController extends Controller
{
    public function anzeigenAction()
    {
        $karriere = $this->getDoctrine()
            ->getRepository('AppBundle:Karriere')
            ->findAll();

        return $this->render('karriere/anzeigen.html.twig', [
            'karriere' => $karriere
        ]);
    }
}