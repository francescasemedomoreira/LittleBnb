<?php

namespace App\Form;

use App\Entity\Annonce;
use App\Helper\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;


class AnnonceType extends AbstractType {  
    public function buildForm(FormBuilderInterface $builder, array $options): void 
    {
        $builder
            ->add('titre', 
            TextType::class, 
            Type::getConfiguration("Titre", "Un super titre pour votre annonce."))
            ->add('slug', 
            TextType::class, 
            Type::getConfiguration("Adresse web", "Adresse web (automatique)."))
            ->add('imageCouverture', 
            UrlType::class, 
            Type::getConfiguration("Url de l'image", "Choisir une image qui donne envie."))
            // ->add('image', 
            // CollectionType::class, 
            // ['entry_type'=> ImageType::class, 'allow_add'=>true])
            ->add('introduction', 
            TextType::class, 
            Type::getConfiguration("Introduction", "Description globale de votre annonce."))
            ->add('description', 
            TextareaType::class, 
            Type::getConfiguration("Description", "Donner le détail de vos prestations."))
            ->add('chambres', 
            TextType::class, 
            Type::getConfiguration("Nombre de chambres", "Nombre de chambres disponibles."))
            ->add('prix', 
            MoneyType::class, 
            Type::getConfiguration("Prix par nuit", "Prix pour une nuit."))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }
}
