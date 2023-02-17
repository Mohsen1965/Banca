<?php

namespace App\Form;

use App\Entity\Users;
use App\Entity\Roles;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class UsersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('nom')
            ->add('prenom')
            ->add('telephone')
            ->add('email')
            ->add('adresse')
            ->add('ville')
            ->add('code_postal')
            ->add('pays')
            ->add('etat', ChoiceType::class, [
                'choices'  => [
                    'actif' => 'actif',
                    'inactif' => 'inactif',
                ],
                'expanded' => true, // displays the options as radio buttons
                'multiple' => false, // allows only one option to be selected
            ])
           // ->add('etat')
            ->add('username')
            ->add('password')
            ->add('created_at')
            ->add('updated_at')
            
            ->add('role', EntityType::class, [
                'class' => Roles::class,
                'choice_label' => 'nom',
                'placeholder'=>'choisir un role',
                'multiple' => true,
                'expanded' => false,
                'attr' => ['class' => 'form-control'],
            ]);
                       
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
            'cascade_validation' => true,
        ]);
    }
}
