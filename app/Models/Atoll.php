<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Atoll extends Model
{
    use SoftDeletes;
    use HasFactory;


    protected $fillable = [
        'name',
        'code',
        'is_city',
    ];

    public function islands()
    {
        return $this->hasMany(Island::class);
    }

}
