<?php
/**
 * Created by PhpStorm.
 * User: Krzysztof
 * Date: 2015-03-08
 * Time: 14:33
 */
namespace Duck\AssistantBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('name')
            ->add('color', 'choice',
                array('choices' => array(
                            'black' => 'black',
                            'red' => 'red',
                            'green' => 'green')
                ))
            ->add('CreatedBy', 'entity' , array(
                'class' => 'DuckAssistantBundle:User',
                'property' => 'name',
            ));
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Duck\AssistantBundle\Entity\Category'
        ));
    }

    public function getName()
    {
        return 'Category';
    }
}