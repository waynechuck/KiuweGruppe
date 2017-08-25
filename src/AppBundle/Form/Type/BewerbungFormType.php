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
                'Prof.' => 'Prof.'],
                'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('vorname', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('nachname', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('strasse', TextType::class, ['label' => 'Straße', 'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('hausnummer', TextType::class, ['label' => 'Hausnummer', 'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('postleitzahl', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('wohnort', TextType::class, ['label' => 'Ort', 'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('telefonPrivat', TextType::class, ['label' => 'Telefon Privat', 'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('telefonMobil', TextType::class, ['label' => 'Telefon Mobil', 'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('lebenslauf', FileType::class, ['label' => 'Lebenslauf (PDF-File)', 'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('bewerbungsschreiben', FileType::class, ['label' => 'Anschreiben (PDF-File)', 'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('weitereDokumente', FileType::class, ['label' => 'weitere Dokumente (PDF-File)', 'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            // E-MailType
            ->add('email', EmailType::class, ['label' => 'E-Mail-Adresse', 'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('save', SubmitType::class, ['label' => 'Bewerbung abschicken!', 'attr' => ['class' => 'btn btn-block btn-primary', 'style' => 'margin-bottom:15px']]);
    }
}
