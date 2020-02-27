<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{



    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'documents';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['link', 'id_message'];

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

    public function message(){
        return $this->hasOne('App\Message');
    }

}