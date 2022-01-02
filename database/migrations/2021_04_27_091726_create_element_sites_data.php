<?php

use App\Models\ElementSite;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElementSitesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $elementSites[] = array(
            array(
                'quem_somos' => 'Aqui você vai começar a conhecer melhor a nossa Associação. Para todos, que dela fazem
                parte, é um prazer imenso ter você aqui!',
                'text_abert' => 'Nós somos uma organização sem fins lucrativos, regularmente registrada que tem a finalidade
                de incentivar e organizar o congraçamento e a união entre os ex-alunos do Colégio Militar de Salvador,
                promovendo a aproximação e o intercâmbio entre eles e incentivar por todos os meios a cooperação, a ajuda
                mútua, o patriotismo, o civismo, a disciplina e o desenvolvimento cultural de seus associados.',
                'missao' => 'Nossa missão é contribuir para a valorização, capacitação, aprimoramento e projeção dos ex-alunos
                do Colégio Militar de Salvador na sociedade, bem como incentivar e organizar o congraçamento e a união
                entre eles e o fortalecimento dos seus laços afetivos com o Exército Brasileiro.',
                'visao' => 'Ser referência para a sociedade como uma associação presente e ativa dentro dos princípios de
                excelência e inovação, de forma que seja percebida pelo ex-aluno do CMS como uma entidade de apoio,
                orientação e de transição entre o ensino médio, passando pela sua formação superior até a sua chegada ao
                mercado profissional, seja ele militar ou civil, constituindo-se assim no maior número de ex-alunos de
                CM’s associados no Brasil.',
                'valores' => 'Civismo e Patriotismo; Responsabilidade com o social e com o ambiental; Integridade, verdade
                e transparência; Comprometimento e trabalho em equipe.',
                'oferec_title' => 'Oferecemos apoio e auxílio para os ex-alunos desde o último ano de estudos no Colégio Militar',
                'oferec_text' => '<p>Todos os atuais alunos do CMS que cursam o 3o ano do Ensino Médio, já podem desfrutar
                                  dos benefícios da nossa Associação. Oferecemos apoio, palestras e iniciamos a integração
                                  deles com os ex-alunos que já se encontram em atividade profissional.</p><p>Essas ações
                                  são de grande importância para quem está iniciando a sua trajetória profissional. Entre
                                  os ex-alunos temos profissionais de todas as áreas, médicos, advogados, militares, civis
                                  que podem auxiliar os recem saidos do CMS a complementar seus estudos e chegar ao mercado
                                  de trabalho referendado.</p><p>Ser um ex-aluno do CMS já representa uma vantagem nas disputas
                                  por vagas no tão concorrido mercado de trabalho, porque todos conhecem o caráter e a formação
                                  que temos dentro do Recinto Sagrado.</p>',
                'se_associa_title' => 'Ser associado custa pouco e garante inúmeras vantagens aos ex-alunos do nosso Cadinho',
                'se_associa_text' => '<p>Para o alunos que sai do Colégio Militar de Salvador, se associar no primeiro ano
                                     é gratuito. Ele só vai começar a pagar a anuidade a partir do segundo ano de filiação.</p>
                                     <p>Para isso basta entrar no site e preencher o seu cadastro. Desta forma você estará
                                     apto a desfrutar de todos os benefícios. Atualmente estamos ampliando os convenios com
                                     iversas instituições e até mesmo faculdades para conseguirmos descontos especiais para
                                     os ex-alunos.</p><p>São muitas as vantagens, além é claro de participar dos eventos de
                                     congraçamento e desta forma ampliar a sua network e aumentar as chances de conseguir uma
                                     boa colocação no mercado.</p>',
                'histo_title' => 'Uma história de dedicação e lutas',
                'histo_subtitulo' => 'Conheça o início de tudo, uma busca incessante pelas condições favoráveis para apoiar os ex-alunos do CMS.',
                'histo_resum' => 'Foi em 1984 quando um grupo de ex-alunos resolveu se unir em prol de um projeto que
                                  incentivasse e mantivesse o espirito colaborativo de amizade e companheirismo desenvolvido
                                  entre os alunos do Recinto Sagrado, para além da temporalidade dos anos de estudos. Desta
                                  forma nasceu a Associação dos ex-alunos do Colégio Militar de Salvador. Com o apoio da própria
                                  instituição conseguimos implementar os propósitos iniciais e dar o ponto de partida. Mais
                                  tarde passamos por várias dificuldade até que em 2008 retomamos o projeto original e fortalecemos
                                  a Associação. Agora estamos buscando uma nova realidade e um avanço nas ações para cada vez
                                  mais estreitar esses laços criados no Colegio Militar de Salvador.',
                'histo_text' => '<p>A Associação dos Ex-alunos do Colégio Militar de Salvador foi fundada no dia 17 de Janeiro
                                 de 1984, no então auditório do CMS. Na reunião de fundação estavam presentes 53 ex-alunos,
                                 que incentivados pelo então Coronel Benito Nino Bisio, comandante do Colégio, tiveram a
                                 iniciativa de fundar a Associação que teve como primeiro presidente, Valmar Fontes Hupsel.
                                 A Associação ergueu-se com os objetivos de congregar os ex-alunos, oferecer atividades de
                                 cunho recreativo, esportivo e sócio-cultural, bem como cooperar com os poderes públicos e
                                 privados no estudo, orientação e solução dos problemas relativos aos interesses da sociedade.</p>
                                 <p>A luta, nas mais variadas vertentes, foi uma constante no dia-a-dia de todos que estiveram
                                 à frente da Associação. A interrupção das atividades do CMS em 1989 representou um grande
                                 impacto para a jovem Associação. Mas sem esmorecer, ela mesma tornou-se uma das principais
                                 articuladoras do renascimento do CMS. Seus membros deram-se as mãos e irmanados, numa
                                 verdadeira força-tarefa, empreenderam as mais variadas ações, tanto no âmbito do governo
                                 estadual baiano, quanto na esfera do então Ministério do Exército. A destemida e cativante
                                 luta travada em prol do CMS, sob a regência do então Tenente-Coronel Ivan Sérgio Martins
                                 de Souza que orquestrava de forma harmônica as diversas ações, envolveram todos os
                                 matizes da sociedade baiana. O resultado não poderia ter sido outro: o Portão das Armas foi
                                 reaberto para que os jovens novamente pudessem ingressar no Recinto Sagrado, em 1994.</p>
                                 <p>Atualmente, a Associação encontra-se numa nova fase, com ampla perspectiva de atividades,
                                 visando superar os vários desafios e adequar-se a celeridade que o tempo lhe impõe. É
                                 inegável que muito se fez. Contudo, é inegável, também, que há muito por fazer. Um planejamento
                                 sistemático a médio e longo prazo está traçado para alcançarmos nosso objetivo. Um aspecto
                                 importante que deve ser ressaltado é o continuado esforço no sentido de promover o encontro
                                 entre as várias gerações. Para tanto a Associação procura sempre se envolver em algumas
                                 atividades inerentes à rotina do CMS, dentre elas: o desfile de sete de setembro; os torneios
                                 de integração entre ex-alunos e alunos do CMS; e os churrascos anuais de confraternização
                                 de ex-alunos e ex-professores que todo fim de ano realizamos.</p><p>Agora com o envolvimento
                                 de mais ex-alunos nossa caminhada será mais produtiva daqui para frente. Temos a satisfação
                                 de sermos mais de 400 ex-alunos cadastrados no e-grupo, um verdadeiro celeiro de profissionais
                                 liberais, empresários, militares, servidores públicos, enfim, uma diversidade que nos enriquece
                                 possibilitando ampliar o horizonte de relacionamento. E, como consequência natural dessa seleta
                                 diversidade, percebemos que estamos imiscuídos nos mais diversos segmentos da sociedade, ganhando,
                                 dessa forma, um diferencial significativo e força inimaginável.</p><p>Essa história vem
                                 sendo construída dia a dia, por cada um dos ex-alunos que se orgulham de um dia terem
                                 feito parte da "mocidade gloriosa altaneira". Aos que hoje habitam o Recinto Sagrado,
                                 lembramos que nesse solo que vocês estão agora, vários meninos e meninas também nele
                                 pisaram. Cada um deixou ali a marca da sua história, o seu anseio, a sua esperança, a sua
                                 vitória, a sua parcela da vida. Mas saibam que concluir seus estudos no CMS não será jamais
                                 o ponto final, mas apenas uma etapa e que aqui estaremos de braços abertos para acolhe-los
                                 e acompanha-los no decorrer das suas vidas, pois os colegas de ontem serão amigos para
                                 sempre.</p>',
                'created_at' => now(),
            ),
        );
        foreach ($elementSites as $element){
            DB::table('element_sites')->insert($element);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $elements = ElementSite::all();
        if ($elements->count() > 0){
            DB::table('element_sites')->delete();
        }
    }
}
