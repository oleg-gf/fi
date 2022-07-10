<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Social extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'nickname',
        'id_in_social',
        'avatar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
