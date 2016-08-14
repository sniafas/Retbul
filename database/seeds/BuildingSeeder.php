<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Dataset;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$p=0;
    	DB::table('datasets')->truncate();
		$photostream = File::get("database/data/photostream.json");
		$buildings = File::get("database/data/buildings.json");
		$photosRaw = json_decode($photostream,true);
		$buildingsRaw = json_decode($buildings,true);

		#var_dump($photosRaw['photo'][0]['id']);
		#var_dump($photosRaw->photo);

		foreach ($photosRaw['photo'] as $imageData )
		{

			foreach ($buildingsRaw['build'] as $build ) {
				for ($i=0; $i < 15 ; $i++) {

					if ($imageData['title'] == $build[1][$i])
					{

						#echo $imageData['id'];
						#echo  $imageData->photo->title, $imageData->photo->id, $imageData->photo->url_l;
						
						Dataset::create(array(
							'title' => $imageData['title'],
							'imgId' => $imageData['id'],
							'url' => $imageData['url_l'],
							'building' => $build[0],
							'created_at' => new DateTime,
			                'updated_at' => new DateTime
							));
						$p+=1;
					}
					
				}

				//print sizeof($photosRaw['photo']) . "\n";
		    }
		}
		echo $p;
	}
}