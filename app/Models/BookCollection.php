<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookCollection extends Model
{
    protected $connection = 'mysql2';

    protected $fillable = [
        'user_id', 'book_id',
    ];

    public function collection_has_book()
    {
        return $this->belongsTo('App\Models\Book', 'book_id');
    }

    public function collection_has_user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

}
