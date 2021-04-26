<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'name_full' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'celular' => ['required'],
            'cep' => ['required'],
            'dtnasc' => ['required'],
            'ex_aluno' => ['required'],
            'sexo' => ['required'],
            'assoc' => ['required'],
            'indicado_por' => $input['ex_aluno'] == 's' ? [] : ['required', 'exists:users,cpf', 'cpf'],
            'nome_guerra' => $input['ex_aluno'] == 's' ? ['required'] : [],
            'num_cms' => $input['ex_aluno'] == 's' ? ['required'] : [],
            'ano_ingres' => $input['ex_aluno'] == 's' ? ['required'] : [],
            'ano_saida' => $input['ex_aluno'] == 's' ? ['required'] : [],
            'auto_mail' => ['required'],
            'auto_assoc' => ['required'],
            'cpf' => ['required', 'string', 'max:14', 'unique:users', 'cpf'],
            'password' => $this->passwordRules(),
        ],
            [
                'cpf.unique' => 'CPF já cadastrado',
                'cpf.cpf' => 'CPF do usuário é inválido!',
                'password.confirmed' => 'Senhas digitadas não conferem',
                'auto_mail.required' => 'Você precisa informar se autoriza o envio de E-mails.',
                'auto_assoc.required' => 'Você precisa informar se autoriza o envio de avisos da Associação.',
                'sexo.required' => 'Precisa informar seu gênero',
                'dtnasc.required' => 'Informe a sua data de nascimento',
                'ex_aluno.required' => 'Informe se você é ex-aluno.',
                'assoc.required' => 'Informe se você já está associado!',
                'indicado_por.required' => 'Para visitantes, é obrigatório informar o CPF do ex-aluno cadastrado que fez o convite.',
                'indicado_por.exists' => 'O CPF informado na indicação não está cadastrado ou ativo  na plataforma. Favor verificar!',
                'indicado_por.cpf' => 'CPF do ex-aluno que o indicou é inválido, favor verificar!',
                'nome_guerra.required' => 'Informe qual foi o seu Nome de Guerra no Colégio Militar.',
                'num_cms.required' => 'Informe qual foi o seu número no Colégio Militar',
                'ano_ingres.required' => 'Informe o ano que você ingressou no Colégio Militar',
                'ano_saida.required' => 'Informe o ano que você saiu do Colégio Militar',
            ])->validate();

        if(array_key_exists('redes_sociais', $input)) {
            $arr = $input['redes_sociais'];
            $string = implode(', ', $arr);
            $input['redes_sociais'] = $string;
        }

        if($input['ex_aluno'] == 's'){
            $input['role'] = User::ROLE_EXALUNO;
        }else{
            $input['role'] = User::ROLE_VISITANTE;
            $input['nome_guerra'] = 'VISITANTE';
        }

        $dtNasc = explode('/', $input['dtnasc']);
        $input['dtnasc'] = $dtNasc[2].'-'.$dtNasc[1].'-'.$dtNasc[0];
        $data['cad_ativo'] = 'n';
        $data['ult_atualiz'] = now();

        $input['camp_pesq'] = $input['name_full'].' '.$input['name'].' '.$input['nome_guerra'].' '.$input['num_cms'].' '.$input['ano_ingres'].' '.$input['ano_saida'];
        $input['password'] = Hash::make($input['password']);

        //dd($input);

        return User::create($input);
    }

}
