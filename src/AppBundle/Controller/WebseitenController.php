<?php
/**
 * Created by PhpStorm.
 * User: Michael Trotzer
 * Date: 28.05.2017
 * Time: 09:17
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WebseitenController extends Controller
{

    public function startseiteAction()
    {
        return $this->render('Frontend/webseite/startseite.html.twig');
    }

    public function konzeptAction()
    {
        return $this->render('Frontend/webseite/konzept.html.twig');
    }

    public function leitbildAction()
    {
        return $this->render('Frontend/webseite/leitbild.html.twig');
    }

    public function teamAction()
    {
        return $this->render('Frontend/webseite/team.html.twig');
    }

    public function kontaktAction()
    {
        return $this->render('Frontend/webseite/kontakt.html.twig');
    }

    public function impressumAction()
    {
        return $this->render('Frontend/webseite/impressum.html.twig');
    }

    public function anmeldenAction()
    {
        return $this->render('webseite/anmelden.html.twig');
    }

    public function mitarbeiterAction()
    {
        return $this->render('webseite/mitarbeiter.html.twig');
    }

    public function mitarbeiter_übersichtAction()
    {
        return $this->render('webseite/mitarbeiter_übersicht.html.twig');
    }


    public function anzeigenfrontendAction()
    {
        $stellenangebote = $this->getDoctrine()
            ->getRepository('AppBundle:Stellenangebote')
            ->findAll();

        return $this->render('stellenangebote/anzeigenfrontend.html.twig', [
            'stellenangebote' => $stellenangebote
        ]);
    }
}