<?php

namespace Duck\AssistantBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PriceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('price', 'text')

        ->add('product','entity', array(
            'class' => 'DuckAssistantBundle:Product',
            'property' => 'name',
        ))
        ->add('shop','entity', array(
            'class' => 'DuckAssistantBundle:Shops',
            'property' => 'name',
        ));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Duck\AssistantBundle\Entity\Price'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'duck_assistantbundle_Price';
    }
}
