<?php

namespace Modules\Teacher\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Subject\Entities\Subject;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'subject_id',
        'email',
        'phone_number',
        'birth_date',
        'address',

    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
