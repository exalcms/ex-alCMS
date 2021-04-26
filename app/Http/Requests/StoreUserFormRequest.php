<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'name_full' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'dtnasc' => ['required'],
            'ex_aluno' => ['required'],
            'sexo' => ['required'],
            'assoc' => ['required'],
            'indicado_por' => ['required_if:ex_aluno,n|exists:users,cpf'],
            'nome_guerra' => ['required_if:ex_aluno,s'],
            'num_cms' => ['required_if:ex_aluno,s'],
            'ano_ingres' => ['required_if:ex_aluno,s'],
            'ano_saida' => ['required_if:ex_aluno,s'],
            'auto_mail' => ['required'],
            'auto_assoc' => ['required'],
            'cpf' => ['required', 'string', 'max:14', 'unique:users'],
        ];
    }

    public function messages()
    {
        return [
            'cpf.unique' => 'CPF já cadastrado',
            'auto_mail.required' => 'Você precisa informar se autoriza o envio de E-mails.',
            'auto_assoc.required' => 'Você precisa informar se autoriza o envio de avisos da Associação.',
            'sexo.required' => 'Precisa informar seu gênero',
            'dtnasc.required' => 'Informe a sua data de nascimento',
            'ex_aluno.required' => 'Informe se você é ex-aluno.',
            'assoc.required' => 'Informe se você já está associado!',
            'indicado_por.required' => 'Para visitantes, é obrigatório informar o CPF do ex-aluno cadastrado que fez o convite.',
            'indicado_por.exists' => 'O CPF informado na indicação não está cadastrado ou ativo  na plataforma. Favor verificar!',
            'nome_guerra.required' => 'Informe qual foi o seu Nome de Guerra no Colégio Militar.',
            'num_cms.required' => 'Informe qual foi o seu número no Colégio Militar',
            'ano_ingres.required' => 'Informe o ano que você ingressou no Colégio Militar',
            'ano_saida.required' => 'Informe o ano que você saiu do Colégio Militar',
        ];
    }
}
