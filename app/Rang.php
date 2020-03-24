<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Rang
 *
 * @property int $id
 * @property string $rang_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rang query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rang whereRangName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rang whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Rang extends Model
{



    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rangs';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['rang_name'];

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
