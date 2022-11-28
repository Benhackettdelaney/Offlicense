<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function distillery()
    {
        return $this->belongsTo(Distillery::class);
    }

    public function authors()
    {
        return $this->belongstoMany(Author::class)->withTimestamps();
    }


// this model is an object-relatuonal mapper (ORM) 
// it connects to the database and corresponds with the table 
// it allows you to get, insert, update and delete things from the database that was made
}