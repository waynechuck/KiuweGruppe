<?php
/**
 * Created by PhpStorm.
 * User: Micha
 * Date: 16.06.2017
 * Time: 12:37
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Stellenangebote;
use AppBundle\Form\Type\StellenangeboteFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class StellenangeboteController extends Controller
{
    public function anzeigenAction()
    {
        $stellenangebote = $this->getDoctrine()
            ->getRepository('AppBundle:Stellenangebote')
            ->findAll();

        return $this->render('Backend/stellenangebote/anzeigen.html.twig', [
            'stellenangebote' => $stellenangebote
        ]);
    }

    public function erstellenAction(Request $request)
    {
        $stellenangebote = new stellenangebote;
        $form = $this->createForm(StellenangeboteFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //getData

            $jobbezeichnung = $form['jobbezeichnung']->getData();
            $arbeitsort = $form['arbeitsort']->getData();
            $berufszweig = $form['berufszweig']->getData();
            $arbeitsumfeld = $form['arbeitsumfeld']->getData();
            $aufgaben = $form['aufgaben']->getData();
            $joblevel = $form['joblevel']->getData();
            $erstelldatum = $form['erstelldatum']->getData();
            $besetzungszeitpunkt = $form['besetzungszeitpunkt']->getData();
            $telefonnummer = $form['telefonnummer']->getData();
            $ansprechpartner = $form['ansprechpartner']->getData();

            //data
            $stellenangebote->setJobbezeichnung($jobbezeichnung);
            $stellenangebote->setArbeitsort($arbeitsort);
            $stellenangebote->setBerufszweig($berufszweig);
            $stellenangebote->setArbeitsumfeld($arbeitsumfeld);
            $stellenangebote->setAufgaben($aufgaben);
            $stellenangebote->setJoblevel($joblevel);
            $stellenangebote->setErstelldatum($erstelldatum);
            $stellenangebote->setBesetzungszeitpunkt($besetzungszeitpunkt);
            $stellenangebote->setTelefonnummer($telefonnummer);
            $stellenangebote->setAnsprechpartner($ansprechpartner);

            $em = $this->getDoctrine()->getManager();

            $em->persist($stellenangebote);
            $em->flush();

            $this->addFlash(
                'notice',
                'Das Stellenangebot wurde erstellt!'
            );

            return $this->redirectToRoute('Stellenangebote_anzeigen');
        }

        return $this->render('Backend/stellenangebote/erstellen.html.twig', [
        'form' => $form->createView()
        ]);
    }

    public function bearbeitenAction($id, Request $request)
    {
        $stellenangebote = $this->getDoctrine()
            ->getRepository('AppBundle:Stellenangebote')
            ->find($id);

        $em = $this->getDoctrine()->getManager();
        $id = $em->getRepository('AppBundle:Stellenangebote')->find($id);

        $form = $this->createForm(StellenangeboteFormType::class, $id);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->flush();

            $this->addFlash(
                'notice',
                'Stellenangebot bearbeitet!'
            );
            return $this->redirectToRoute('Stellenangebote_anzeigen');
        }

        return $this->render('Backend/stellenangebote/bearbeiten.html.twig', [
            'stellenangebote' => $stellenangebote,
            'form' => $form->createView()
        ]);
    }

    public function löschenAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $stellenangebote = $em->getRepository('AppBundle:Stellenangebote')->find($id);

        $em->remove($stellenangebote);
        $em->flush();

        $this->addFlash(
            'notice',
            'Stellenangebot gelöscht!'
        );

        return $this->redirectToRoute('Stellenangebote_anzeigen');
    }

    public function karriereAction()
    {
        $stellenangebote = $this->getDoctrine()
            ->getRepository('AppBundle:Stellenangebote')
            ->findAll();

        return $this->render('Frontend/webseite/karriere.html.twig', [
            'stellenangebote' => $stellenangebote
        ]);
    }
}