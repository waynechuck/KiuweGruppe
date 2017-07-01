<?php
/**
 * Created by PhpStorm.
 * User: Michael Trotzer
 * Date: 28.05.2017
 * Time: 06:01
 */

namespace AppBundle\Controller;

/**
 * Include everything else
 */

use AppBundle\Entity\ToDo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Include everything for the Forms
 */

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ToDoController extends Controller
{
    public function anzeigenAction()
    {
        $ToDo = $this->getDoctrine()
            ->getRepository('AppBundle:ToDo')
            ->findAll();

        return $this->render('todo/anzeigen.html.twig', [
            'ToDo' => $ToDo
        ]);
    }

    public function erstellenAction(Request $request)
    {
        $ToDo = new ToDo;

        $form =$this->createFormBuilder($ToDo)
            ->add('name', TextType::class, ['label' => 'Name des ToDo´s', 'attr' => ['class' => 'form-control', 'style' =>'margin-bottom:15px']])
            ->add('category', TextType::class, ['label' => 'Kategorie', 'attr' => ['class' => 'form-control', 'style' =>'margin-bottom:15px']])
            ->add('description', TextareaType::class, ['label' => 'Beschreibung', 'attr' => ['class' => 'form-control', 'style' =>'margin-bottom:15px']])
            ->add('priority', ChoiceType::class, ['label' => 'Priorität', 'choices' => ['Niedrig' => 'Niedrig', 'Normal' => 'Normal', 'Hoch' => 'Hoch'], 'attr' => ['class' => 'form-control', 'style' =>'margin-bottom:15px']])
            ->add('dueDate', DateType::class, ['label' => 'Enddatum', 'attr' => ['class' => 'form-control', 'style' =>'margin-bottom:15px']])
            ->add('save', SubmitType::class, ['label' => 'ToDo hinzufügen', 'attr' => ['class' => 'btn btn-primary', 'style' =>'margin-bottom:15px']])
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            //getData
            $name = $form['name']->getData();
            $category = $form['category']->getData();
            $description = $form['description']->getData();
            $priority = $form['priority']->getData();
            $dueDate = $form['dueDate']->getData();

            $now = new \DateTime('now');

            $ToDo->setName($name);
            $ToDo->setCategory($category);
            $ToDo->setDescription($description);
            $ToDo->setPriority($priority);
            $ToDo->setDueDate($dueDate);
            $ToDo->setCreateDate($now);

            $em = $this->getDoctrine()->getManager();

            $em->persist($ToDo);
            $em->flush();

            $this->addFlash(
                'notice',
                'ToDo wurde erfolgreich hinzugefügt!'
            );

            return $this->redirectToRoute('ToDos_anzeigen');
        }

        return $this->render('todo/erstellen.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function bearbeitenAction($id, Request $request)
    {
            $ToDo = $this->getDoctrine()
            ->getRepository('AppBundle:ToDo')
            ->find($id);

            $now = new \DateTime('now');

            $ToDo->setName($ToDo->getName());
            $ToDo->setCategory($ToDo->getCategory());
            $ToDo->setDescription($ToDo->getDescription());
            $ToDo->setPriority($ToDo->getPriority());
            $ToDo->setDueDate($ToDo->getDueDate());
            $ToDo->setCreateDate($now);

        $form =$this->createFormBuilder($ToDo)
            ->add('name', TextType::class, ['attr' => ['class' => 'form-control', 'style' =>'margin-bottom:15px']])
            ->add('category', TextType::class, ['attr' => ['class' => 'form-control', 'style' =>'margin-bottom:15px']])
            ->add('description', TextareaType::class, ['attr' => ['class' => 'form-control', 'style' =>'margin-bottom:15px']])
            ->add('priority', ChoiceType::class, ['choices' => ['Low' => 'Low', 'Normal' => 'Normal', 'High' => 'High'], 'attr' => ['class' => 'form-control', 'style' =>'margin-bottom:15px']])
            ->add('dueDate', DateTimeType::class, ['attr' => ['class' => 'formcontrol', 'style' =>'margin-bottom:15px']])
            ->add('save', SubmitType::class, ['label' => 'ToDo bearbeiten', 'attr' => ['class' => 'btn btn-primary', 'style' =>'margin-bottom:15px']])
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            //getData
            $name = $form['name']->getData();
            $category = $form['category']->getData();
            $description = $form['description']->getData();
            $priority = $form['priority']->getData();
            $dueDate = $form['dueDate']->getData();

            $now = new\ DateTime('now');

            $em = $this->getDoctrine()->getManager();
            $ToDo = $em->getRepository('AppBundle:ToDo')->find($id);

            $ToDo->setName($name);
            $ToDo->setCategory($category);
            $ToDo->setDescription($description);
            $ToDo->setPriority($priority);
            $ToDo->setDueDate($dueDate);
            $ToDo->setCreateDate($now);

            $em->flush();

            $this->addFlash(
                'notice',
                'ToDo Updated'
            );

            return $this->redirectToRoute('ToDos_anzeigen');
        }

        return $this->render('todo/bearbeiten.html.twig', [
            'ToDo' => $ToDo,
            'form' => $form->createView()
        ]);
    }

    public function detailsAction($id){

        $ToDo = $this->getDoctrine()
            ->getRepository('AppBundle:ToDo')
            ->find($id);

        return $this->render('todo/details.html.twig', [
            'ToDo' => $ToDo
        ]);
    }

    public function löschenAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $ToDo = $em->getRepository('AppBundle:ToDo')->find($id);

        $em->remove($ToDo);
        $em->flush();

        $this->addFlash(
            'notice',
            'ToDo Removed'
        );
        return $this->redirectToRoute('ToDos_anzeigen');
    }
}