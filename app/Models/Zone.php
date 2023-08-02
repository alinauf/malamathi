<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    protected $fillable = [
        'atoll_id',
        'island_id',
        'name',
    ];

    public function atoll()
    {
        return $this->belongsTo(Atoll::class);
    }

    public function island()
    {
        return $this->belongsTo(Island::class);
    }

    public function plots()
    {
        return $this->hasMany(Plot::class);
    }
}
