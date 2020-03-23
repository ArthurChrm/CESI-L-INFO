<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Document
 *
 * @property int $id
 * @property string $link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $message_id
 * @property-read \App\Message $message
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereMessageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
