<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;

class StellenangeboteFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //TextType:
            ->add('jobbezeichnung', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('arbeitsort', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('berufszweig', TextType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])
            ->add('arbeitsumfeld', TextareaType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px', 'rows' =>10,]])
            ->add('aufgaben', TextareaType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px', 'rows' =>10,]])

            // ChoiceType
            ->add('joblevel', ChoiceType::class, ['choices' => [
                'Praktikant' => 'Praktikant',
                'Werkstudent' => 'Werkstudent',
                'Auszubildende' => 'Auszubildende',
                'Berufseinsteiger' => 'Berufseinsteiger',
                'Berufserfahrung' => 'Berufserfahrung',
                'operativer Management' => 'operativer Management',
                'strategisches Management' => 'strategisches Management'],
                'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])


            ->add('ansprechpartner', ChoiceType::class, ['choices' => [
                'Herr Jörg Rohde' => 'Herr Jörg Rohde',
                'Frau Svenja Rohde' => 'Frau Svenja Rohde'],
                'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])

            //DateType
            ->add('erstelldatum', DateType::class, [
                'placeholder' => [
                    'day' => 'Tag',
                    'month' => 'Monat',
                    'year' => 'Jahr'],
                'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])

            ->add('besetzungszeitpunkt', DateType::class, [
                'placeholder' => [
                    'day' => 'Tag',
                    'month' => 'Monat',
                    'year' => 'Jahr'],
                'attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])

            //NumberType
            ->add('telefonnummer', NumberType::class, ['attr' => ['class' => 'form-control', 'style' => 'margin-bottom:15px']])

            // Bestätigungbutton um das Formular zu übernehmen
            ->add('save', SubmitType::class, ['label' => 'Erstelle das neue Stellenangebot', 'attr' => ['class' => 'btn btn-block btn-primary', 'style' => 'margin-bottom:15px']]);
    }
}
