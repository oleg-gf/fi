<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Violet;
use EloquentFilter\Filterable;


class Image extends Model
{
    use HasFactory;
    use Filterable;

    protected $fillable = [
        "url", "violet_id", "path",
    ];

    public function violet()
    {
        return $this->belongsTo(Violet::class);
    }

}
