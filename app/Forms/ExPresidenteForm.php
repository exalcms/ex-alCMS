<?php

namespace App\Forms;

use App\Models\User;
use Kris\LaravelFormBuilder\Form;

class ExPresidenteForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('user_id', 'choice', [
                'label' => 'Ex-Presidente',
                'choices' => User::where('role', '<>', 3)->orderBy('name_full', 'ASC')->pluck('name_full', 'id')->toArray(),
                'choice_options' => [
                    'wrapper' => ['class' => 'choice-wrapper'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'rules' => 'required',
                'empty_value' => 'Selecione...',
                'multiple' => false,
                'expanded' => false,
            ])
            ->add('inicio', 'text', [
                'label' => 'Ano inicial da gestão',
                'rules' => 'required',
                'attr' => ['placeholder' => 'aaaa'],
            ])
            ->add('final', 'text', [
                'label' => 'Ano final da gestão',
                'rules' => 'required',
                'attr' => ['placeholder' => 'aaaa'],
            ])
            ->add('msg', 'textarea', [
                'label' => 'Mensagem do Ex-presidente',
                'rules' => 'required',
                'attr' => ['class' => 'ckeditor form-control'],
            ])
            ->add('publica', 'choice', [
                'label' => 'Publica a Mensagem?',
                'label_attr' => ['class' => 'control-label'],
                'choices' => ['s' => 'Sim', 'n' => 'Não'],
                'rules' => 'required',
                'choice_options' => [
                    'wrapper' => ['class' => 'choice-wrapper-my'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'selected' => $this->model ? [$this->model->publica] : ['s'],
                'multiple' => false,
                'expanded' => true,
            ]);
    }
}
