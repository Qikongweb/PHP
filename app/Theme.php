<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Theme extends Model
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'url', 'isDefault','created_by','last_modified_by','deleted_by'
    ];

    public function userCreate()
    {
        return $this->belongsTo('App\User','created_by');
    }

    public function userDelete()
    {
        return $this->belongsTo('App\User','deleted_by');
    }

    public function userModify()
    {
        return $this->belongsTo('App\User','last_modified_by');
    }

}
