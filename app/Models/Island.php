<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Island extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'atoll_id',
        'island_category_id',
        'name',
        'code',
    ];

    public function islandCategory()
    {
        return $this->belongsTo(IslandCategory::class);
    }

    public function atoll()
    {
        return $this->belongsTo(Atoll::class);
    }

    public function populationEntries()
    {
        return $this->hasMany(PopulationEntry::class);
    }

    public function zones()
    {
        return $this->hasMany(Zone::class);
    }

    public function ecosystems()
    {
        return $this->hasMany(Ecosystem::class);
    }



}
