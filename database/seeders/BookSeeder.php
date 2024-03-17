<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'title' => 'La Sombra del viento',
                'author' => 'Carlos Ruiz Zafón',
                'user_id' => 1,
            ],
            [
                'title' => 'Marina',
                'author' => 'Carlos Ruiz Zafón',
                'user_id' => 2,
            ],
            [
                'title' => 'Bodas de Sangre',
                'author' => 'Federico Garcia Lorca',
                'user_id' => 1,
            ],
            [
                'title' => 'Cien años de soledad',
                'author' => 'Gabriel García Márquez',
                'user_id' => 1,
            ],
            [
                'title' => 'El principito',
                'author' => 'Antoine de Saint-Exupéry',
                'user_id' => 2,
            ],
            [
                'title' => '1984',
                'author' => 'George Orwell',
                'user_id' => 1,
            ],
            [
                'title' => 'Harry Potter y la piedra filosofal',
                'author' => 'J.K. Rowling',
                'user_id' => 2,
            ],
            [
                'title' => 'El hobbit',
                'author' => 'J.R.R. Tolkien',
                'user_id' => 1,
            ],
            [
                'title' => 'Orgullo y prejuicio',
                'author' => 'Jane Austen',
                'user_id' => 2,
            ],
            [
                'title' => 'Matar a un ruiseñor',
                'author' => 'Harper Lee',
                'user_id' => 1,
            ]
        ];
            DB::table('books')->insert($books);
    }
}
