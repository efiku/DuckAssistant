<?php
/**
 * Created by PhpStorm.
 * User: Krzysztof
 * Date: 2015-03-08
 * Time: 14:33
 */
namespace AppBundle\Forms;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('color', 'choice', array('choices' => array('black' => 'black', 'red' => 'red', 'green' => 'green')));
    }

    public function getName()
    {
        return 'Category';
    }
}