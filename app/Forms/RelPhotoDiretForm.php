<?php

namespace App\Forms;

use App\Models\Photo;
use Kris\LaravelFormBuilder\Form;

class RelPhotoDiretForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('compo', 'text',[
                'value' => $this->model->user->name_full,
                'label' => 'Nome'
            ])
            ->add('compo_id', 'hidden',[
                'value' => $this->model->id,
            ])
            ->add('photo_id', 'choice', [
                'label' => 'Foto',
                'choices' => Photo::where('using', '=', 'Diretoria')->orderBy('origin_name', 'ASC')->pluck('origin_name', 'id')->toArray(),
                'choice_options' => [
                    'wrapper' => ['class' => 'choice-wrapper'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'empty_value' => 'Selecione...',
                'multiple' => false,
                'expanded' => false,
            ]);
    }
}
