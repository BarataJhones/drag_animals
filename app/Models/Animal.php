<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $table = 'animals';

    protected $fillable = [
        'id',
        'nameEnglish',
        'namePort',
        'nameSci',
        'user_id',
        'image',
        'audio',
        'order',
        'class',
        'habitat',
        'brazilian'
    ];

    public function user()
    {
        return $this->belongsTo(User :: class, 'user_id');
    }

    public function userAlbum(){
        return $this->belongsToMany('App\Models\User');
    }
}
