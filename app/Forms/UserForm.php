<?php

namespace App\Forms;

use App\Models\User;
use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Rules;

class UserForm extends Form
{

    public function buildForm()
    {
        $idUserEdit = $this->getData('id');
        $userEdit = User::where('id', '=', $idUserEdit)->first();

        $rede1  = ''; $rede2 = ''; $rede3 = ''; $rede4 = ''; $rede5 = ''; $rede6 = ''; $dtNasc2 = '';
        if($userEdit) {
            $redesShow = $userEdit->redes_sociais;
            $dtNasc = explode('-', $userEdit->dtnasc);
            //dd($dtNasc);
            $dtNasc2 = $dtNasc[2].$dtNasc[1].$dtNasc[0];


            if ($redesShow != null) {
                $redes = explode(', ', $userEdit->redes_sociais);
                $valor = count($redes);

                //dd($redes);
                switch ($valor) {
                    case 1:
                        $rede1 = $redes[0];
                        $rede2 = '';
                        $rede3 = '';
                        $rede4 = '';
                        $rede5 = '';
                        $rede6 = '';
                        break;
                    case 2:
                        $rede1 = $redes[0];
                        $rede2 = $redes[1];
                        $rede3 = '';
                        $rede4 = '';
                        $rede5 = '';
                        $rede6 = '';
                        break;
                    case 3:
                        $rede1 = $redes[0];
                        $rede2 = $redes[1];
                        $rede3 = $redes[2];
                        $rede4 = '';
                        $rede5 = '';
                        $rede6 = '';
                        break;
                    case 4:
                        $rede1 = $redes[0];
                        $rede2 = $redes[1];
                        $rede3 = $redes[2];
                        $rede4 = $redes[3];
                        $rede5 = '';
                        $rede6 = '';
                        break;
                    case 5:
                        $rede1 = $redes[0];
                        $rede2 = $redes[1];
                        $rede3 = $redes[2];
                        $rede4 = $redes[3];
                        $rede5 = $redes[4];
                        $rede6 = '';
                        break;
                    case 6:
                        $rede1 = $redes[0];
                        $rede2 = $redes[1];
                        $rede3 = $redes[2];
                        $rede4 = $redes[3];
                        $rede5 = $redes[4];
                        $rede6 = $redes[5];
                        break;
                }
            }
        }

        //dd($rede1, $rede2, $rede3, $rede4, $rede5, $rede6);

        $this
            ->add('name_full', 'text', [
                'label' => 'Nome Completo*',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => ['oninput' => 'handleInput(event)', 'required' => 'required'],
            ])
            ->add('name', 'text', [
                'label' => 'Nome social',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => ['oninput' => 'handleInput(event)', 'required' => 'required'],
            ])
            ->add('email', 'email', [
                'label' => 'E-mail',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => ['required' => 'required'],
            ])
            ->add('cpf', 'text', [
                'label' => 'CPF',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => ['required' => 'required'],
            ])
            ->add('dtnasc', 'text', [
                'label' => 'Data de Nascimento',
                'label_attr' => ['class' => 'control-label required'],
                'value' => $dtNasc2,
                'attr' => ['required' => 'required'],
            ])
            ->add('role', 'choice', [
                'label' => 'Nível de Acesso',
                'label_attr' => ['class' => 'control-label'],
                'choices' => [1 => 'Administrador', 2 => 'Ex-Aluno', 3 => 'Visitante'],
                'choice_options' => [
                    'wrapper' => ['class' => 'choice-wrapper-my'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('sexo', 'choice', [
                'label' => 'Gênero',
                'label_attr' => ['class' => 'control-label required'],
                'choices' => ['m' => 'Masculino', 'f' => 'Feminino'],
                'choice_options' => [
                    'wrapper' => ['class' => 'choice-wrapper-my'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('assoc', 'choice', [
                'label' => 'Associado?',
                'label_attr' => ['class' => 'control-label required'],
                'choices' => ['s' => 'Sim', 'n' => 'Não'],
                'choice_options' => [
                    'wrapper' => ['class' => 'choice-wrapper-my'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('ex_aluno', 'choice', [
                'label' => 'Ex-Aluno?',
                'label_attr' => ['class' => 'control-label required'],
                'choices' => ['s' => 'Sim', 'n' => 'Não'],
                'choice_options' => [
                    'wrapper' => ['class' => 'choice-wrapper-my'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('indicado_por', 'text', [
                'label' => 'Ind. por(visitante loja)',
            ])
            ->add('rg', 'text', [
                'label' => 'RG',
            ])
            ->add('emissor_rg', 'text', [
                'label' => 'Emissor',
                'attr' => ['oninput' => 'handleInput(event)'],
            ])
            ->add('celular', 'tel', [
                'label' => 'Celular',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => ['required' => 'required'],
            ])
            ->add('tel_fixo', 'tel', [
                'label' => 'Telefone Fixo',
            ])
            ->add('end', 'text',[
                'label' => 'Endereço',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'oninput' => 'handleInput(event)',
                    'required' => 'required'
                ],
            ])
            ->add('num_end', 'text', [
                'label' => 'Num.',
                'attr' => [
                    'oninput' => 'handleInput(event)',
                ],
            ])
            ->add('complem_end', 'text', [
                'label' => 'Complemento',
                'attr' => [
                    'oninput' => 'handleInput(event)',
                ],
            ])
            ->add('cep', 'text', [
                'label' => 'CEP',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => ['required' => 'required'],
            ])
            ->add('bairro', 'text', [
                'label' => 'Bairro',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => ['oninput' => 'handleInput(event)', 'required' => 'required'],
            ])
            ->add('city', 'text', [
                'label' => 'Cidade',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => ['oninput' => 'handleInput(event)', 'required' => 'required'],
            ])
            ->add('state', 'text', [
                'label' => 'UF',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => ['oninput' => 'handleInput(event)', 'required' => 'required'],
            ])
            ->add('country', 'text', [
                'label' => 'País',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => ['oninput' => 'handleInput(event)', 'required' => 'required'],
            ])
            ->add('nome_guerra', 'text', [
                'label' => 'Nome de guerra',
                'attr' => ['oninput' => 'handleInput(event)'],
            ])
            ->add('num_cms', 'text', [
                'label' => 'Número',
            ])
            ->add('ano_ingres', 'text', [
                'label' => 'Ano Ingresso',
            ])
            ->add('ano_saida', 'text', [
                'label' => 'Ano saída',
            ])
            ->add('formacao', 'text', [
                'label' => 'Formação',
                'attr' => ['oninput' => 'handleInput(event)'],
            ])
            ->add('ocupacao', 'text', [
                'label' => 'Ocupação',
                'attr' => ['oninput' => 'handleInput(event)'],
            ])
            ->add('loc_trab', 'text', [
                'label' => 'Local de Trabalho',
                'attr' => ['oninput' => 'handleInput(event)'],
            ])
            ->add('tel_com', 'tel', [
                'label' => 'Tel. Comercial',
            ])
            ->add('redes_sociais', 'choice', [
                'label' => 'Redes Sociais (selecione as que você usa)',
                'choices' =>  ['Facebook' => 'Facebook', 'WhatsApp' => 'WhatsApp', 'Twitter' => 'Twitter',
                    'Sigma' => 'Sigma', 'Telegram' => 'Telegram', 'Instagram' => 'Instagram'],
                'choice_options' => [
                    'wrapper' => ['class' => 'choice-wrapper-rdsoc'],
                    'label_attr' => ['class' => 'label-class'],
                    'attr' => $this->model ? [ 'disabled' => true] : [ 'disabled' => false],
                ],
                'wrapper' => ['class' => 'form-group chkbox'],
                'selected' => $this->model ? [$rede1, $rede2, $rede3, $rede4, $rede5, $rede6] : [],
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('auto_mail', 'choice', [
                'label' => 'Autoriza o envio de E-mail?',
                'label_attr' => ['class' => 'control-label required'],
                'choices' => ['s' => 'Sim', 'n' => 'Não'],
                'choice_options' => [
                    'wrapper' => ['class' => 'choice-wrapper-my'],
                    'label_attr' => ['class' => 'label-class'],
                    'attr' => $this->model ? [ 'disabled' => true] : [ 'disabled' => false],
                ],
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('auto_assoc', 'choice', [
                'label' => 'Autoriza avisos da Associação?',
                'label_attr' => ['class' => 'control-label required'],
                'choices' => ['s' => 'Sim', 'n' => 'Não'],
                'choice_options' => [
                    'wrapper' => ['class' => 'choice-wrapper-my'],
                    'label_attr' => ['class' => 'label-class'],
                    'attr' => $this->model ? [ 'disabled' => true] : [ 'disabled' => false],
                ],
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('cad_ativo', $this->model ? 'choice' : 'hidden', [
                'label' => 'Cadastro Ativo',
                'label_attr' => ['class' => 'control-label'],
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
