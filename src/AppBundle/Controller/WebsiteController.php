<?php
/**
 * Created by PhpStorm.
 * User: Michael Trotzer
 * Date: 28.05.2017
 * Time: 09:17
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WebsiteController extends Controller
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
        return $this->render('dashboard/anzeigen.html.twig');
    }
}