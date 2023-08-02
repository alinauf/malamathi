<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plot extends Model
{
    use HasFactory;

    protected $fillable = [
        'zone_id',
        'name',
        'description',
    ];

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function plotUsages()
    {
        return $this->hasMany(PlotUsage::class);
    }
}
