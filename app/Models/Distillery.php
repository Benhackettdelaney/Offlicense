<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distillery extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address'];

    // returns the publisher's books
    // eg. $publisher->books
    public function drinks()
    {
        return $this->hasMany(Drink::class);
    }
}
