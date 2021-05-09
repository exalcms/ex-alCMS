<?php

use App\Models\Diretoria;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiretoriaData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $cargosDir[] = array(
            array('cargo' => 'Presidente', 'atribui' => 'Convocar a Diretoria e o Conselho Fiscal, assistindo-lhe as reuniões;
            Convocar as reuniões ordinárias e extraordinárias do Conselho Deliberativo e da Assembleia; Presidir as reuniões
            dos associados, as Assembleias Gerais Extraordinárias e as reuniões do Conselho Deliberativo; Manter a ordem
            nas sessões e reuniões que presidir suspendendo-as ou adiando-as sempre que julgar conveniente; Superintender os
            diversos Departamentos e Serviços da Associação, de acordo com os respectivos regulamentos internos aprovados
            pela Diretoria; Assinar com outro Diretor, indicado pela Diretoria os convênios realizados com entidades nacionais
            e estrangeiras; Assinar com o Diretor Financeiro os cheques e títulos de responsabilidade patrimonial da Associação;
            Autorizar despesas extraordinárias, sujeitando seu ato à aprovação da Diretoria; Nomear comissões representativas
            da Associação de comum acordo com a Diretoria; Delegar ao Vice-Presidente atribuições a si inerentes.', 'ativo' => 's'),
            array('cargo' => 'Vice-Presidente', 'atribui' => 'Comparecer às reuniões da Diretoria e outras reuniões da entidade
            para discutir e votar assuntos; Desempenhar os encargos atinentes à entidade que lhe forem atribuídas pela Diretoria
            ou pelo Presidente; Substituir o Presidente nos seus impedimentos, ausências e renuncias; Estipular, organizar e
            promover reuniões sociais entre os membros da Associação; Representar a Sociedade em reuniões sociais e solenidades.
            Assinar cheques administrativos na ausência do Presidente; Consolidar a diretriz de ação anual das atividades da Associação.', 'ativo' => 's'),
            array('cargo' => 'Secretário', 'atribui' => 'Ler o expediente em sessão de Diretoria, e dar-lhe o destino indicado
            pelo Presidente; Ter sob sua guarda o arquivo da Associação; Publicar na imprensa e/ou comunicar diretamente
            aos associados avisos de interesse social; Organizar a matrícula dos associados; Elaborar, em acordo com o Presidente,
            o relatório anual, submetendo-o à Diretoria, para ser apresentado ao Conselho Deliberativo; Propor as atividades
            necessárias aos serviços da Secretaria, especialmente a correspondência e a redação das atas das sessões da Diretoria,
            memoriais, representações, ofícios e demais papéis do expediente, rubricar os livros de ata da Diretoria, Conselho
            Deliberativo e Assembleia Geral.', 'ativo' => 's'),
            array('cargo' => 'Diretor Financeiro', 'atribui' => 'Arrecadar todas as rendas da Associação e pagar as despesas
            devidamente autorizadas; Ter, sob sua guarda e responsabilidade, todos os valores pertencentes à Associação; Assinar
            com o Presidente os cheques e títulos de responsabilidade patrimonial da Associação; Propor os empregados necessários
            aos serviços da Tesouraria; Superintender a contabilidade da Associação.', 'ativo' => 's'),
            array('cargo' => 'Diretor Jurídico', 'atribui' => 'Orientar o Presidente e o Vice-Presidente nos assuntos concernentes
            ao âmbito jurídico; Emitir parecer nas propostas de parceria com instituições públicas e privadas;', 'ativo' => 's'),
            array('cargo' => 'Diretor de Comunicação Social', 'atribui' => 'Elaborar plano anual de Comunicação da Associação;
            Estabelecer contato com os diversos veículos de comunicação a imprensa; Elaborar os produtos de Comunicação da
            Associação; Manter atualizado o conteúdo da página da Associação na Internet; Divulgar todas as atividades sociais,
            desportivas e culturais organizadas pela Associação.', 'ativo' => 's'),
            array('cargo' => 'Diretor Cultural', 'atribui' => 'Conhecer, examinar e solucionar as matérias relativas ao mesmo,
            dirigindo as atividades culturais da Associação; Organizar todos os programas culturais da Associação, como
            Seminários e Palestras com temas de interesse dos Associados e da Sociedade, mostras artísticas, exibição de
            filmes e demais atividades consideradas úteis aos associados.', 'ativo' => 's'),
            array('cargo' => 'Diretor de Esportes', 'atribui' => 'Elaborar plano de atividades desportivas envolvendo os
            ex-alunos e alunos do CMS; Organizar os programas esportivos promovidos pela Associação.', 'ativo' => 's'),
            array('cargo' => 'Segundo Secretário', 'atribui' => 'Auxiliar o Primeiro Secretário em suas atribuições; Substituí-lo
            em suas faltas ou impedimentos; Sucedê-lo na vaga até o fim do mandato, caso necessário.', 'ativo' => 'n'),
        );
        foreach ($cargosDir as $cargo){
            DB::table('diretorias')->insert($cargo);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $cargos = Diretoria::all();
        if ($cargos->count() > 0 ){
            DB::table('diretorias')->delete();
        }
    }
}
