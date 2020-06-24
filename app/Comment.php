<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Student;
class Comment extends Model
{
    
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function students(){
        return $this->belongsTo(Student::class);
    }
}
