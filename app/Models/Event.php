<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address', 'bio'];

    // this function allows you do this $author->books
    // so if you have an author object, it will return all the books belonging to that author
    public function drinks()
    {
        return $this->belongstoMany(Drink::class)->withTimestamps();
    }

    public function distilleries()
    {
        return $this->belongstoMany(Distillery::class);
    }

    public function events()
    {
        return $this->belongstoMany(Event::class)->withTimestamps();;
    }

    
}