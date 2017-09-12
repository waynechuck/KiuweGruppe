<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;

class KontaktFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //TextType:
            ->add('vorname', TextType::class)
            ->add('nachname', TextType::class)
            ->add('betreff', TextType::class)

            //TextareaType
            ->add('nachricht', TextareaType::class, ['attr' => ['class' => 'form-control', 'rows' => 9,]])

            // E-MailType
            ->add('email', EmailType::class, ['label' => 'E-Mail'])

            //ChoiceType:
            ->add('anrede', ChoiceType::class, ['choices' => [
                'Herr' => 'Herr',
                'Frau' => 'Frau',
                'Dr.' => 'Dr.',
                'Prof.' => 'Prof.']])

            // Bestätigungbutton um das Formular zu übernehmen
            ->add('save', SubmitType::class, ['label' => 'Nachricht absenden!', 'attr' => ['class' => 'btn btn-block btn-primary']]);
        ;
    }
}