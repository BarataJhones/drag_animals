<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal_User extends Model
{
    use HasFactory;

    protected $table = 'animal_user';

    protected $fillable = [
        'animal_id',
        'user_id',
        'created_at' => 'date:D-m-y'
    ];

    public function user()
    {
        return $this->belongsTo(User :: class, 'user_id');
    }

    public function animal()
    {
        return $this->belongsTo(Animal :: class, 'animal_id');
    }
}
