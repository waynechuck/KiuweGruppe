<?php
/**
 * Created by PhpStorm.
 * User: Michael Trotzer
 * Date: 12.07.2017
 * Time: 15:55
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DashboardController extends Controller
{
    public function anzeigenAction()
    {
        return $this->render('Backend/dashboard/anzeigen.html.twig');
    }
}