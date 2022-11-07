<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// Drink and model are connected and drink will be populated information from the database to display on the website
class Drink extends Model
{
    use HasFactory; 

    protected $guarded = [];
}

// this model is an object-relatuonal mapper (ORM) 
// it connects to the database and corresponds with the table 
// it allows you to get, insert, update and delete things from the database that was made
// $guarded is used when storing data from the factory where the information will be fillable