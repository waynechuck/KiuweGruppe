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

    public function leitbildAction()
    {
        return $this->render('Frontend/webseite/leitbild.html.twig');
    }

    public function konzeptAction()
    {
        return $this->render('Frontend/webseite/konzept.html.twig');
    }

    public function werteAction()
    {
        return $this->render('Frontend/webseite/werte.html.twig');
    }

    public function kiuwegmbhAction()
    {
        return $this->render('Frontend/webseite/kiuwegmbh.html.twig');
    }

    public function impressumAction()
    {
        return $this->render('Frontend/webseite/impressum.html.twig');
    }
}