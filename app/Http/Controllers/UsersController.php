<?php

namespace App\Http\Controllers;

use App\Forms\UserForm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        if($search == null){
            $users = User::paginate(15);
            return view('admin.users.index', compact('users'));
        }else{
            $users = User::where('camp_pesq', 'LIKE', '%'.$search.'%')->paginate(15);
            return view('admin.users.index', compact('users'));
        }
    }

    public function admin()
    {
        return view('admin.dashboard-admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = \FormBuilder::create(UserForm::class, [
            'url' => route('admin.users.store'),
            'method' => 'POST'
        ]);

        return view('admin.users.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = \FormBuilder::create(UserForm::class);

        $data = $form->getFieldValues();
        Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'name_full' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'celular' => ['required'],
            'cep' => ['required'],
            'dtnasc' => ['required'],
            'ex_aluno' => ['required'],
            'sexo' => ['required'],
            'assoc' => ['required'],
            'indicado_por' => $data['ex_aluno'] == 's' ? [] : ['required', 'exists:users,cpf'],
            'nome_guerra' => $data['ex_aluno'] == 's' ? ['required'] : [],
            'num_cms' => $data['ex_aluno'] == 's' ? ['required'] : [],
            'ano_ingres' => $data['ex_aluno'] == 's' ? ['required'] : [],
            'ano_saida' => $data['ex_aluno'] == 's' ? ['required'] : [],
            'auto_mail' => ['required'],
            'auto_assoc' => ['required'],
            'cpf' => ['required', 'string', 'max:14', 'unique:users', 'cpf'],
        ],
            [
                'cpf.unique' => 'CPF já cadastrado',
                'cpf.cpf' => 'CPF inválido',
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
            ])->validate();

        if(array_key_exists('redes_sociais', $data)) {
            $arr = $data['redes_sociais'];
            $string = implode(', ', $arr);
            $data['redes_sociais'] = $string;
        }

        if($data['ex_aluno'] == 's'){
            $data['role'] = User::ROLE_EXALUNO;
        }else{
            $data['role'] = User::ROLE_VISITANTE;
            $data['nome_guerra'] = 'VISITANTE';
        }

        $dtNasc = explode('/', $data['dtnasc']);
        $data['dtnasc'] = $dtNasc[2].'-'.$dtNasc[1].'-'.$dtNasc[0];
        $data['cad_ativo'] = 'n';
        $data['ult_atualiz'] = now();

        $data['camp_pesq'] = $data['name_full'].' '.$data['name'].' '.$data['nome_guerra'].' '.$data['num_cms'].' '.$data['ano_ingres'].' '.$data['ano_saida'];
        $data['password'] = Hash::make('12345678');

        //dd($data);
        User::create($data);
        $request->session()->flash('msg', 'Usuário Criado com sucesso');
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $form = \FormBuilder::create(UserForm::class, [
            'url' => route('admin.users.update', [ 'user' => $user->id]),
            'method' => 'PUT',
            'model' => $user,
            'data' => ['id' => $user->id],
        ]);

        return view('admin.users.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $form = \FormBuilder::create(UserForm::class);

        $data = array_filter($form->getFieldValues());
        Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'name_full' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'celular' => ['required'],
            'cep' => ['required'],
            'dtnasc' => ['required'],
            'ex_aluno' => ['required'],
            'assoc' => ['required'],
            'cpf' => ['required', 'string', 'max:14', 'cpf', Rule::unique('users')->ignore($user->id)],
        ],
            [
                'cpf.unique' => 'CPF já cadastrado',
                'cpf.cpf' => 'CPF inválido',
                'dtnasc.required' => 'Informe a data de nascimento',
                'assoc.required' => 'Informe se o usuário já está associado!',
            ])->validate();
        $dtNasc = explode('/', $data['dtnasc']);
        $data['dtnasc'] = $dtNasc[2].'-'.$dtNasc[1].'-'.$dtNasc[0];
        $data['camp_pesq'] = $data['name_full'].' '.$data['name'].' '.$data['nome_guerra'].' '.$data['num_cms'].' '.$data['ano_ingres'].' '.$data['ano_saida'];
        $data['ult_atualiz'] = now();

        $user->fill($data);
        $user->save();

        $request->session()->flash('msg', 'Usuário atualizado com sucesso!');
        return redirect()->route('admin.users.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $user->delete();
        $request->session()->flash('msg', 'Usuário deletado com sucesso');
        return redirect()->route('admin.users.index');

    }
}
