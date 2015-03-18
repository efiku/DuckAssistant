<?php

namespace Duck\AssistantBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('content', 'text')
            ->add('date', 'date')
            ->add('dueDate', 'date')
            ->add('done','checkbox', array(
                'required' => false
            ))
            ->add('createAt','datetime')
            ->add('priority',  'choice',
                array('choices' => array(
                    '0' => 'low',
                    '1' => 'normal',
                    '2' => 'high')
                ))
            ->add('createdBy' , 'entity', array(
                'class' => 'DuckAssistantBundle:User',
                'property' => 'name',
            ))
            ->add('assignee','entity', array(
                'class' => 'DuckAssistantBundle:User',
                'property' => 'name',
            ))
            ->add('category','entity', array(
                'class' => 'DuckAssistantBundle:Category',
                'property' => 'name',
                ));
    }

    public function getName()
    {
        return 'Task';
    }
}