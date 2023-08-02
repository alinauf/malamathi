<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlotUsage extends Model
{
    use HasFactory;
    use SoftDeletes;


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
