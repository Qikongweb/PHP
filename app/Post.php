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
}
