<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'first_name', 'email', 'birth_date', 'address', 'phone_number', 'id_rang'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['email_verified_at', 'birth_date', 'created_at', 'updated_at'];

    public function rang()
    {
        return $this->hasOne('App\Rang');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::forceCreate([
            'name' => $data['name'],
            'first_name' => $data['first_name'],
            'email' => $data['email'],
            'birth_date' => $data['birth_date'],
            'address' => $data['address'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make($data['password']),
            'api_token' => Str::random(80),
            'rang_id' => $data['rang_id'],
        ]);
    }
}
