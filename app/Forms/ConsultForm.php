<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ConsultForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('empresa', 'text', [
                'label' => 'Empresa Parceira',
                'attr' => ['disabled' => 'disabled'],
            ])
            ->add('id', 'hidden', [
                'attr' => ['value' => $this->model->empresa],
            ])
            ->add('objeto', 'text', [
                'label' => 'Objeto do Convênio',
                'attr' => ['disabled' => 'disabled'],
            ])
            ->add('cpf', 'text', [
                'label' => 'CPF',
                'attr' => ['placeholder' => 'Digite o CPF para consultar'],
            ]);
    }
}
