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

use AppBundle\Entity\Todo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Include everything for the Forms
 */

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TodoController extends Controller
{
    public function anzeigenAction()
    {
        //@TODO Typo in word
        $todos = $this->getDoctrine()
            ->getRepository('AppBundle:Todo')
            ->findAll();

        //@TODO kurze array Syntax
        return $this->render('todo/anzeigen.html.twig', [
            'todos' => $todos
        ]);
    }

    public function erstellenAction(Request $request)
    {
        /**
        * @TODO Der richtige weg wäre:
        * - @EntityManager holen
        * - @EntityManager::getRepository gibt uns die Klasse
        */
        $todo = new Todo;

        $form =$this->createFormBuilder($todo)
            //@TODO kurze array Syntax
            ->add('name', TextType::class, ['attr' => ['class' => 'form-control', 'style' =>'margin-bottom:15px']])
            ->add('category', TextType::class, ['attr' => ['class' => 'form-control', 'style' =>'margin-bottom:15px']])
            ->add('description', TextareaType::class, ['attr' => ['class' => 'form-control', 'style' =>'margin-bottom:15px']])
            ->add('priority', ChoiceType::class, ['choices' => ['Low' => 'Low', 'Normal' => 'Normal', 'High' => 'High'], 'attr' => ['class' => 'form-control', 'style' =>'margin-bottom:15px']])
            ->add('dueDate', DateTimeType::class, ['attr' => ['class' => 'formcontrol', 'style' =>'margin-bottom:15px']])
            ->add('save', SubmitType::class, ['label' => 'Create Todo', 'attr' => ['class' => 'btn btn-primary', 'style' =>'margin-bottom:15px']])
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            //getData
            $name = $form['name']->getData();
            $category = $form['category']->getData();
            $description = $form['description']->getData();
            $priority = $form['priority']->getData();
            $dueDate = $form['dueDate']->getData();

            //@TODO ein Leerzeichen fehlt hier
            $now = new\DateTime('now');

            $todo->setName($name);
            $todo->setCategory($category);
            $todo->setDescription($description);
            $todo->setPriority($priority);
            $todo->setDueDate($dueDate);
            $todo->setCreateDate($now);

            $em = $this->getDoctrine()->getManager();

            $em->persist($todo);
            $em->flush();

            $this->addFlash(
                'notice',
                'Todo Added'
            );

            //@TODO nur ein return pro Methode
            return $this->redirectToRoute('Todos_anzeigen');
        }

        return $this->render('todo/erstellen.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function bearbeitenAction($id, Request $request)
    {
        $todo = $this->getDoctrine()
            ->getRepository('AppBundle:Todo')
            ->find($id);

            $now = new\DateTime('now');

            $todo->setName($todo->getName());
            $todo->setCategory($todo->getCategory());
            $todo->setDescription($todo->getDescription());
            $todo->setPriority($todo->getPriority());
            $todo->setDueDate($todo->getDueDate());
            $todo->setCreateDate($now);

        $form =$this->createFormBuilder($todo)
            ->add('name', TextType::class, ['attr' => ['class' => 'form-control', 'style' =>'margin-bottom:15px']])
            ->add('category', TextType::class, ['attr' => ['class' => 'form-control', 'style' =>'margin-bottom:15px']])
            ->add('description', TextareaType::class, ['attr' => ['class' => 'form-control', 'style' =>'margin-bottom:15px']])
            ->add('priority', ChoiceType::class, ['choices' => ['Low' => 'Low', 'Normal' => 'Normal', 'High' => 'High'], 'attr' => ['class' => 'form-control', 'style' =>'margin-bottom:15px']])
            ->add('dueDate', DateTimeType::class, ['attr' => ['class' => 'formcontrol', 'style' =>'margin-bottom:15px']])
            ->add('save', SubmitType::class, ['label' => 'Update Todo', 'attr' => ['class' => 'btn btn-primary', 'style' =>'margin-bottom:15px']])
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            //getData
            $name = $form['name']->getData();
            $category = $form['category']->getData();
            $description = $form['description']->getData();
            $priority = $form['priority']->getData();
            $dueDate = $form['dueDate']->getData();

            $now = new\DateTime('now');

            $em = $this->getDoctrine()->getManager();
            $todo = $em->getRepository('AppBundle:Todo')->find($id);

            $todo->setName($name);
            $todo->setCategory($category);
            $todo->setDescription($description);
            $todo->setPriority($priority);
            $todo->setDueDate($dueDate);
            $todo->setCreateDate($now);

            $em->flush();

            $this->addFlash(
                'notice',
                'Todo Updated'
            );

            return $this->redirectToRoute('Totos_anzeigen');
        }

        return $this->render('todo/bearbeiten.html.twig', [
            'todo' => $todo,
            'form' => $form->createView()
        ]);
    }

    public function detailsAction($id){

        $todo = $this->getDoctrine()
            ->getRepository('AppBundle:Todo')
            ->find($id);

        return $this->render('todo/details.html.twig', [
            'todo' => $todo
        ]);
    }

    public function löschenAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $todo = $em->getRepository('AppBundle:Todo')->find($id);

        $em->remove($todo);
        $em->flush();

        $this->addFlash(
            'notice',
            'Todo Removed'
        );
        //@TODO nur ein return pro Methode
        return $this->redirectToRoute('Todos_anzeigen');
    }
}