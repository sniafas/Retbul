<?php namespace App\Transformer;
 
use League\Fractal\TransformerAbstract;
 
class TaskTransformer extends TransformerAbstract {
 
    public function transform($image) {
        return [
            'id' => $image->id,
            'name' => $image->name,
            'building_id' => $image->buildingid,
            'experiment' =>	$image->experiment
        ];
    }
 }