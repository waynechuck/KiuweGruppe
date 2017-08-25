<?php
/**
 * Created by PhpStorm.
 * User: Micha
 * Date: 16.06.2017
 * Time: 12:37
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Kontakt;
use AppBundle\Form\Type\KontaktFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class KontaktController extends Controller
{
    public function anzeigenAction()
    {
        $kontakt = $this->getDoctrine()
            ->getRepository('AppBundle:Kontakt')
            ->findAll();

        return $this->render('Backend/kontakt/anzeigen.html.twig', [
            'kontakt' => $kontakt
        ]);
    }

    public function erstellenAction(Request $request)
    {
        $kontakt = new kontakt;
        $form = $this->createForm(KontaktFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //getData

            $vorname = $form['vorname']->getData();
            $nachname = $form['nachname']->getData();
            $betreff = $form['betreff']->getData();
            $nachricht = $form['nachricht']->getData();
            $email = $form['email']->getData();
            $anrede = $form['anrede']->getData();

            //data
            $kontakt->setVorname($vorname);
            $kontakt->setNachname($nachname);
            $kontakt->setBetreff($betreff);
            $kontakt->setNachricht($nachricht);
            $kontakt->setEmail($email);
            $kontakt->setAnrede($anrede);

            $em = $this->getDoctrine()->getManager();

            $em->persist($kontakt);
            $em->flush();

            $nachricht = \Swift_Message::newInstance()

                ->setSubject('Ihre Anfrage bei der Kiuwe-Gruppe')
                ->setFrom('info@kiuwe-gruppe.de')
                ->setTo($email)
                ->setBody($this->renderView('EMail/kontaktformular.html.twig',
                    ['Betreff' => $betreff,
                    'Nachname' => $nachname,
                    'Anrede' => $anrede,
                    ]),'text/html');

            $this->get('mailer')->send($nachricht);

            $this->addFlash(
                'E-Mail',
                'Vielen Dank für Ihre Nachricht! Wir werden uns schnellstmöglich 
                um Ihr Anliegen kümmern und melden uns auf die hinterlegte E-Mail-Adresse!'

            );

            return $this->redirectToRoute('Kontakt');
        }

        return $this->render('Frontend/webseite/kontakt.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function löschenAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $kontakt = $em->getRepository('AppBundle:Kontakt')->find($id);

        $em->remove($kontakt);
        $em->flush();

        $this->addFlash(
            'notice',
            'Kontaktanfrage gelöscht!'
        );

        return $this->redirectToRoute('Kontakt_anzeigen');
    }
}