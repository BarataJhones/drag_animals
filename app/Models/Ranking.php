<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    use HasFactory;

    protected $table = 'rankings';

    protected $fillable = [
        'user_id',
        'group_id',
        'time',
        'game_type',
    ];

    public function user()
    {
        return $this->belongsTo(User :: class, 'user_id');
    }

    public function groupRank()
    {
        return $this->belongsTo(Group :: class, 'group_id');
    }
}
