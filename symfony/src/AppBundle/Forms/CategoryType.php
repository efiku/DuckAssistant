<?php
/**
 * Created by PhpStorm.
 * User: Krzysztof
 * Date: 2015-03-08
 * Time: 14:33
 */
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('color');
    }

    public function getName()
    {
        return 'Category';
    }
}