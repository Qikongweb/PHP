<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{

    use Notifiable;
    use SoftDeletes;


    protected $fillable = [
        'title', 'image_url', 'caption','created_by','last_modified_by','deleted_by'
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
