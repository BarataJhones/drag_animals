<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'groups';

    protected $fillable = [
        'id',
        'name',
        'user_id', //adm
        'image',
        'about',
        'created_at' => 'date:D-m-y'
    ];

    public function userAdm()
    {
        return $this->belongsTo(User :: class, 'user_id');
    }

    public function usersGroup(){
        return $this->belongsToMany('App\Models\User');
    }
}
