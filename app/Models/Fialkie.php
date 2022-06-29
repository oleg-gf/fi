<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Selectioner;
use App\Models\Image;

class Fialkie extends Model
{
    use HasFactory;

    protected $fillable = [
        "name", "price", "description", "selectioner_id"
    ];

    public function selectioner()
    {
        return $this->belongsTo(Selectioner::class);
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }
}
