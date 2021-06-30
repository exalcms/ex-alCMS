<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*

        $citiesTocant[] = array(
            array('nome' => 'Abreulândia', 'state_id' => 27),
            array('nome' => 'Aguiarnópolis', 'state_id' => 27),
            array('nome' => 'Aliança do Tocantins', 'state_id' => 27),
            array('nome' => 'Almas', 'state_id' => 27),
            array('nome' => 'Alvorada', 'state_id' => 27),
            array('nome' => 'Ananás', 'state_id' => 27),
            array('nome' => 'Angico', 'state_id' => 27),
            array('nome' => 'Aparecida do Rio Negro', 'state_id' => 27),
            array('nome' => 'Aragominas', 'state_id' => 27),
            array('nome' => 'Araguacema', 'state_id' => 27),
            array('nome' => 'Araguaçu', 'state_id' => 27),
            array('nome' => 'Araguaína', 'state_id' => 27),
            array('nome' => 'Araguanã', 'state_id' => 27),
            array('nome' => 'Araguatins', 'state_id' => 27),
            array('nome' => 'Arapoema', 'state_id' => 27),
            array('nome' => 'Arraias', 'state_id' => 27),
            array('nome' => 'Augustinópolis', 'state_id' => 27),
            array('nome' => 'Aurora do Tocantins', 'state_id' => 27),
            array('nome' => 'Axixá do Tocantins', 'state_id' => 27),
            array('nome' => 'Babaçulândia', 'state_id' => 27),
            array('nome' => 'Bandeirantes do Tocantins', 'state_id' => 27),
            array('nome' => 'Barra do Ouro', 'state_id' => 27),
            array('nome' => 'Barrolândia', 'state_id' => 27),
            array('nome' => 'Bernardo Sayão', 'state_id' => 27),
            array('nome' => 'Bom Jesus do Tocantins', 'state_id' => 27),
            array('nome' => 'Brasilândia do Tocantins', 'state_id' => 27),
            array('nome' => 'Brejinho de Nazaré', 'state_id' => 27),
            array('nome' => 'Buriti do Tocantins', 'state_id' => 27),
            array('nome' => 'Cachoeirinha', 'state_id' => 27),
            array('nome' => 'Campos Lindos', 'state_id' => 27),
            array('nome' => 'Cariri do Tocantins', 'state_id' => 27),
            array('nome' => 'Carmolândia', 'state_id' => 27),
            array('nome' => 'Carrasco Bonito', 'state_id' => 27),
            array('nome' => 'Caseara', 'state_id' => 27),
            array('nome' => 'Centenário', 'state_id' => 27),
            array('nome' => 'Chapada da Natividade', 'state_id' => 27),
            array('nome' => 'Chapada de Areia', 'state_id' => 27),
            array('nome' => 'Colinas do Tocantins', 'state_id' => 27),
            array('nome' => 'Colméia', 'state_id' => 27),
            array('nome' => 'Combinado', 'state_id' => 27),
            array('nome' => 'Conceição do Tocantins', 'state_id' => 27),
            array('nome' => 'Couto de Magalhães', 'state_id' => 27),
            array('nome' => 'Cristalândia', 'state_id' => 27),
            array('nome' => 'Crixás do Tocantins', 'state_id' => 27),
            array('nome' => 'Darcinópolis', 'state_id' => 27),
            array('nome' => 'Dianópolis', 'state_id' => 27),
            array('nome' => 'Divinópolis do Tocantins', 'state_id' => 27),
            array('nome' => 'Dois Irmãos do Tocantins', 'state_id' => 27),
            array('nome' => 'Dueré', 'state_id' => 27),
            array('nome' => 'Esperantina', 'state_id' => 27),
            array('nome' => 'Fátima', 'state_id' => 27),
            array('nome' => 'Figueirópolis', 'state_id' => 27),
            array('nome' => 'Filadélfia', 'state_id' => 27),
            array('nome' => 'Formoso do Araguaia', 'state_id' => 27),
            array('nome' => 'Fortaleza do Tabocão', 'state_id' => 27),
            array('nome' => 'Goianorte', 'state_id' => 27),
            array('nome' => 'Goiatins', 'state_id' => 27),
            array('nome' => 'Guaraí', 'state_id' => 27),
            array('nome' => 'Gurupi', 'state_id' => 27),
            array('nome' => 'Ipueiras', 'state_id' => 27),
            array('nome' => 'Itacajá', 'state_id' => 27),
            array('nome' => 'Itaguatins', 'state_id' => 27),
            array('nome' => 'Itapiratins', 'state_id' => 27),
            array('nome' => 'Itaporã do Tocantins', 'state_id' => 27),
            array('nome' => 'Jaú do Tocantins', 'state_id' => 27),
            array('nome' => 'Juarina', 'state_id' => 27),
            array('nome' => 'Lagoa da Confusão', 'state_id' => 27),
            array('nome' => 'Lagoa do Tocantins', 'state_id' => 27),
            array('nome' => 'Lajeado', 'state_id' => 27),
            array('nome' => 'Lavandeira', 'state_id' => 27),
            array('nome' => 'Lizarda', 'state_id' => 27),
            array('nome' => 'Luzinópolis', 'state_id' => 27),
            array('nome' => 'Marianópolis do Tocantins', 'state_id' => 27),
            array('nome' => 'Mateiros', 'state_id' => 27),
            array('nome' => 'Maurilândia do Tocantins', 'state_id' => 27),
            array('nome' => 'Miracema do Tocantins', 'state_id' => 27),
            array('nome' => 'Miranorte', 'state_id' => 27),
            array('nome' => 'Monte do Carmo', 'state_id' => 27),
            array('nome' => 'Monte Santo do Tocantins', 'state_id' => 27),
            array('nome' => 'Muricilândia', 'state_id' => 27),
            array('nome' => 'Natividade', 'state_id' => 27),
            array('nome' => 'Nazaré', 'state_id' => 27),
            array('nome' => 'Nova Olinda', 'state_id' => 27),
            array('nome' => 'Nova Rosalândia', 'state_id' => 27),
            array('nome' => 'Novo Acordo', 'state_id' => 27),
            array('nome' => 'Novo Alegre', 'state_id' => 27),
            array('nome' => 'Novo Jardim', 'state_id' => 27),
            array('nome' => 'Oliveira de Fátima', 'state_id' => 27),
            array('nome' => 'Palmas', 'state_id' => 27),
            array('nome' => 'Palmeirante', 'state_id' => 27),
            array('nome' => 'Palmeiras do Tocantins', 'state_id' => 27),
            array('nome' => 'Palmeirópolis', 'state_id' => 27),
            array('nome' => 'Paraíso do Tocantins', 'state_id' => 27),
            array('nome' => 'Paranã', 'state_id' => 27),
            array('nome' => 'Pau D´arco', 'state_id' => 27),
            array('nome' => 'Pedro Afonso', 'state_id' => 27),
            array('nome' => 'Peixe', 'state_id' => 27),
            array('nome' => 'Pequizeiro', 'state_id' => 27),
            array('nome' => 'Pindorama do Tocantins', 'state_id' => 27),
            array('nome' => 'Piraquê', 'state_id' => 27),
            array('nome' => 'Pium', 'state_id' => 27),
            array('nome' => 'Ponte Alta do Bom Jesus', 'state_id' => 27),
            array('nome' => 'Ponte Alta do Tocantins', 'state_id' => 27),
            array('nome' => 'Porto Alegre do Tocantins', 'state_id' => 27),
            array('nome' => 'Porto Nacional', 'state_id' => 27),
            array('nome' => 'Praia Norte', 'state_id' => 27),
            array('nome' => 'Presidente Kennedy', 'state_id' => 27),
            array('nome' => 'Pugmil', 'state_id' => 27),
            array('nome' => 'Recursolândia', 'state_id' => 27),
            array('nome' => 'Riachinho', 'state_id' => 27),
            array('nome' => 'Rio da Conceição', 'state_id' => 27),
            array('nome' => 'Rio Dos Bois', 'state_id' => 27),
            array('nome' => 'Rio Sono', 'state_id' => 27),
            array('nome' => 'Sampaio', 'state_id' => 27),
            array('nome' => 'Sandolândia', 'state_id' => 27),
            array('nome' => 'Santa fé do Araguaia', 'state_id' => 27),
            array('nome' => 'Santa Maria do Tocantins', 'state_id' => 27),
            array('nome' => 'Santa Rita do Tocantins', 'state_id' => 27),
            array('nome' => 'Santa Rosa do Tocantins', 'state_id' => 27),
            array('nome' => 'Santa Tereza do Tocantins', 'state_id' => 27),
            array('nome' => 'Santa Terezinha do Tocantins', 'state_id' => 27),
            array('nome' => 'São Bento do Tocantins', 'state_id' => 27),
            array('nome' => 'São Félix do Tocantins', 'state_id' => 27),
            array('nome' => 'São Miguel do Tocantins', 'state_id' => 27),
            array('nome' => 'São Salvador do Tocantins', 'state_id' => 27),
            array('nome' => 'São Sebastião do Tocantins', 'state_id' => 27),
            array('nome' => 'São Valério da Natividade', 'state_id' => 27),
            array('nome' => 'Silvanópolis', 'state_id' => 27),
            array('nome' => 'Sítio Novo do Tocantins', 'state_id' => 27),
            array('nome' => 'Sucupira', 'state_id' => 27),
            array('nome' => 'Taguatinga', 'state_id' => 27),
            array('nome' => 'Taipas do Tocantins', 'state_id' => 27),
            array('nome' => 'Talismã', 'state_id' => 27),
            array('nome' => 'Tocantínia', 'state_id' => 27),
            array('nome' => 'Tocantinópolis', 'state_id' => 27),
            array('nome' => 'Tupirama', 'state_id' => 27),
            array('nome' => 'Tupiratins', 'state_id' => 27),
            array('nome' => 'Wanderlândia', 'state_id' => 27),
            array('nome' => 'Xambioá', 'state_id' => 27),
        );

        foreach ($citiesTocant as $city) {
            DB::table('cities')->insert($city);
        } */

        $userAdmin[] = array(
            array(
                'name' => 'Claudio',
                'name_full' => 'Antonio Claudio Abreu de Souza',
                'email' => 'claudiosouza.cia@gmail.com',
                'email_verified_at' => null, //now(),
                'cpf' => '217.913.505-00',
                'assoc' => 's',
                'dtnasc' => '1964-05-07',
                'sexo' => 'm',
                'rg' => '01.844.724-40',
                'emissor_rg' => 'SSP/BA',
                'end' => 'Alameda Bosque Imperial',
                'num_end' => '423',
                'complem_end' => 'Bloco 47 - Ap 1001',
                'cep' => '41.250-579',
                'bairro' => 'São Marcos',
                'city' => 'Salvador',
                'state' => 'BA',
                'country' => 'BR',
                'tel_fixo' => null,
                'celular' => '71999094687',
                'nome_guerra' => 'Antonio Claudio',
                'num_cms' => '890',
                'ano_ingres' => '1977',
                'ano_saida' => '1983',
                'formacao' => 'Analista de Sistema / Jornalista',
                'loc_trab' => 'Assembleia Legislativa da Bahia',
                'tel_com' => null,
                'redes_sociais' => null,
                'auto_assoc' => 's',
                'auto_mail' => 's',
                'assoc_emdia' => 's',
                'ex_aluno' => 's',
                'role' => User::ROLE_ADMIN,
                'password' => bcrypt('91316445'),
                'quiz_result' => null,
                'indicado_por' => null,
                'cad_ativo' => 'n', //'s',
                'cad_atualizado' => 'n', //'s',
                'camp_pesq' => 'Antonio Claudio Abreu de Souza 890 1977 1983 CFR-1981 toninho',
            ),
        );

        /*
        foreach ($userAdmin as $user) {
            DB::table('users')->insert($user);
        }
        */

        $assocsPadrao[] = array(
            array(
                'raz_soc' => 'Associação de ex-Alunos do Colégio Militar de Salvador',
                'cnpj' => '13.572.755/0001-02',
                'end' => 'Rua Território do Amapá, 455',
                'bairro' => 'Pituba',
                'cep' => '41.830-540',
                'cidade' => 'Salvador',
                'uf' => 'BA',
                'site' => 'https://www.associacaoexalunoscms.org.br/',
                'email' => 'assoc.exalcms@gmail.com ',
                'tel' => '(71) 99957-8916',
            ),
        );
        foreach ($assocsPadrao as $assoc){
            DB::table('associations')->insert($assoc);
        }
    }
}
