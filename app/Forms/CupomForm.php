<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class CupomForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text', [
                'label' => 'Nome da Campanha',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => ['required' => 'required'],
            ])
            ->add('value', 'text', [
                'label' => 'Valor do desconto',
                'label_attr' => ['class' => 'control-label required'],
                'rules' => ['required', 'string'],
                'attr' => ['required' => 'required']
            ])
            ->add('percent', 'choice', [
                'label' => 'Tipo de desconto',
                'label_attr' => ['class' => 'control-label required'],
                'choices' => ['0' => 'Desconto em $', '1' => 'Desconto em %'],
                'choice_options' => [
                    'wrapper' => ['class' => 'choice-wrapper-my'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('validade', 'date', [
                'label' => 'Data de Validade (Deixar em branco se for sem prazo)',
                'label_attr' => ['class' => 'control-label'],
                'attr' => ['id' => 'validade'],
            ])
            ->add('ativo', 'choice', [
                'label' => 'Desconto ativo?',
                'label_attr' => ['class' => 'control-label required'],
                'choices' => ['1' => 'Sim', '0' => 'Não'],
                'choice_options' => [
                    'wrapper' => ['class' => 'choice-wrapper-my'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'selected' => $this->model ? $this->model->ativo : '1',
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('role', 'choice', [
                'label' => 'Desconto válido para',
                'label_attr' => ['class' => 'control-label required'],
                'choices' => ['1' => 'Associados', '2' => 'Todos'],
                'choice_options' => [
                    'wrapper' => ['class' => 'choice-wrapper-my'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'selected' => $this->model ? $this->model->role : '1',
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('user_id', 'hidden',[
                'value' => \Auth::user()->id,
            ]);
    }
}
