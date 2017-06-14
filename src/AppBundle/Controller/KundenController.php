<?php
/**
 * Created by PhpStorm.
 * User: Micha
 * Date: 08.06.2017
 * Time: 06:36
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class KundenController extends Controller
{

    public function anzeigenAction()
    {
        return $this->render('kunden/anzeigen.html.twig');
    }
}