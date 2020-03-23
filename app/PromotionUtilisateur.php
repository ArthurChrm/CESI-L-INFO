<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\PromotionUtilisateur
 *
 * @property int $user_id
 * @property int $promotion_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Promotion $promotion
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromotionUtilisateur newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromotionUtilisateur newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromotionUtilisateur query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromotionUtilisateur whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromotionUtilisateur wherePromotionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromotionUtilisateur whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PromotionUtilisateur whereUserId($value)
 * @mixin \Eloquent
 */
class PromotionUtilisateur extends Model
{



    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'promotions_utilisateurs';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_user', 'id_promotion'];

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

    public function promotion(){
        return $this->hasOne('App\Promotion');
    }

    public function user(){
        return $this->hasOne('App\User');
    }
}
