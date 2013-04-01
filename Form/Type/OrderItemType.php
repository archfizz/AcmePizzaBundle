<?php

namespace Acme\PizzaBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OrderItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pizza', 'entity', array(
                'class'         => 'Acme\PizzaBundle\Entity\Pizza',
                'query_builder' => function ($repository) { return $repository->createQueryBuilder('p')->orderBy('p.name', 'ASC'); },
            ))
            ->add('count', 'integer')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\PizzaBundle\Entity\OrderItem'
        ));
    }

     public function getName()
    {
        return 'order_item';
    }
}
