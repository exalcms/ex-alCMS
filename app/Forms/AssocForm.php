<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class AssocForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('raz_soc', 'text', [
                'label' => 'Razão Social',
                'rules' => ['required'],
            ])
            ->add('cnpj', 'text', [
                'label' => 'CNPJ',
                'rules' => ['required'],
            ])
            ->add('end', 'text', [
                'label' => 'Endereço',
                'rules' => ['required'],
            ])
            ->add('bairro', 'text', [
                'label' => 'Bairro',
                'rules' => ['required'],
            ])
            ->add('comple_end', 'text', [
                'label' => 'Complemento',
            ])
            ->add('cep', 'text', [
                'label' => 'CEP',
                'rules' => ['required'],
            ])
            ->add('cidade', 'text', [
                'label' => 'Cidade',
                'rules' => ['required'],
            ])
            ->add('uf', 'text', [
                'label' => 'UF',
                'rules' => ['required'],
            ])
            ->add('site', 'text', [
                'label' => 'Site',
                'rules' => ['required'],
            ])
            ->add('email', 'email', [
                'label' => 'E-mail',
                'rules' => ['required'],
            ])
            ->add('tel', 'tel', [
                'label' => 'Telefone',
                'rules' => ['required'],
            ]);
    }
}
