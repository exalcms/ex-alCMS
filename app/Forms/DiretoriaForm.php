<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class DiretoriaForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('cargo', 'text')
            ->add('atribui', 'textarea', [
                'label' => 'Atribuição',
            ])
            ->add('ativo', 'choice', [
                'label' => 'Ativo',
                'label_attr' => ['class' => 'control-label required'],
                'choices' => ['s' => 'Ativo', 'n' => 'Inativo'],
                'choice_options' => [
                    'wrapper' => ['class' => 'choice-wrapper-my'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'multiple' => false,
                'expanded' => true,
            ]);
    }
}
