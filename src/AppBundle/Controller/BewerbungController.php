<?php
/**
 * Created by PhpStorm.
 * User: Micha
 * Date: 16.06.2017
 * Time: 12:37
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Bewerbung;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Include everything for the Forms
 */

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class BewerbungController extends Controller
{
    public function anzeigenAction()
    {
        $bewerbung = $this->getDoctrine()
            ->getRepository('AppBundle:Bewerbung')
            ->findAll();

        return $this->render('stellenangebote/anzeigen.html.twig', [
            'bewerbung' => $bewerbung
        ]);
    }

    public function erstellenAction(Request $request)
    {
        $bewerbung = new bewerbung;
        $form = $this->createFormBuilder($bewerbung)

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
            ->add('save', SubmitType::class, ['label' => 'Bewerbung abschicken', 'attr' => ['class' => 'btn btn-primary', 'style' => 'margin-bottom:15px']])
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
            $bewerbung->setJobbezeichnung($jobbezeichnung);
            $bewerbung->setArbeitsort($arbeitsort);
            $bewerbung->setZweig($zweig);
            $bewerbung->setArbeitsumfeld($arbeitsumfeld);
            $bewerbung->setAufgaben($aufgaben);
            $bewerbung->setJoblevel($joblevel);
            $bewerbung->setErstelldatum($erstelldatum);
            $bewerbung->setBesetzungszeitpunkt($besetzungszeitpunkt);

            $em = $this->getDoctrine()->getManager();

            $em->persist($bewerbung);
            $em->flush();

            $this->addFlash(
                'notice',
                'Die Bewerbung wurde erfolgreich abgeschickt!'
            );

            return $this->redirectToRoute('Karriere');
        }

        return $this->render('karriere.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function detailsAction($id)
    {
        $bewerbung = $this->getDoctrine()
            ->getRepository('AppBundle:Bewerbung')
            ->find($id);

        return $this->render('bewerbung/details.html.twig', [
            'bewerbung' => $bewerbung
        ]);
    }

}