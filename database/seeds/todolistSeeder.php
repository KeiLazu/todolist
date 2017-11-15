<?php

use Illuminate\Database\Seeder;
use App\todolist;

class todolistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $todolisting = new todolist();
        $todolisting->title = 'test title seeds';
        $todolisting->container = 'test container seeds';
        $todolisting->status = 0;
        // $todolisting->user_id = 1;
        $todolisting->save();
    }
}
