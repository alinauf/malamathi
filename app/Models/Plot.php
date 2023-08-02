<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plot extends Model
{
    use HasFactory;
    use SoftDeletes;


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
