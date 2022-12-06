<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    // this function allows you do this $author->books
    // so if you have an author object, it will return all the books belonging to that author
    public function drinks()
    {
    // return $this->belongstoMany(Drink::class)->withTimestamps();
    }

    
}
