<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\PasswordReset
 *
 * @property string $email
 * @property string $token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PasswordReset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PasswordReset newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PasswordReset query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PasswordReset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PasswordReset whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PasswordReset whereToken($value)
 * @mixin \Eloquent
 */
class PasswordReset extends Model
{



    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'password_resets';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'token', 'created_at'];

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
    protected $dates = ['created_at'];

}
