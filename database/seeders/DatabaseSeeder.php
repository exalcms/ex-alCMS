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
        $userAdmin[] = array(
            array(
                'name' => 'Claudio',
                'name_full' => 'Antonio Claudio Abreu de Souza',
                'email' => 'claudiosouza.cia@gmail.com',
                'email_verified_at' => now(),
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
                'celular' => '(71)999094687',
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
                'cad_ativo' => 's',
                'cad_atualizado' => 's',
                'camp_pesq' => 'Antonio Claudio Abreu de Souza 890 1977 1983 CFR-1981 toninho',
            ),
        );


        foreach ($userAdmin as $user) {
            DB::table('users')->insert($user);
        }


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
