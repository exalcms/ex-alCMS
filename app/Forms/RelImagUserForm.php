<?php

namespace App\Forms;

use App\Models\ExPresidente;
use App\Models\User;
use Kris\LaravelFormBuilder\Form;

class RelImagUserForm extends Form
{
    public function buildForm()
    { $choicesExPres = ExPresidente::with('user')->get();
        $choices = [];
        foreach ($choicesExPres as $choicesExPre){
            $nome = $choicesExPre->user->name_full;
            $id3 = $choicesExPre->id;
            $choices[$id3] = $nome;
        }
        $this
            ->add('photo', 'text',[
                'value' => $this->model->origin_name,
                'label' => 'Nome da Imagem'
            ])
            ->add('user_id', 'choice', [
                'label' => 'Ex-ALuno',
                'choices' => $choices,
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
