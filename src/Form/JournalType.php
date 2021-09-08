<?php

namespace App\Form;

use App\Entity\Journal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class JournalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label' =>'Nom du Journal',
                'attr'=>[
                    "placeholder" => "Entrer le nom de votre Journal"
                ]
            ])
            ->add('prix', MoneyType::class, [
                'currency'=>"EUR",
                "divisor"=> 100,
                'label' => "Prix du Journal", 
                'attr'=>[
                    "placeholder" => "Entrer le prix du Journal"
                ]
            ] )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Journal::class,
        ]);
    }
}
