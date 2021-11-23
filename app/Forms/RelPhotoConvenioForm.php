<?php

namespace App\Forms;

use App\Models\Photo;
use Kris\LaravelFormBuilder\Form;

class RelPhotoConvenioForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('empresa', 'text',[
                'value' => $this->model->empresa,
                'label' => 'Nome'
            ])
            ->add('id', 'hidden',[
                'value' => $this->model->id,
            ])
            ->add('photo_id[]', 'choice', [
                'label' => 'Foto',
                'choices' => Photo::where('using', '=', 'Convenio')->orderBy('origin_name', 'ASC')->pluck('origin_name', 'id')->toArray(),
                'choice_options' => [
                    'wrapper' => ['class' => 'choice-wrapper'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'empty_value' => 'Selecione...',
                'multiple' => true,
                'expanded' => true,
            ]);
    }
}
