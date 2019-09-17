<?php


namespace App\Form;

use App\Entity\ScoffTest;
use App\Repository\ScoffTestRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class ScoffTestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
            $builder
                ->add('question', EntityType::class, ['choices' => [
                    'Oui' => '1',
                    'Non' => '2'],
                    'multiple' => false, 'expanded' => true,
                    'class' => ScoffTest::class,
                    'query_builder' => function (ScoffTestRepository $scoffTestRepository) {
                    return $scoffTestRepository->createQueryBuilder('s')
                        ->orderBy('t.id', 'ASC');
                    }]);
    }
}
