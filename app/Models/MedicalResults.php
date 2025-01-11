<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalResults extends Model
{
    protected $fillable = [
        'student_information_id',
        'hematology',
        'hematology_abnormality',
        'hematology_remarks',
        'urinalysis',
        'urinalysis_abnormality',
        'urinalysis_remarks',
        'xray',
        'xray_abnormality',
        'xray_remarks',
        'drugtest',
        'drugtest_abnormality',
        'drugtest_remarks',
        'condition',
        'additional_comments',
        'result_file_path',
        'reviewed_by',
        'uploaded_by',
        'semester',
        'school_year',
        'upload_date',
    ];

    public function student_information()
    {
        return $this->belongsTo(StudentInformation::class);
    }
}
