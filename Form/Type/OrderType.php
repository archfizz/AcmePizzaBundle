<?php

namespace Acme\PizzaBundle\Form\Type;

use
    Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface
;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('customer', new CustomerType())
            ->add('items', 'collection', array(
                'type'      => new OrderItemType(),
                'allow_add' => true,
                'prototype' => true,
            ))
        ;
    }

     public function getName()
    {
        return 'order';
    }
}
