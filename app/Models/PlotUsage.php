<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlotUsage extends Model
{
    use HasFactory;

    protected $fillable = [
        'plot_id',
        'owner_name',
        'purpose',
        'description',
    ];

    public function plot()
    {
        return $this->belongsTo(Plot::class);
    }
}
