<?php

namespace App\Actions\Fortify;

use App\Models\RestaurantDetail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'role' => 'required'
        ])->validate();
        User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'role' => $input['role'],
            'password' => Hash::make($input['password']),
        ]);
        $role = $input['role'];
        if ($role == 'seller') {
            RestaurantDetail::create([
                'name' => null,
                'restaurant_categories_id' => null,
                'address' => null,
                'phone' => null,
                'user_id' => User::all()->last()->id
            ]);
        }
        $user = User::all()->last();
        if ($user->role == 'superAdmin')
            $user->assignRole('superadmin');
        elseif ($user->role == 'seller')
            $user->assignRole('seller');
        return User::all()->last();
    }
}
