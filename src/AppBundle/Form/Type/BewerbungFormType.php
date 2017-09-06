<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;

class BewerbungFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('anrede', ChoiceType::class, ['placeholder' => 'Wählen Sie eine der Optionen aus!', 'choices' => [
                'Herr' => 'Herr',
                'Frau' => 'Frau',
                'Dr.' => 'Dr.',
                'Prof.' => 'Prof.']])
            ->add('vorname', TextType::class)
            ->add('nachname', TextType::class)
            ->add('strasse', TextType::class, ['label' => 'Straße'])
            ->add('hausnummer', TextType::class, ['label' => 'Hausnummer'])
            ->add('postleitzahl', TextType::class)
            ->add('wohnort', TextType::class, ['label' => 'Wohnort'])
            ->add('telefonPrivat', TextType::class, ['label' => 'Haustelefon'])
            ->add('telefonMobil', TextType::class, ['label' => 'Mobiltelefon' ])
            ->add('lebenslauf', FileType::class, ['label' => 'Lebenslauf'])
            ->add('bewerbungsschreiben', FileType::class, ['label' => 'Anschreiben'])
            ->add('weitereDokumente', FileType::class, ['label' => 'Dokumente'])
            // E-MailType
            ->add('email', EmailType::class, ['label' => 'E-Mail', 'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('save', SubmitType::class, ['label' => 'Bewerbung abschicken!', 'attr' => ['class' => 'btn btn-block btn-primary', 'style' => 'margin-bottom:15px']]);
    }
}
