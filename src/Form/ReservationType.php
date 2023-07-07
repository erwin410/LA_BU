<?php

namespace App\Form;

use App\Entity\Ordinateur;
use App\Entity\Reservation;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ordinateur', EntityType::class, [

                'class' =>  Ordinateur::class,
                'query_builder' => function(EntityRepository $er){

                    return $er->createQueryBuilder('o')
                              ->where('o.occupe = false');
                }
            ])
            ->add('etudiant')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
