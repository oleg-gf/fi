<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Violet;


class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        "url", "violet_id"
    ];

    public function violet()
    {
        return $this->belongsTo(Violet::class);
    }

}
