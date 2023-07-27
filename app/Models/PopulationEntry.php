<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PopulationEntry extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'atoll_id',
        'island_id',
        'men_count',
        'women_count',
        'local_count',
        'expat_count',
        'total_population',
        'logged_date',
        'description',
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
