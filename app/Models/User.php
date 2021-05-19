<?php

namespace App\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class User.
 *
 * @package namespace App\Models;
 */
class User extends Authenticatable implements Transformable, TableInterface, MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use TransformableTrait;
    use SoftDeletes;
    use HasProfilePhoto;

    const ROLE_ADMIN = 1;
    const ROLE_EXALUNO = 2;
    const ROLE_VISITANTE = 3;
    const ROLE_BENEMERITOS = 4;
    const ROLE_ESPECIAIS = 5;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'name_full', 'email', 'cpf', 'assoc', 'dtnasc', 'sexo', 'rg', 'emissor_rg',
        'end', 'num_end', 'complem_end', 'cep', 'bairro', 'city', 'state', 'country', 'city_id', 'tel_fixo',
        'celular', 'nome_guerra', 'num_cms', 'ano_ingres', 'ano_saida', 'formacao',
        'loc_trab', 'tel_com', 'redes_sociais', 'auto_assoc', 'auto_mail', 'assoc_emdia', 'password', 'role',
        'quiz_result', 'indicado_por', 'cad_ativo', 'camp_pesq', 'ex_aluno', 'cad_atualizado', 'ult_atualiz',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function getTableHeaders()
    {
        return ['Nome', 'Nome de guerra', 'Número', 'Ano de ingresso'];
    }

    public function getValueForHeader($header)
    {
        $visit = 'Visitante';
        switch ($header){
            case 'Nome':
                return $this->name_full;
            case 'Nome de guerra':
                return $this->nome_guerra;
            case 'Número':
                return $this->num_cms;
            case 'Ano de ingresso':
                return $this->ano_ingres;
        }
    }


}
