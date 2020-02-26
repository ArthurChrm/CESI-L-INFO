<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{



    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'messages';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_recipient', 'content', 'id_user', 'id_salon'];

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

    public function sender(){
        return $this->hasOne('App\User');
    }

}
