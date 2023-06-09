<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    use HasFactory;
    protected $table='chats';
    protected $PrimaryKey='id';
    protected $fillable =[
        'to_id',
       
        'message'
    ];
}
