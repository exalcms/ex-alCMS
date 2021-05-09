<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); //ok
            $table->string('name_full'); //ok
            $table->string('email')->unique(); //ok
            $table->timestamp('email_verified_at')->nullable(); //automático
            $table->string('cpf')->unique(); //ok
            $table->enum('assoc', ['s', 'n'])->default('n'); //ok
            $table->date('dtnasc'); //ok
            $table->enum('sexo', ['m', 'f']); //ok
            $table->string('rg')->nullable(); //ok
            $table->string('emissor_rg')->nullable(); //ok
            $table->string('end'); //ok
            $table->string('num_end')->nullable(); //ok
            $table->string('complem_end')->nullable(); //ok
            $table->string('cep'); //ok
            $table->string('bairro'); //ok
            $table->string('city'); //ok
            $table->string('state'); //ok
            $table->string('country'); //ok
            $table->string('tel_fixo')->nullable(); //ok
            $table->string('celular'); //ok
            $table->string('nome_guerra')->nullable(); //ok
            $table->string('num_cms')->nullable(); //ok
            $table->string('ano_ingres')->nullable(); //ok
            $table->string('ano_saida')->nullable(); //ok
            $table->string('formacao')->nullable(); //ok
            $table->string('ocupacao')->nullable(); //ok
            $table->string('loc_trab')->nullable(); //ok
            $table->string('tel_com')->nullable(); //ok
            $table->string('redes_sociais')->nullable(); //ok
            $table->enum('auto_assoc', ['s', 'n'])->default('n'); // ok
            $table->enum('auto_mail', ['s', 'n'])->default('n'); //ok
            $table->enum('assoc_emdia', ['s', 'n'])->default('n'); //automatico
            $table->enum('ex_aluno', ['s', 'n'])->default('s'); //ok
            $table->smallInteger('role')->default(2); //automatico
            $table->string('password');
            $table->string('quiz_result')->nullable();
            $table->string('indicado_por')->nullable(); //ok
            $table->enum('cad_ativo', ['s', 'n'])->default('s'); //automático
            $table->text('camp_pesq'); //automático
            $table->enum('cad_atualizado', ['s', 'n'])->default('s');
            $table->dateTime('ult_atualiz')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
