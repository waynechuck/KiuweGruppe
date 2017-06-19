<?php
/**
 * Created by PhpStorm.
 * User: Micha
 * Date: 16.06.2017
 * Time: 12:37
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Stellenangebote;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Include everything for the Forms
 */

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class StellenangeboteController extends Controller
{
    public function anzeigenAction()
    {
        $stellenangebote = $this->getDoctrine()
            ->getRepository('AppBundle:Stellenangebote')
            ->findAll();

        return $this->render('stellenangebote/anzeigen.html.twig', [
            'stellenangebote' => $stellenangebote
        ]);
    }

    public function anzeigenfrontendAction()
    {
        $stellenangebote = $this->getDoctrine()
            ->getRepository('AppBundle:Stellenangebote')
            ->findAll();

        return $this->render('stellenangebote/anzeigenfrontend.html.twig', [
            'stellenangebote' => $stellenangebote
        ]);
    }

    public function erstellenAction(Request $request)
    {
        $stellenangebote = new stellenangebote;
        $form = $this->createFormBuilder($stellenangebote)

            //TextType:
            ->add('jobbezeichnung', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('arbeitsort', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('zweig', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('arbeitsumfeld', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('aufgaben', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])

           // ChoiceType
            ->add('joblevel', ChoiceType::class, ['choices' => [
                'Anfänger' => 'Anfänger',
                'Fortgeschritten' => 'Fortgeschritten',
                'Alter Hase' => 'Alter Hase',
                'geschieden' => 'geschieden',
                'Ehe aufgehoben' => 'Ehe aufgehoben'],
                'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])

            //DateType
            ->add('erstelldatum', DateType::class, [
                'placeholder' => [
                    'year' => 'Jahr',
                    'month' => 'Monat',
                    'day' => 'Tag'],
                'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])

            ->add('besetzungszeitpunkt', DateType::class, [
                'placeholder' => [
                    'year' => 'Jahr',
                    'month' => 'Monat',
                    'day' => 'Tag'],
                'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])

            // Bestätigungbutton um das Formular zu übernehmen
            ->add('save', SubmitType::class, ['label' => 'Erstelle Stellenangebot', 'attr' => ['class' => 'btn btn-primary', 'style' => 'margin-bottom:15px']])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //getData

            $jobbezeichnung = $form['jobbezeichnung']->getData();
            $arbeitsort = $form['arbeitsort']->getData();
            $zweig = $form['zweig']->getData();
            $arbeitsumfeld = $form['arbeitsumfeld']->getData();
            $aufgaben = $form['aufgaben']->getData();
            $joblevel = $form['joblevel']->getData();
            $erstelldatum = $form['erstelldatum']->getData();
            $besetzungszeitpunkt = $form['besetzungszeitpunkt']->getData();

            //data
            $stellenangebote->setJobbezeichnung($jobbezeichnung);
            $stellenangebote->setArbeitsort($arbeitsort);
            $stellenangebote->setZweig($zweig);
            $stellenangebote->setArbeitsumfeld($arbeitsumfeld);
            $stellenangebote->setAufgaben($aufgaben);
            $stellenangebote->setJoblevel($joblevel);
            $stellenangebote->setErstelldatum($erstelldatum);
            $stellenangebote->setBesetzungszeitpunkt($besetzungszeitpunkt);

            $em = $this->getDoctrine()->getManager();

            $em->persist($stellenangebote);
            $em->flush();

            $this->addFlash(
                'notice',
                'Das Stellenangebot wurde erstellt!'
            );
            //@TODO nur ein ausgang aus jeder Methode (hir gibt es 2 returns)

            return $this->redirectToRoute('Stellenangebote_anzeigen');
        }

        return $this->render('stellenangebote/erstellen.html.twig', [
        'form' => $form->createView()
        ]);
    }

    public function bearbeitenAction($id, Request $request)
    {
        $stellenangebote = $this->getDoctrine()
            ->getRepository('AppBundle:Stellenangebote')
            ->find($id);

        //data
        $stellenangebote->setJobbezeichnung($stellenangebote->getJobbezeichnung());
        $stellenangebote->setArbeitsort($stellenangebote->getArbeitsort());
        $stellenangebote->setZweig($stellenangebote->getZweig());
        $stellenangebote->setArbeitsumfeld($stellenangebote->getArbeitsumfeld());
        $stellenangebote->setAufgaben($stellenangebote->getAufgaben());
        $stellenangebote->setJoblevel($stellenangebote->getJoblevel());
        $stellenangebote->setErstelldatum($stellenangebote->getErstelldatum());
        $stellenangebote->setBesetzungszeitpunkt($stellenangebote->getBesetzungszeitpunkt());

        $form = $this->createFormBuilder($stellenangebote)
            //TextType:
            ->add('jobbezeichnung', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('arbeitsort', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('zweig', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('arbeitsumfeld', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('aufgaben', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            // ChoiceType
            ->add('joblevel', ChoiceType::class, ['choices' => [
                'Anfänger' => 'Anfänger',
                'Fortgeschritten' => 'Fortgeschritten',
                'Alter Hase' => 'Alter Hase',
                'geschieden' => 'geschieden',
                'Ehe aufgehoben' => 'Ehe aufgehoben'],
                'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            //DateType
            ->add('erstelldatum', DateType::class, [
                'placeholder' => [
                    'year' => 'Jahr',
                    'month' => 'Monat',
                    'day' => 'Tag'],
                'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('besetzungszeitpunkt', DateType::class, [
                'placeholder' => [
                    'year' => 'Jahr',
                    'month' => 'Monat',
                    'day' => 'Tag'],
                'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            // Bestätigungbutton um das Formular zu übernehmen
            ->add('save', SubmitType::class, ['label' => 'Erstelle Stellenangebot', 'attr' => ['class' => 'btn btn-primary', 'style' => 'margin-bottom:15px']])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //getData

            $jobbezeichnung = $form['jobbezeichnung']->getData();
            $arbeitsort = $form['arbeitsort']->getData();
            $zweig = $form['zweig']->getData();
            $arbeitsumfeld = $form['arbeitsumfeld']->getData();
            $aufgaben = $form['aufgaben']->getData();
            $joblevel = $form['joblevel']->getData();
            $erstelldatum = $form['erstelldatum']->getData();
            $besetzungszeitpunkt = $form['besetzungszeitpunkt']->getData();

            $em = $this->getDoctrine()->getManager();
            $stellenangebote = $em->getRepository('AppBundle:Stellenangebote')->find($id);

            //data
            $stellenangebote->setJobbezeichnung($jobbezeichnung);
            $stellenangebote->setArbeitsort($arbeitsort);
            $stellenangebote->setZweig($zweig);
            $stellenangebote->setArbeitsumfeld($arbeitsumfeld);
            $stellenangebote->setAufgaben($aufgaben);
            $stellenangebote->setJoblevel($joblevel);
            $stellenangebote->setErstelldatum($erstelldatum);
            $stellenangebote->setBesetzungszeitpunkt($besetzungszeitpunkt);

            $em->flush();

            $this->addFlash(
                'notice',
                'Stellenangebot bearbeitet!'
            );
            return $this->redirectToRoute('Stellenangebote_anzeigen');
        }

        return $this->render('stellenangebote/bearbeiten.html.twig', [
            'stellenangebote' => $stellenangebote,
            'form' => $form->createView()
        ]);
    }

    public function detailsAction($id)
    {
        $stellenangebote = $this->getDoctrine()
            ->getRepository('AppBundle:Stellenangebote')
            ->find($id);

        return $this->render('stellenangebote/details.html.twig', [
            'stellenangebot' => $stellenangebote
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



}