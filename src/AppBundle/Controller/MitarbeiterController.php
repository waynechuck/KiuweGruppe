<?php
/**
 * Created by PhpStorm.
 * User: Micha
 * Date: 06.06.2017
 * Time: 04:45
 */

namespace AppBundle\Controller;

/**
 * Include everything else
 */

use AppBundle\Entity\Mitarbeiter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Include everything for the Forms
 */

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class MitarbeiterController extends Controller
{
    public function anzeigenAction()
    {
        $mitarbeiter = $this->getDoctrine()
            ->getRepository('AppBundle:Mitarbeiter')
            ->findAll();

        return $this->render('mitarbeiter/anzeigen.html.twig', [
            'mitarbeiter' => $mitarbeiter
        ]);
    }

    public function erstellenAction(Request $request)
    {
        $mitarbeiter = new mitarbeiter;
        $form = $this->createFormBuilder($mitarbeiter)

            //TextType:
            ->add('vorname', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('nachname', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('strasse', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('hausnummer', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('ort', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('geburtsort', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('sozialversicherungsausweiss', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('bruttoarbeitslohn', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('bewerbung', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('foto', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('arbeitszeugnis', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('personalausweissnummer', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('bildungsabschluss', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('krankenkasse', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])

            // E-MailType
            ->add('email', EmailType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])

            // NumberType
            ->add('steueridentifiktationsnummer', NumberType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('arbeitsstunden', NumberType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('postleitzahl', NumberType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('telefon', NumberType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])

            // ChoiceType
            ->add('familienstand', ChoiceType::class, ['choices' => [
                'ledig' => 'ledig',
                'verheiratet' => 'verheiratet',
                'verwitwet' => 'verwitwet',
                'geschieden' => 'geschieden',
                'Ehe aufgehoben' => 'Ehe aufgehoben',
                'in eingetragener Lebenspartnerschaft' => 'in eingetragener Lebenspartnerschaft',
                'durch Tod aufgelöste Lebenspartnerschaft' => 'durch Tod aufgelöste Lebenspartnerschaft',
                'aufgehobene Lebenspartnerschaft' => 'aufgehobene Lebenspartnerschaft',
                'durch Todeserklärung aufgelöste Lebenspartnerschaft' => 'durch Todeserklärung aufgelöste Lebenspartnerschaft',
                'nicht bekannt' => 'nicht bekannt'],
                'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])

            ->add('abteilung', ChoiceType::class, ['choices' => [
                'Name der Abteilung' => 'Name der Abteilung',
                'Name der Abteilung1' => 'Name der Abteilung1'],
                'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])

            ->add('position', ChoiceType::class, ['choices' => [
                'Mitarbeiter' => 'Mitarbeiter',
                'Teamleiter' => 'Teamleiter',
                'Kitaleiter' => 'Kitaleiter',
                'Geschäftsführer' => 'Geschäftsführer'],
                'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])

            ->add('steuerklasse', ChoiceType::class, ['choices' => [
                'eins' => 'I',
                'zwei' => 'II',
                'drei' => 'III',
                'vier' => 'IV',
                'fünf' => 'V',
                'sechs' => 'VI'],
                'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])

            //DateType + BirthsdayType Typen
            ->add('einstellungsdatum', DateType::class, [
                'placeholder' => [
                    'year' => 'Jahr', 'month' => 'Monat', 'day' => 'Tag'],
                'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])

            ->add('geburtsdatum', BirthdayType::class, [
                'placeholder' => [
                    'year' => 'Jahr',
                    'month' => 'Monat',
                    'day' => 'Tag'],
                'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])

            // Bestätigungbutton um das Formular zu übernehmen
            ->add('save', SubmitType::class, ['label' => 'Erstelle Mitarbeiter', 'attr' => ['class' => 'btn btn-primary', 'style' => 'margin-bottom:15px']])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //getData
            //Persönliche Daten
            $vorname = $form['vorname']->getData();
            $nachname = $form['nachname']->getData();
            $strasse = $form['strasse']->getData();
            $hausnummer = $form['hausnummer']->getData();
            $postleitzahl = $form['postleitzahl']->getData();
            $ort = $form['ort']->getData();
            $geburtsdatum = $form['geburtsdatum']->getData();
            $geburtsort = $form['geburtsort']->getData();
            $familienstand = $form['familienstand']->getData();
            $personalausweissnummer = $form['personalausweissnummer']->getData();
            $telefon = $form['telefon']->getData();

            // Unternehmensdaten
            $abteilung = $form['abteilung']->getData();
            $position = $form['position']->getData();
            $einstellungsdatum = $form['einstellungsdatum']->getData();
            $steuerklasse = $form['steuerklasse']->getData();
            $steueridentifiktationsnummer = $form['steueridentifiktationsnummer']->getData();
            $arbeitsstunden = $form['arbeitsstunden']->getData();
            $krankenkasse = $form['krankenkasse']->getData();
            $bildungsabschluss = $form['bildungsabschluss']->getData();

            // Alle anderen zum einordnen:
            $sozialversicherungsausweiss = $form['sozialversicherungsausweiss']->getData();
            $bruttoarbeitslohn = $form['bruttoarbeitslohn']->getData();
            $bewerbung = $form['bewerbung']->getData();
            $foto = $form['foto']->getData();
            $arbeitszeugnis = $form['arbeitszeugnis']->getData();
            $email = $form ['email']->getData();

            //data
            $mitarbeiter->setVorname($vorname);
            $mitarbeiter->setNachname($nachname);
            $mitarbeiter->setStrasse($strasse);
            $mitarbeiter->setHausnummer($hausnummer);
            $mitarbeiter->setPostleitzahl($postleitzahl);
            $mitarbeiter->setOrt($ort);
            $mitarbeiter->setGeburtsdatum($geburtsdatum);
            $mitarbeiter->setGeburtsort($geburtsort);
            $mitarbeiter->setFamilienstand($familienstand);
            $mitarbeiter->setPersonalausweissnummer($personalausweissnummer);
            $mitarbeiter->setTelefon($telefon);

            // Unternehmensdaten
            $mitarbeiter->setAbteilung($abteilung);
            $mitarbeiter->setPosition($position);
            $mitarbeiter->setEinstellungsdatum($einstellungsdatum);
            $mitarbeiter->setSteuerklasse($steuerklasse);
            $mitarbeiter->setSteueridentifiktationsnummer($steueridentifiktationsnummer);
            $mitarbeiter->setArbeitsstunden($arbeitsstunden);
            $mitarbeiter->setKrankenkasse($krankenkasse);
            $mitarbeiter->setBildungsabschluss($bildungsabschluss);
            // Alle anderen zum einordnen:
            $mitarbeiter->setSozialversicherungsausweiss($sozialversicherungsausweiss);
            $mitarbeiter->setBruttoarbeitslohn($bruttoarbeitslohn);
            $mitarbeiter->setBewerbung($bewerbung);
            $mitarbeiter->setFoto($foto);
            $mitarbeiter->setArbeitszeugnis($arbeitszeugnis);
            $mitarbeiter->setEmail($email);

            $em = $this->getDoctrine()->getManager();

            $em->persist($mitarbeiter);
            $em->flush();

            $this->addFlash(
                'notice',
                'Der Mitarbeiter wurde erstellt!'
            );
            //@TODO nur ein ausgang aus jeder Methode (hir gibt es 2 returns)

            return $this->redirectToRoute('Mitarbeiter_anzeigen');
        }

        return $this->render('mitarbeiter/erstellen.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function bearbeitenAction($id, Request $request)
    {
        $mitarbeiter = $this->getDoctrine()
            ->getRepository('AppBundle:Mitarbeiter')
            ->find($id);

        $mitarbeiter->setVorname($mitarbeiter->getVorname());
        $mitarbeiter->setNachname($mitarbeiter->getNachname());
        $mitarbeiter->setStrasse($mitarbeiter->getStrasse());
        $mitarbeiter->setHausnummer($mitarbeiter->getHausnummer());
        $mitarbeiter->setPostleitzahl($mitarbeiter->getPostleitzahl());
        $mitarbeiter->setOrt($mitarbeiter->getOrt());
        $mitarbeiter->setGeburtsdatum($mitarbeiter->getGeburtsdatum());
        $mitarbeiter->setGeburtsort($mitarbeiter->getGeburtsort());
        $mitarbeiter->setFamilienstand($mitarbeiter->getFamilienstand());
        $mitarbeiter->setPersonalausweissnummer($mitarbeiter->getPersonalausweissnummer());
        $mitarbeiter->setTelefon($mitarbeiter->getTelefon());

        // Unternehmensdaten
        $mitarbeiter->setAbteilung($mitarbeiter->getAbteilung());
        $mitarbeiter->setPosition($mitarbeiter->getPosition());
        $mitarbeiter->setEinstellungsdatum($mitarbeiter->getEinstellungsdatum());
        $mitarbeiter->setSteuerklasse($mitarbeiter->getSteuerklasse());
        $mitarbeiter->setSteueridentifiktationsnummer($mitarbeiter->getSteueridentifiktationsnummer());
        $mitarbeiter->setArbeitsstunden($mitarbeiter->getArbeitsstunden());
        $mitarbeiter->setKrankenkasse($mitarbeiter->getKrankenkasse());
        $mitarbeiter->setBildungsabschluss($mitarbeiter->getBildungsabschluss());
        // Alle anderen zum einordnen:
        $mitarbeiter->setSozialversicherungsausweiss($mitarbeiter->getSozialversicherungsausweiss());
        $mitarbeiter->setBruttoarbeitslohn($mitarbeiter->getBruttoarbeitslohn());
        $mitarbeiter->setBewerbung($mitarbeiter->getBewerbung());
        $mitarbeiter->setFoto($mitarbeiter->getFoto());
        $mitarbeiter->setArbeitszeugnis($mitarbeiter->getArbeitszeugnis());
        $mitarbeiter->setEmail($mitarbeiter->getEmail());

        $form = $this->createFormBuilder($mitarbeiter)

            //TextType:
            ->add('vorname', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('nachname', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('strasse', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('hausnummer', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('ort', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('geburtsort', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('sozialversicherungsausweiss', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('bruttoarbeitslohn', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('bewerbung', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('foto', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('arbeitszeugnis', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('personalausweissnummer', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('bildungsabschluss', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('krankenkasse', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])

            // E-MailType
            ->add('email', EmailType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])

            // NumberType
            ->add('steueridentifiktationsnummer', NumberType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('arbeitsstunden', NumberType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('postleitzahl', NumberType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('telefon', NumberType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])

            // ChoiceType
            ->add('familienstand', ChoiceType::class, ['choices' => [
                'ledig' => 'ledig',
                'verheiratet' => 'verheiratet',
                'verwitwet' => 'verwitwet',
                'geschieden' => 'geschieden',
                'Ehe aufgehoben' => 'Ehe aufgehoben',
                'in eingetragener Lebenspartnerschaft' => 'in eingetragener Lebenspartnerschaft',
                'durch Tod aufgelöste Lebenspartnerschaft' => 'durch Tod aufgelöste Lebenspartnerschaft',
                'aufgehobene Lebenspartnerschaft' => 'aufgehobene Lebenspartnerschaft',
                'durch Todeserklärung aufgelöste Lebenspartnerschaft' => 'durch Todeserklärung aufgelöste Lebenspartnerschaft',
                'nicht bekannt' => 'nicht bekannt'],
                'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])

            ->add('abteilung', ChoiceType::class, ['choices' => [
                'Name der Abteilung' => 'Name der Abteilung',
                'Name der Abteilung1' => 'Name der Abteilung1'],
                'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])

            ->add('position', ChoiceType::class, ['choices' => [
                'Mitarbeiter' => 'Mitarbeiter',
                'Teamleiter' => 'Teamleiter',
                'Kitaleiter' => 'Kitaleiter',
                'Geschäftsführer' => 'Geschäftsführer'],
                'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])

            ->add('steuerklasse', ChoiceType::class, ['choices' => [
                'eins' => 'I',
                'zwei' => 'II',
                'drei' => 'III',
                'vier' => 'IV',
                'fünf' => 'V',
                'sechs' => 'VI'],
                'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])

            //DateType + BirthsdayType Typen
            ->add('einstellungsdatum', DateType::class, [
                'placeholder' => [
                    'year' => 'Jahr',
                    'month' => 'Monat',
                    'day' => 'Tag'],
                'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])

            ->add('geburtsdatum', BirthdayType::class, [
                'placeholder' => [
                    'year' => 'Jahr',
                    'month' => 'Monat',
                    'day' => 'Tag'],
                'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])

            // Bestätigungbutton um das Formular zu übernehmen
            ->add('save', SubmitType::class, ['label' => 'Änderungen speichern', 'attr' => ['class' => 'btn btn-primary', 'style' => 'margin-bottom:15px']])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //getData

            $vorname = $form['vorname']->getData();
            $nachname = $form['nachname']->getData();
            $strasse = $form['strasse']->getData();
            $hausnummer = $form['hausnummer']->getData();
            $postleitzahl = $form['postleitzahl']->getData();
            $ort = $form['ort']->getData();
            $geburtsdatum = $form['geburtsdatum']->getData();
            $geburtsort = $form['geburtsort']->getData();
            $familienstand = $form['familienstand']->getData();
            $personalausweissnummer = $form['personalausweissnummer']->getData();
            $telefon = $form['telefon']->getData();

            // Unternehmensdaten
            $abteilung = $form['abteilung']->getData();
            $position = $form['position']->getData();
            $einstellungsdatum = $form['einstellungsdatum']->getData();
            $steuerklasse = $form['steuerklasse']->getData();
            $steueridentifiktationsnummer = $form['steueridentifiktationsnummer']->getData();
            $arbeitsstunden = $form['arbeitsstunden']->getData();
            $krankenkasse = $form['krankenkasse']->getData();
            $bildungsabschluss = $form['bildungsabschluss']->getData();

            // Alle anderen zum einordnen:
            $sozialversicherungsausweiss = $form['sozialversicherungsausweiss']->getData();
            $bruttoarbeitslohn = $form['bruttoarbeitslohn']->getData();
            $bewerbung = $form['bewerbung']->getData();
            $foto = $form['foto']->getData();
            $arbeitszeugnis = $form['arbeitszeugnis']->getData();
            $email = $form ['email']->getData();

            $em = $this->getDoctrine()->getManager();
            $mitarbeiter = $em->getRepository('AppBundle:Mitarbeiter')->find($id);

            $mitarbeiter->setVorname($vorname);
            $mitarbeiter->setNachname($nachname);
            $mitarbeiter->setStrasse($strasse);
            $mitarbeiter->setHausnummer($hausnummer);
            $mitarbeiter->setPostleitzahl($postleitzahl);
            $mitarbeiter->setOrt($ort);
            $mitarbeiter->setGeburtsdatum($geburtsdatum);
            $mitarbeiter->setGeburtsort($geburtsort);
            $mitarbeiter->setFamilienstand($familienstand);
            $mitarbeiter->setPersonalausweissnummer($personalausweissnummer);
            $mitarbeiter->setTelefon($telefon);

            // Unternehmensdaten
            $mitarbeiter->setAbteilung($abteilung);
            $mitarbeiter->setPosition($position);
            $mitarbeiter->setEinstellungsdatum($einstellungsdatum);
            $mitarbeiter->setSteuerklasse($steuerklasse);
            $mitarbeiter->setSteueridentifiktationsnummer($steueridentifiktationsnummer);
            $mitarbeiter->setArbeitsstunden($arbeitsstunden);
            $mitarbeiter->setKrankenkasse($krankenkasse);
            $mitarbeiter->setBildungsabschluss($bildungsabschluss);
            // Alle anderen zum einordnen:
            $mitarbeiter->setSozialversicherungsausweiss($sozialversicherungsausweiss);
            $mitarbeiter->setBruttoarbeitslohn($bruttoarbeitslohn);
            $mitarbeiter->setBewerbung($bewerbung);
            $mitarbeiter->setFoto($foto);
            $mitarbeiter->setArbeitszeugnis($arbeitszeugnis);
            $mitarbeiter->setEmail($email);

            $em->flush();

            $this->addFlash(
                'notice',
                'Mitarbeiter bearbeitet!'
            );
            //@TODO nur ein ausgang aus jeder Methode (hir gibt es 2 returns)
            return $this->redirectToRoute('Mitarbeiter_anzeigen');
        }

        return $this->render('mitarbeiter/bearbeiten.html.twig', [
            'mitarbeiter' => $mitarbeiter,
            'form' => $form->createView()
        ]);
    }

    public function detailsAction($id)
    {
        $mitarbeiter = $this->getDoctrine()
            ->getRepository('AppBundle:Mitarbeiter')
            ->find($id);

        return $this->render('mitarbeiter/details.html.twig', [
            'mitarbeiter' => $mitarbeiter
        ]);
    }

    public function löschenAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $mitarbeiter = $em->getRepository('AppBundle:Mitarbeiter')->find($id);

        $em->remove($mitarbeiter);
        $em->flush();

        $this->addFlash(
            'notice',
            'Mitarbeiter gelöscht!'
        );

        return $this->redirectToRoute('Mitarbeiter_anzeigen');
    }
}