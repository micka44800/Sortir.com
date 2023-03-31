<?php

namespace App\Form;

use App\Entity\Lieu;
use App\Entity\Sortie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreerSortieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('dateHeureDebut',DateTimeType::class)
            ->add('duree')
            ->add('dateLimiteInscription',DateTimeType::class)
            ->add('nbInscriptionsMax')
            ->add('infosSortie')
            ->add('lieu',EntityType::class, [
        // looks for choices from this entity
        'class' => Lieu::class,

        // uses the User.username property as the visible option string
        'choice_label' => 'nom',

        // used to render a select box, check boxes or radios
        // 'multiple' => true,
        // 'expanded' => true,
    ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sortie::class,
        ]);
    }
}
