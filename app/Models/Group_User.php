<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group_User extends Model
{
    use HasFactory;

    protected $table = 'group_user';

    protected $fillable = [
        'group_id',
        'user_id',
        'created_at' => 'date:D-m-y'
    ];

    public function userGr()
    {
        return $this->belongsTo(User :: class, 'user_id');
    }

    public function group()
    {
        return $this->belongsTo(Group :: class, 'group_id');
    }
}
