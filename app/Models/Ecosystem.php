<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ecosystem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'atoll_id',
        'island_id',
        'name',
        'description',
        'is_documented',
        'is_potentially_threatened',
        'is_threatened',
        'is_destroyed',
        'latitude',
        'longitude',
    ];

    public function island()
    {
        return $this->belongsTo(Island::class);
    }

    public function atoll()
    {
        return $this->belongsTo(Atoll::class);
    }

}
