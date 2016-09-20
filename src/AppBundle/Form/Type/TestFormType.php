<?php

namespace AppBundle\Form\Type;

use AppBundle\Validation\TestValidationGroupResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TestFormType extends AbstractType
{
    /**
     * @var TestValidationGroupResolver
     */
    protected $validationGroupResolver;

    public function __construct(TestValidationGroupResolver $validationGroupResolver)
    {
        $this->validationGroupResolver = $validationGroupResolver;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('str', null, [
                'label' => 'String',
            ])
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Test',
            'validation_groups' => $this->validationGroupResolver,
        ));
    }
}