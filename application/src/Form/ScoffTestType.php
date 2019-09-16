<?php


namespace App\Form;

use App\Entity\ScoffTest;
use App\Repository\ScoffTestRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class ScoffTestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $questions = $scoffTestRepository->findAll();
        foreach ($questions as $question) {
            $builder->add('question', ChoiceType::class, ['choices' => [
            'Oui' => '1',
            'Non' => '2'],
            'multiple' => false, 'expanded' => true]);
        }
    }
}
