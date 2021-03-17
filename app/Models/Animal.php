<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $table = 'animals';

    protected $fillable = [
        'name',
        'user_id',
        'image',
        'class',
        'order',
        'habitat',
        'aulaVideo',
        'brazilian',
        //'audio'
    ];

    public function user()
    {
        return $this->belongsTo(User :: class, 'user_id');
    }
}
