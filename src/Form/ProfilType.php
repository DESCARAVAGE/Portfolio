<?php

namespace App\Form;

use App\Entity\Profil;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dan', TextType::class, [
                'label' => 'Nom',
            ])
            ->add('description', TextType::class, [
                'label' => 'Description',
            ])
            ->add('purpose', TextType::class, [
                'label' => 'Objectif',
            ])
            ->add('moreDetail', TextType::class, [
                'label' => 'Plus de détails',
            ])
            ->add('imageFile', VichImageType::class, [
                'label' => 'Image',
                'allow_delete'  => false,
                'required'   => false,
            ])
            ->add('curriculumVitae', TextType::class, [
                'label' => 'CV'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Profil::class,
            'validation_groups' => ['add']
        ]);
    }
}
