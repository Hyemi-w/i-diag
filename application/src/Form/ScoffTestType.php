<?php


namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ScoffTestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        ->add('question', ChoiceType::class, ['choices' => [
        'Oui' => '1',
        'Non' => '2'],
        'multiple' => false, 'expanded' => true])
    }
}