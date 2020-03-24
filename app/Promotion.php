<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Promotion
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $promotion_name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Promotion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Promotion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Promotion query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Promotion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Promotion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Promotion wherePromotionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Promotion whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Promotion extends Model
{



    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'promotions';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at', 'promotion_name'];

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
