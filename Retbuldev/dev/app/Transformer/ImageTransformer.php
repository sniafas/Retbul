<?php namespace App\Transformer;
 
use League\Fractal\TransformerAbstract;
 
class ImageTransformer extends TransformerAbstract {
 
    public function transform($image) {
        return [
            'id' => $image->id,
            'image_name' => $image->image_name,
            'building_id' => $image->building_id,
            'experiment' =>	$image->experiment
        ];
    }
 }