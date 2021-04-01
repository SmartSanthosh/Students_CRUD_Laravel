<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudBook extends Model
{
    use HasFactory;
    protected $table ="stud_books";
    public $fillable=['student_id','book_id'];  
    
}
