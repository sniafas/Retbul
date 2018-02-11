<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use EllipseSynergie\ApiResponse\Contracts\Response;
use App\Dataset;
use App\Transformer\ImageTransformer;

class ImageController extends Controller
{
    protected $response;

    public function __construct(Response $response)
    {
    	$this->response = $response;
    }

    public function index()
    {
    	//Get dataset's items
    	$image = Dataset::paginate(10);
    	// Return a collection of $images
    	return $this->response->withPaginator($image, new ImageTransformer());
    }

    public function show($id)
    {
    	$image = Dataset::find($id);
    	if (!$image){
    		return $this->response->errorNotFound('Image not found');
    	}

    	return $this->response->withItem($image, new ImageTransformer());
    }

    public function store($id)
    {

    	if ($request->isMethod('put')){
    		//Grab image
    		$image = UserDataset::find($request->image_id);

    		if (!$image){
				return $this->response->errorNotFound('Image Not Found');
    		}
    	}
    	else{
    		$image = new UserDataset;
    	}

    	$image->id = $request->input('image_id');
    	$image->name = $request->input('name');
    	$image->buildingid = $request->input('buildingid');
    	$image->experiment = 0;

    	if($image->save()){
    		return $this->response->withItem($image, new ImageTransformer());	
    	}
    	else{
    		return $this->response->errorInternalError("Could not update");
    	}
    	
    }

}
