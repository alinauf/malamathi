<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseReportLink extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'case_report_id',
        'link',
        'description',
    ];

    public function caseReport()
    {
        return $this->belongsTo(CaseReport::class);
    }

}
