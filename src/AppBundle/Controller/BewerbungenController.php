<?php
/**
 * Created by PhpStorm.
 * User: Micha
 * Date: 16.06.2017
 * Time: 12:37
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Bewerbungen;
use AppBundle\Form\Type\BewerbungFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class BewerbungenController extends Controller
{
    public function anzeigenAction()
    {
        $bewerbungen = $this->getDoctrine()
            ->getRepository('AppBundle:Bewerbungen')
            ->findAll();

        return $this->render('Backend/bewerbungen/anzeigen.html.twig', [
            'bewerbungen' => $bewerbungen
        ]);
    }

    public function erstellenAction(Request $request)
    {
        $bewerbungen = new bewerbungen;
        $form = $this->createForm(BewerbungFormType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            //getData
            $anrede = $form['anrede']->getData();
            $vorname = $form['vorname']->getData();
            $nachname = $form['nachname']->getData();
            $strasse = $form['strasse']->getData();
            $postleitzahl = $form['postleitzahl']->getData();
            $wohnort = $form['wohnort']->getData();
            $telefonPrivat = $form['telefonPrivat']->getData();
            $telefonMobil = $form['telefonMobil']->getData();
            $hausnummer = $form['hausnummer']->getData();
            $email = $form['email']->getData();

            $lebenslauf = $form['lebenslauf']->getData();
            $bewerbungsschreiben = $form['bewerbungsschreiben']->getData();
            $weitereDokumente = $form['weitereDokumente']->getData();

            $bewerbungen->setAnrede($anrede);
            $bewerbungen->setVorname($vorname);
            $bewerbungen->setNachname($nachname);
            $bewerbungen->setStrasse($strasse);
            $bewerbungen->setPostleitzahl($postleitzahl);
            $bewerbungen->setWohnort($wohnort);
            $bewerbungen->setTelefonPrivat($telefonPrivat);
            $bewerbungen->setTelefonMobil($telefonMobil);
            $bewerbungen->setHausnummer($hausnummer);
            $bewerbungen->setEmail($email);

            $bewerbungen->setLebenslauf($lebenslauf);
            $bewerbungen->setBewerbungsschreiben($bewerbungsschreiben);
            $bewerbungen->setWeitereDokumente($weitereDokumente);

            $em = $this->getDoctrine()->getManager();

            $em->persist($bewerbungen);
            $em->flush();

            $nachricht = \Swift_Message::newInstance()

                ->setSubject('Ihre Bewerbungen bei der Kiuwe-Gruppe')
                ->setFrom('info@kiuwe-gruppe.de')
                ->setTo($email)
                ->setBody($this->renderView('EMail/bewerbungsformular.html.twig',
                    ['Anrede' => $anrede,
                        'Vorname' => $vorname,
                        'Nachname' => $nachname,
                        'Lebenslauf' => $lebenslauf,
                        'Anschreiben' => $bewerbungsschreiben,
                        'WeitereDokumente' => $weitereDokumente,
                    ]),'text/html');

            $this->get('mailer')->send($nachricht);

            $this->addFlash(
                'Bewerbung',
                'Ihre Bewerbung wurde erfolgreich eingereicht. Vielen Dank, dass Sie sich bei der
                Kiuwe-Gruppe beworben haben!'
            );

            return $this->redirectToRoute('Bewerbungen_erstellen');
        }

        return $this->render('Backend/bewerbungen/erstellen.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function detailsAction($id)
    {
        $bewerbung = $this->getDoctrine()
            ->getRepository('AppBundle:Bewerbung')
            ->find($id);

        return $this->render('Backend/bewerbung/details.html.twig', [
            'bewerbung' => $bewerbung
        ]);
    }

}