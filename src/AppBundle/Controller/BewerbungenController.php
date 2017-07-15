<?php
/**
 * Created by PhpStorm.
 * User: Micha
 * Date: 16.06.2017
 * Time: 12:37
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Bewerbungen;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Include everything for the Forms
 */

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

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

        $form =$this->createFormBuilder($bewerbungen)
            ->add('anrede', ChoiceType::class, ['placeholder' => 'Wählen Sie eine der Optionen aus!', 'choices' => [
                'Herr' => 'Herr',
                'Frau' => 'Frau',
                'Dr.' => 'Dr.',
                'Prof.' => 'Prof'],
                'attr' => ['class' => 'form-control', 'style' =>'margin-bottom:15px']])

            ->add('vorname', TextType::class, ['attr' => ['class' => 'form-control', 'style' =>'margin-bottom:15px']])
            ->add('nachname', TextType::class, ['attr' => ['class' => 'form-control', 'style' =>'margin-bottom:15px']])
            ->add('strasse', TextType::class, ['label' => 'Straße', 'attr' => ['class' => 'form-control', 'style' =>'margin-bottom:15px']])
            ->add('hausnummer', TextType::class, ['label' => 'Hausnummer', 'attr' => ['class' => 'form-control', 'style' =>'margin-bottom:15px']])
            ->add('postleitzahl', TextType::class, ['attr' => ['class' => 'form-control', 'style' =>'margin-bottom:15px']])
            ->add('wohnort', TextType::class, ['label' => 'Ort', 'attr' => ['class' => 'form-control', 'style' =>'margin-bottom:15px']])
            ->add('telefonPrivat', TextType::class,['label' => 'Telefon Privat', 'attr' => ['class' => 'form-control', 'style' =>'margin-bottom:15px']])
            ->add('telefonMobil', TextType::class, ['label' => 'Telefon Mobil', 'attr' => ['class' => 'form-control', 'style' =>'margin-bottom:15px']])

            ->add('lebenslauf', FileType::class, ['label' => 'Lebenslauf (PDF-File)', 'attr' => ['class' => 'form-control', 'style' =>'margin-bottom:15px']])
            ->add('bewerbungsschreiben', FileType::class, ['label' => 'Anschreiben (PDF-File)', 'attr' => ['class' => 'form-control', 'style' =>'margin-bottom:15px']])
            ->add('weitereDokumente', FileType::class, ['label' => 'weitere Dokumente (PDF-File)', 'attr' => ['class' => 'form-control', 'style' =>'margin-bottom:15px']])

            // E-MailType
            ->add('email', EmailType::class, ['label' => 'E-Mail-Adresse', 'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])

            ->add('save', SubmitType::class, ['label' => 'Bewerbung abschicken!', 'attr' => ['class' => 'btn btn-success', 'style' =>'margin-bottom:15px']])
            ->getForm();

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

            $this->addFlash(
                'notice',
                'Die Bewerbung wurde erfolgreich abgeschickt!'
            );

            return $this->redirectToRoute('Karriere');
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