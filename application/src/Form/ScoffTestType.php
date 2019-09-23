<?php


namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ScoffTestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        foreach ($options['data'] as $key => $question) {
            $builder
                ->add($question->getId(), ChoiceType::class,
                ['choices' => ['oui' => true, 'non' => false],
                    'data' => false, 'expanded' => true, 'label' => $question->getQuestion()]
            );
        }
    }
}