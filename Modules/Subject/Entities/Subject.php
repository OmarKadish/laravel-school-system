<?php

namespace Modules\Subject\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Teacher\Entities\Teacher;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'teacher_id',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
