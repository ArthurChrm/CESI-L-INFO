<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model  
{

    

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
    protected $fillable = ['name', 'first_name', 'email', 'email_verified_at', 'birth_date', 'address', 'phone_number', 'password', 'remember_token', 'created_at', 'updated_at', 'id_rang'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

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

}
