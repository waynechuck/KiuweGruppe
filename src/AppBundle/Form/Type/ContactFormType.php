<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //TextType:
            ->add('vorname', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('nachname', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('betreff', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])

            //TextareaType
            ->add('nachricht', TextareaType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px', 'rows' => 9,]])

            // E-MailType
            ->add('email', EmailType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])

            //ChoiceType:
            ->add('anrede', ChoiceType::class, ['choices' => [
                'Herr' => 'Herr',
                'Frau' => 'Frau',
                'Dr.' => 'Dr.',
                'Prof.' => 'Prof.'],
                'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])

            // Bestätigungbutton um das Formular zu übernehmen
            ->add('save', SubmitType::class, ['label' => 'Nachricht senden', 'attr' => ['class' => 'btn btn-block btn-primary', 'style' => 'margin-bottom:15px']])
        ;
    }
}