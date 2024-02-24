<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';
    protected $primaryKey = 'id';
    protected $fillable = ['teacher_id', 'name'];

    public function teacher(){
        return $this->belongsTo(User::class);
    }

    public function students(){
        return $this->belongsToMany(User::class, 'course_student', 'course_id', 'student_id');
    }

}
