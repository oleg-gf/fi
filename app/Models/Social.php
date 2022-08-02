<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use EloquentFilter\Filterable;

class Social extends Model
{
    use HasFactory;
    use Filterable;

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
