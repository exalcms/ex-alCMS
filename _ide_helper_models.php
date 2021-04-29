<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * Class Association.
 *
 * @package namespace App\Models;
 * @property int $id
 * @property string $raz_soc
 * @property string $cnpj
 * @property string $end
 * @property string|null $comple_end
 * @property string $bairro
 * @property string $cep
 * @property string $cidade
 * @property string $uf
 * @property string $site
 * @property string $email
 * @property string $tel
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Association newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Association newQuery()
 * @method static \Illuminate\Database\Query\Builder|Association onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Association query()
 * @method static \Illuminate\Database\Eloquent\Builder|Association whereBairro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Association whereCep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Association whereCidade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Association whereCnpj($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Association whereCompleEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Association whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Association whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Association whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Association whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Association whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Association whereRazSoc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Association whereSite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Association whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Association whereUf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Association whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Association withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Association withoutTrashed()
 */
	class Association extends \Eloquent implements \Prettus\Repository\Contracts\Transformable, \Bootstrapper\Interfaces\TableInterface {}
}

namespace App\Models{
/**
 * Class City.
 *
 * @package namespace App\Entities;
 * @property int $id
 * @property string $nome
 * @property int $state_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\State $state
 * @method static \Illuminate\Database\Eloquent\Builder|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City newQuery()
 * @method static \Illuminate\Database\Query\Builder|City onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|City query()
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|City withTrashed()
 * @method static \Illuminate\Database\Query\Builder|City withoutTrashed()
 */
	class City extends \Eloquent implements \Prettus\Repository\Contracts\Transformable, \Bootstrapper\Interfaces\TableInterface {}
}

namespace App\Models{
/**
 * Class Country.
 *
 * @package namespace App\Entities;
 * @property int $id
 * @property string $nome
 * @property string $sigla
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newQuery()
 * @method static \Illuminate\Database\Query\Builder|Country onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereSigla($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Country withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Country withoutTrashed()
 */
	class Country extends \Eloquent implements \Prettus\Repository\Contracts\Transformable, \Bootstrapper\Interfaces\TableInterface {}
}

namespace App\Models{
/**
 * Class ElementSite.
 *
 * @package namespace App\Models;
 * @property int $id
 * @property string $quem_somos
 * @property string $text_abert
 * @property string $missao
 * @property string $visao
 * @property string $valores
 * @property string $oferec_title
 * @property mixed $oferec_text
 * @property string $se_associa_title
 * @property string $se_associa_text
 * @property string $histo_title
 * @property string $histo_subtitulo
 * @property string $histo_resum
 * @property string $histo_text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|ElementSite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ElementSite newQuery()
 * @method static \Illuminate\Database\Query\Builder|ElementSite onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ElementSite query()
 * @method static \Illuminate\Database\Eloquent\Builder|ElementSite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElementSite whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElementSite whereHistoResum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElementSite whereHistoSubtitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElementSite whereHistoText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElementSite whereHistoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElementSite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElementSite whereMissao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElementSite whereOferecText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElementSite whereOferecTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElementSite whereQuemSomos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElementSite whereSeAssociaText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElementSite whereSeAssociaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElementSite whereTextAbert($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElementSite whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElementSite whereValores($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElementSite whereVisao($value)
 * @method static \Illuminate\Database\Query\Builder|ElementSite withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ElementSite withoutTrashed()
 */
	class ElementSite extends \Eloquent implements \Prettus\Repository\Contracts\Transformable, \Bootstrapper\Interfaces\TableInterface {}
}

namespace App\Models{
/**
 * Class Image.
 *
 * @package namespace App\Models;
 * @property int $id
 * @property string $name
 * @property string $image_path
 * @property string|null $using
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image query()
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereUsing($value)
 */
	class Image extends \Eloquent implements \Prettus\Repository\Contracts\Transformable, \Bootstrapper\Interfaces\TableInterface {}
}

namespace App\Models{
/**
 * Class State.
 *
 * @package namespace App\Entities;
 * @property int $id
 * @property string $nome
 * @property string $uf
 * @property int $country_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\City[] $cities
 * @property-read int|null $cities_count
 * @property-read \App\Models\Country $country
 * @method static \Illuminate\Database\Eloquent\Builder|State newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|State newQuery()
 * @method static \Illuminate\Database\Query\Builder|State onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|State query()
 * @method static \Illuminate\Database\Eloquent\Builder|State whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereUf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|State withTrashed()
 * @method static \Illuminate\Database\Query\Builder|State withoutTrashed()
 */
	class State extends \Eloquent implements \Prettus\Repository\Contracts\Transformable, \Bootstrapper\Interfaces\TableInterface {}
}

namespace App\Models{
/**
 * Class User.
 *
 * @package namespace App\Models;
 * @property int $id
 * @property string $name
 * @property string $name_full
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $cpf
 * @property string $assoc
 * @property string $dtnasc
 * @property string $sexo
 * @property string|null $rg
 * @property string|null $emissor_rg
 * @property string $end
 * @property string|null $num_end
 * @property string|null $complem_end
 * @property string $cep
 * @property string $bairro
 * @property \App\Models\City|null $city
 * @property string $state
 * @property string $country
 * @property string|null $tel_fixo
 * @property string $celular
 * @property string|null $nome_guerra
 * @property string|null $num_cms
 * @property string|null $ano_ingres
 * @property string|null $ano_saida
 * @property string|null $formacao
 * @property string|null $ocupacao
 * @property string|null $loc_trab
 * @property string|null $tel_com
 * @property string|null $redes_sociais
 * @property string $auto_assoc
 * @property string $auto_mail
 * @property string $assoc_emdia
 * @property string $ex_aluno
 * @property int $role
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $quiz_result
 * @property string|null $indicado_por
 * @property string $cad_ativo
 * @property string $camp_pesq
 * @property string $cad_atualizado
 * @property string|null $ult_atualiz
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property int|null $city_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAnoIngres($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAnoSaida($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAssoc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAssocEmdia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAutoAssoc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAutoMail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBairro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCadAtivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCadAtualizado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCampPesq($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCelular($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereComplemEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCpf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDtnasc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmissorRg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereExAluno($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFormacao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIndicadoPor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLocTrab($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNameFull($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNomeGuerra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNumCms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNumEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereOcupacao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereQuizResult($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRedesSociais($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSexo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTelCom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTelFixo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUltAtualiz($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 */
	class User extends \Eloquent implements \Prettus\Repository\Contracts\Transformable, \Bootstrapper\Interfaces\TableInterface, \Illuminate\Contracts\Auth\MustVerifyEmail {}
}

