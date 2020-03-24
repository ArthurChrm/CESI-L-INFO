<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Salon
 *
 * @property int $id
 * @property string $salon_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salon query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salon whereSalonName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salon whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Salon extends Model
{



    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'salons';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['salon_name'];

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
    protected $dates = ['created_at', 'updated_at'];

}
