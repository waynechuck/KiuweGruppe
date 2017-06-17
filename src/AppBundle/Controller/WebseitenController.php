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
        return $this->render('webseite/startseite.html.twig');
    }

    public function kontaktAction()
    {
        return $this->render('webseite/kontakt.html.twig');
    }

    public function anmeldenAction()
    {
        return $this->render('webseite/anmelden.html.twig');
    }

    public function dashboardAction()
    {
        return $this->render('webseite/dashboard.html.twig');
    }

    public function agbAction()
    {
        return $this->render('webseite/agb.html.twig');
    }

    public function impressumAction()
    {
        return $this->render('webseite/impressum.html.twig');
    }

    public function karriereAction()
    {
        return $this->render('webseite/karriere.html.twig');
    }

}