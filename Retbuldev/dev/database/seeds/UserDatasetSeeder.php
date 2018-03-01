<?php

use Illuminate\Database\Seeder;
use App\UserDataset;

class UserDatasetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\UserDataset::class,5)->create();
    }
}
