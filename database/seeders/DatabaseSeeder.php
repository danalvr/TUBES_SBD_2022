<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Level;
use App\Models\Book;
use App\Models\Customer;
use App\Models\Transaction;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'level_name' => 'central admin',
            'description' => 'Have a full access on dashboard',
        ]);
        Level::create([
            'level_name' => 'Supplier Admin',
            'description' => 'Have access on suplier dashboard',
        ]);
        Level::create([
            'level_name' => 'Cashier Admin',
            'description' => 'Have access on cashier dashboard',
        ]);
        
        User::create([
            'name' => 'Daniel Alvaro',
            'username' => 'danalvr_',
            'email' => 'danielalvaro@students.undip.ac.id',
            'password' => '$2a$12$IW.4ncypZhcVnAuf0S5PyuPpyLxBF9Q2yHnpTeeIEE8RLkh.CEMN6',
            'level_id' => 1
        ]);
        User::create([
            'name' => 'Budiman Santoso',
            'username' => 'budimans6',
            'email' => 'santosobudiman@students.undip.ac.id',
            'password' => '$2a$12$IW.4ncypZhcVnAuf0S5PyuPpyLxBF9Q2yHnpTeeIEE8RLkh.CEMN6',
            'level_id' => 2
        ]);
        User::create([
            'name' => 'Pipit Nurhayati',
            'username' => 'pipitnur08',
            'email' => 'pipitnurhayati@students.undip.ac.id',
            'password' => '$2a$12$IW.4ncypZhcVnAuf0S5PyuPpyLxBF9Q2yHnpTeeIEE8RLkh.CEMN6',
            'level_id' => 3
        ]);

        Book::create([
            'title' => 'Naruto The last Movie',
            'price' => 150000,
            'publisher' => 'Shonen Jump',
            'author' => 'Masashi Kishimoto',
            'stock_amount' => 10,
            'publication_year' => '2022-12-01',
            'supplier_id' => 2,
        ]);

        Book::create([
            'title' => 'One Piece',
            'price' => 140000,
            'publisher' => 'Shonen Jump',
            'author' => 'Eiichiro Oda',
            'stock_amount' => 20,
            'publication_year' => '2022-08-02',
            'supplier_id' => 2,
        ]);
    }
}
