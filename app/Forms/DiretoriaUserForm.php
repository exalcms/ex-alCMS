<?php

namespace App\Forms;

use App\Models\Diretoria;
use App\Models\DiretoriaUser;
use App\Models\User;
use Kris\LaravelFormBuilder\Form;

class DiretoriaUserForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('id_diretoria', 'choice', [
                'label' => 'Cargo',
                'choices' => Diretoria::where('ativo', '=', 's')->pluck('cargo', 'id')->toArray(),
                'choice_options' => [
                    'wrapper' => ['class' => 'choice-wrapper'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'empty_value' => 'Selecione...',
                'multiple' => false,
                'expanded' => false,
            ])
            ->add('id_user', 'choice', [
                'label' => 'Titular',
                'choices' => User::where('role', '<>', 3)->orderBy('name_full', 'ASC')->pluck('name_full', 'id')->toArray(),
                'choice_options' => [
                    'wrapper' => ['class' => 'choice-wrapper'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'empty_value' => 'Selecione...',
                'multiple' => false,
                'expanded' => false,
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
            ])
            ->add('inic_mand', 'text', [
                'label' => 'Inicio do Mandato',
            ])
            ->add('fim_mand', 'text', [
                'label' => 'Final do Mandato',
            ]);
    }
}
