<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Selectioner;
use App\Models\Image;
use EloquentFilter\Filterable;

class Violet extends Model
{
    use HasFactory;
    use Filterable;

    protected $fillable = [
        "id", "name", "price", "description", "selectioner_id"
    ];

    protected $attributes = [
        'description' => 'Фиалка'
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
