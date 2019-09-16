<?php

namespace App\Form;

use App\Entity\Test;
use App\Repository\TestRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        foreach ($test as $tests)
        $builder->add('question', ChoiceType::class, ['choices' => [
        'Oui' => '1',
        'Non' => '2'],
        'multiple' => false, 'expanded' => true]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Test::class,
        ]);
    }
}
