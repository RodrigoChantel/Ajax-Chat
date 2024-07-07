<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'main_chat';

    protected $guarded = [
        'id'
    ];

}
