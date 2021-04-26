<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'celular' => ['required', 'max:15'],
            'end' => ['required', 'string', 'max:255'],
            'cep' => ['required'],
            'bairro' => ['required'],
            'city' => ['required'],
            'state' => ['required'],
            'country' => ['required'],

        ])->validateWithBag('updateProfileInformation');

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'celular' => $input['celular'],
                'tel_fixo' => $input['tel_fixo'],
                'end' => $input['end'],
                'num_end' => $input['num_end'],
                'complem_end' => $input['complem_end'],
                'cep' => $input['cep'],
                'bairro' => $input['bairro'],
                'city' => $input['city'],
                'state' => $input['state'],
                'country' => $input['country'],
                'loc_trab' => $input['loc_trab'],
                'tel_com' => $input['tel_com'],
                'cad_atualizado' => 's',
                'ult_atualiz' => now(),
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
