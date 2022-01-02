<?php

namespace App\Forms;

use App\Models\Photo;
use Kris\LaravelFormBuilder\Form;

class RelPhotoGaleryForm extends Form
{
    public function buildForm()
    {
        $title = $this->model->titulo;
        $choices = Photo::where([
            ['using', '=', 'Galeria'],
            ['title', 'LIKE', '%'.$title.'%']
        ])->orderBy('origin_name', 'ASC')
            ->pluck('origin_name', 'id')
            ->toArray();
        $this
            ->add('titulo', 'text', [
                'value' => $title,
                'label' => 'Galeria',
                'attr' => ['disabled' => 'disabled'],
            ])
            ->add('id', 'hidden', [
                'value' => $this->model->id,
            ])
            ->add('checkTodos', 'choice', [
                'label' => 'Selecionar todas as fotos',
                'choices' => ['Selecionar Tudo'],
                'choice_options' => [
                    'wrapper' => ['class' => 'choice-wrapper'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('photo_id', 'choice', [
                'label' => 'Fotos',
                'choices' => $choices,
                'choice_options' => [
                    'wrapper' => ['class' => 'choice-wrapper'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('publicada', 'hidden', [
                'value' => 's',
            ]);
    }
}
