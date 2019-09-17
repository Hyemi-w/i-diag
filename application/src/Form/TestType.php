<?php

namespace App\Form;

use App\Entity\Test;
use App\Repository\TestRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('question', EntityType::class, [
                'class' => Test::class,
                'multiple' => true,
                'expanded' => true,
                'query_builder' => function (TestRepository $testRepository) {
                    return $testRepository->createQueryBuilder('t')
                        ->orderBy('t.id', 'ASC');
            }]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Test::class,
        ]);
    }
}
