<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sendmessage extends Model
{
    use HasFactory;
    protected $table='sendmessage';
    protected $PrimaryKey='id';

    protected $fillable =[
        'to_id',
        'from_id',
        'message'
    ];

//     public function Sender()
// {
//     return $this->hasMany(Sender::class);
// }

// public function Reciver()
// {
//     return $this->belongsTo(Reciver::class);
// }

}
