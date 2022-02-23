<?php

namespace App\Forms;

use App\Models\Category;
use Kris\LaravelFormBuilder\Form;

class ProductForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('category_id', 'choice', [
                'label' => 'Categoria',
                'label_attr' => ['class' => 'control-label required'],
                'choices' => Category::orderBy('name', 'ASC')->pluck('name', 'id')->toArray(),
                'choice_options' => [
                    'wrapper' => ['class' => 'choice-wrapper'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'empty_value' => 'Selecione...',
                'multiple' => false,
                'expanded' => false,
            ])
            ->add('name', 'text', [
                'label' => 'Nome do Produto',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => ['required' => 'required'],
            ])
            ->add('description', 'textarea', [
                'label' => 'Descrição',
            ])
            ->add('estoque', 'text', [
                'label' => 'Estoque',
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
            ->add('price', 'text', [
                'label' => 'Preço',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'id' => 'price',
                    'required' => 'required'
                ],
            ]);
    }
}
