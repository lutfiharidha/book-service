<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 6; $i++) { 
            $book = new Book();
            $book->book_name = "Buku Matematika SD Kelas ".$i;
            $book->book_description = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque eaque deserunt doloremque aspernatur error? Odit eum iusto labore quod explicabo eius, tempore quo. Reiciendis ducimus aut quas nemo facilis officiis?";
            $book->save();
        }
    }
}
