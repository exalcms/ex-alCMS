<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ConvenioForm extends Form
{
    public function buildForm()
    {
        $icons = [
            'ion-ios-analytics-outline' => 'Onda',
            'ion-ios-bookmarks-outline' => 'Livro',
            'ion-ios-paper-outline' => 'Papel',
            'ion-ios-speedometer-outline' => 'Velocímetro',
            'ion-ios-world-outline' => 'Planeta',
            'ion-ios-clock-outline' => 'Relógio',
        ];
        $colors = [
            'color: #ff689b;' => 'Ambar',
            'color: #e9bf06;' => 'Laranja',
            'color: #3fcdc7;' => 'Azul Piscina',
            'color: #41cf2e;' => 'Verde',
            'color: #d6ff22;' => 'Amarelo Ouro',
            'color: #4680ff;' => 'Azul Celeste',
        ];
        $this
            ->add('empresa', 'text', [
                'label' => 'Nome do Parceiro*',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => ['oninput' => 'handleInput(event)', 'required' => 'required'],
            ])
            ->add('end', 'text', [
                'label' => 'Endereço do Estabelecimento*',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => ['oninput' => 'handleInput(event)', 'required' => 'required'],
            ])
            ->add('comple', 'text', [
                'label' => 'Complemento',
                'label_attr' => ['class' => 'control-label'],
                'attr' => ['oninput' => 'handleInput(event)'],
            ])
            ->add('tele', 'tel', [
                'label' => 'Telefone*',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => ['id' => 'tel_com', 'required' => 'required'],
            ])
            ->add('site', 'text', [
                'label' => 'Site',
                'label_attr' => ['class' => 'control-label'],
            ])
            ->add('email', 'text', [
                'label' => 'E-mail*',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => ['required' => 'required'],
            ])
            ->add('objeto', 'text', [
                'label' => 'Objeto do Convênio*',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => ['required' => 'required'],
            ])
            ->add('beneficios', 'textarea', [
                'label' => 'Benefícios*',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => ['class' => 'ckeditor form-control', 'required' => 'required'],
            ])
            ->add('condicions', 'text', [
                'label' => 'Condições para acesso',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => ['required' => 'required'],
            ])
            ->add('obs', 'textarea', [
                'label' => 'Observações:',
                'label_attr' => ['class' => 'control-label'],
                'attr' => ['class' => 'ckeditor form-control'],
            ])
            ->add('icon', 'choice', [
                'label' => 'Ícone da chamada',
                'label_attr' => ['class' => 'control-label'],
                'choices' => $icons,
                'choice_options' => [
                    'wrapper' => ['class' => 'choice-wrapper'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'empty_value' => 'Selecione...',
                'multiple' => false,
                'expanded' => false,
            ])
            ->add('color', 'choice', [
                'label' => 'Ícone da chamada',
                'label_attr' => ['class' => 'control-label'],
                'choices' => $colors,
                'choice_options' => [
                    'wrapper' => ['class' => 'choice-wrapper'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'empty_value' => 'Selecione...',
                'multiple' => false,
                'expanded' => false,
            ])
            ->add('data_valid', 'date', [
                'label' => 'Data de Validade',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => ['required' => 'required', 'id' => 'validade'],
            ])
            ->add('ativo', 'choice', [
                'label' => 'Convenio ativo?',
                'label_attr' => ['class' => 'control-label required'],
                'choices' => ['s' => 'Sim', 'n' => 'Não'],
                'choice_options' => [
                    'wrapper' => ['class' => 'choice-wrapper-my'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'multiple' => false,
                'expanded' => true,
            ]);
    }
}
