<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class MensagemsForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('mensagem_id', 'hidden', [
                'value' => $this->model->id
            ])
            ->add('nome', 'text', [
                'label' => 'Remetente',
            ])
            ->add('email', 'text', [
                'label' => 'Email do Remetente',
            ])
            ->add('tele', 'text', [
                'label' => 'Telefone',
            ])
            ->add('subject', 'text', [
                'label' => 'Assunto',
            ])

            ->add('mensagem', 'textarea', [
                'label' => 'Mensagem',
            ])
            ->add('autor', 'text', [
                'label' => 'Respondido por:',
                'value' => \Auth::user()->name,
            ])
            ->add('resp_autor', 'hidden', [
                'value' => \Auth::user()->id,
            ])
            ->add('resposta', 'textarea', [
                'label' => 'Resposta',
            ])
            ->add('cadastrado', 'text', [
                'label' => 'Remetente Cadastrado?',
                'value' => $this->model->cadastrado == 'n' ? 'Não' : 'Sim',
            ]);
    }
}
