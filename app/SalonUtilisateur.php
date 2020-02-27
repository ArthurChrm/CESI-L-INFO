<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalonUtilisateur extends Model
{



    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'salons_utilisateurs';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_user', 'id_salon'];

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

    public function salon(){
        return $this->hasOne('App\Salon');
    }

    public function user(){
        return $this->hasOne('App\User');
    }

}