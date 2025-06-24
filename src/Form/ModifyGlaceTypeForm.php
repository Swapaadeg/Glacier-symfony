<?php

namespace App\Form;

use App\Entity\Cones;
use App\Entity\Glaces;
use App\Entity\Toppings;
use Vich\UploaderBundle\Entity\File;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ModifyGlaceTypeForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('ingredient_special')
            ->add('cones', EntityType::class, [
                'class' => Cones::class,
                'choice_label' => 'id',
            ])
            ->add('toppings', EntityType::class, [
                'class' => Toppings::class,
                'choice_label' => 'topping', 
                'multiple' => true,
                'expanded' => true,
                'required' => false,
                'label' => 'Toppings disponibles',
                'attr' => ['class' => 'toppings-checkbox-group']
            ])
            ->add('imageFile', FileType::class, [
                'required' => false,
                'mapped' => true,
                'constraints' => [
                    new File([
                        'maxSize' => '2M',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/gif',
                        ],
                        'mimeTypesMessage' => 'Veuillez uploader une image valide (JPEG, PNG, GIF)',
                    ])
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Glaces::class,
        ]);
    }
}

