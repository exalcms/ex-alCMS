<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class GaleryForm extends Form
{
    public function buildForm()
    {
        $tipos = [
            'Eventos' => 'Eventos',
            'Fotos' => 'Fotos',
            'Turmas' => 'Turmas',
        ];
        $this
            ->add('titulo', 'text', [
                'label' => 'Título da Galeria',
            ])
            ->add('data', 'date', [
                'label' => 'Data do Evento',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => ['id' => 'validade'],
            ])
            ->add('local', 'text', [
                'label' => 'Local do Evento',
            ])
            ->add('tipo', 'choice', [
                'label' => 'Tipo da Galeria',
                'label_attr' => ['class' => 'control-label'],
                'choices' => $tipos,
                'choice_options' => [
                    'wrapper' => ['class' => 'choice-wrapper'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'empty_value' => 'Selecione...',
                'attr' => ['id' => 'tipoVal' ],
                'multiple' => false,
                'expanded' => false,
            ])
            ->add('descricao', 'textarea', [
                'label' => 'Breve relato do evento',
            ]);
    }
}
