<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseReport extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'atoll_id',
        'island_id',
        'ecosystem_id',
        'title',
        'statement',
        'submitted_by',
        'phone',
        'email',
        'latitude',
        'longitude',
        'is_verified',
    ];

    public function atoll()
    {
        return $this->belongsTo(Atoll::class);
    }

    public function island()
    {
        return $this->belongsTo(Island::class);
    }

    public function ecosystem()
    {
        return $this->belongsTo(Ecosystem::class);
    }

    public function caseReportLinks()
    {
        return $this->hasMany(CaseReportLink::class);
    }

}
