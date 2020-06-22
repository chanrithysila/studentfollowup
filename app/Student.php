<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Comment;
class Student extends Model
{
    protected $fillable = [
        'picture','firstname','lastname','class','description','user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function users(){
        return $this->belongsToMany(Student::class)->withPivot('comment');
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
