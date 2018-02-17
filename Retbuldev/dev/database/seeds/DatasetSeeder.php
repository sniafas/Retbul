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
		$p=0;
    	DB::table('dataset')->truncate();
		$dataset_raw = File::get("public/vyronas_dataset.json");
		$dataset = json_decode($dataset_raw,true);		
		
		#var_dump($dataset['filename'][899][1]);
				
		foreach ($dataset['filename'] as $data )
		{

			Dataset::create(array(
				'name' => $data[1],
				'buildingid' => $data[2],
				'experiment' => 0,
				'created_at' => new DateTime,
                'updated_at' => new DateTime
				));
				
		}

    }
}
