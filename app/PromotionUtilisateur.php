<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
