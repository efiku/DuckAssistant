<?php

namespace Duck\AssistantBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ShoppingType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $b, array $options)
    {
        $b
            ->add('products', 'entity', array(
                'class' => 'Duck\AssistantBundle\Entity\Product',
                'property' => 'name',
                'multiple' => true,
                'expanded' => true
            ));

    }
    /**
     * @return string
     */
    public function getName()
    {
        return 'duck_assistantbundle_Shopping';
    }
}
