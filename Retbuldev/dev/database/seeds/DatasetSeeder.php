<?php

use Illuminate\Database\Seeder;
use App\Dataset;

class DatasetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('dataset')->truncate();
		$dataset_raw = File::get("public/vyronas_dataset.json");
		$dataset = json_decode($dataset_raw,true);		
		
		foreach ($dataset['dataset'] as $data )
		{
			Dataset::create(array(
				'image_name' => $data[1],
				'building_id' => $data[2],
				'experiment' => 0,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
				));				
		}
	}
}