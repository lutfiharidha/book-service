<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
        'book_name', 'book_description', 'book_status',
    ];
}
