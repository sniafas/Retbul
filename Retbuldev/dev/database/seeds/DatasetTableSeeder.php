<?php

use Illuminate\Database\Seeder;

class DatasetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Dataset::class,20)->create();
    }
}
