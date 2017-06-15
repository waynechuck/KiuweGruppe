<?php
/**
 * Created by PhpStorm.
 * User: Micha
 * Date: 15.06.2017
 * Time: 15:41
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WikiController extends Controller
{

    public function anzeigenAction()
    {
        return $this->render('wiki/anzeigen.html.twig');
    }
}