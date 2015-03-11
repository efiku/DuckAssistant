<?php

namespace Duck\AssistantBundle\Forms;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', 'number')
            ->add('content', 'text')
            ->add('data', 'date')
            ->add('dueDate', 'date')
            ->add('done','checkbox')
            ->add('createAt','datetime')
            ->add('priority', 'number')
            ->add('createdBy' ,'number')
            ->add('assignee', 'number')
            ->add('category', 'number');
    }

    public function getName()
    {
        return 'Task';
    }
}