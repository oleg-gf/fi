<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Violet;

class Selectioner extends Model
{
    use HasFactory;

    protected $fillable = [
         "name", "surname", "abbreviation"
    ];

    public function violets()
    {
        return $this->hasMany(Violet::class);
    }
}
