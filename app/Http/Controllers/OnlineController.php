<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;

use DB;
use App\Dataset;
use App\Image;
use Validator;
use File;

class OnlineController extends Controller
{

    public function getIndex()
    {        
        $data = Dataset::all()->random(6);
        $uploaded_data = Image::all();
        return view('online',['data' => $data, 'uploaded_data' => $uploaded_data]);
    }

    public function singleExperiment(Request $request)
    {   

        $imageId = $request['checkbox'];
        if (count($imageId) != 2) return redirect()->back()->withErrors(['Only a couple of images must be selected']);
        $descriptor = strtolower($request['descriptor']);

        if ($descriptor == 'sift') {
            
            $path = 'python ' . public_path('laravel_sift.py ' . $imageId[0] . " " . $imageId[1] );
            exec($path,$output,$return);
        
        }
        else if ($descriptor == 'surf') {
            
            $path = 'python ' . public_path('laravel_surf.py ' . $imageId[0] . " " . $imageId[1] );
            exec($path,$output,$return);

        } 
        else{

            $path = 'python ' . public_path('laravel_orb.py ' . $imageId[0] . " " . $imageId[1] );
            exec($path,$output,$return);            
        }     

        return view('onexperiment', ['output' => $output, 'des' => $descriptor]);
    }

    public function totalExperiment(Request $request)
    {   

        $imageId = $request['checkbox'];
        if (count($imageId) != 1) return redirect()->back()->withErrors(['Only one image must be selected']);

        $image = Image::where('id', $imageId[0] )->get();
        $descriptor = strtolower($request['descriptor']);


       
        if ($descriptor == 'sift') {
            
            $path = 'python ' . public_path('laravelTotal_sift.py ' . $image[0]["file"]);
            exec($path,$output,$return);
        
        }
        else if ($descriptor == 'surf') {
            
            $path = 'python ' . public_path('laravelTotal_surf.py ' . $image[0]["file"] );
            exec($path,$output,$return);

        } 
        else{

            $path = 'python ' . public_path('laravelTotal_orb.py ' . $image[0]["file"] );
            exec($path,$output,$return);            
        }     
        
        $resultPath = File::get(public_path('/') . $output[0] . '/results.json');
        #$resultPath = File::get(public_path('/olmatches/2016-07-24/exp_14:18:09/results.json') );
        
        return view('totalexperiment', ['results'=>json_decode($resultPath,true),
                                        'exp_path' =>  $output[0] . '/' ,
                                        'match' => '_' . $descriptor . '_match.jpg',
                                        'des' => $descriptor
                                        ]);
    }    


    public function create()
    {
        return view('online');
    }

    public function upload(Request $request)
    {
        // Validation //
        $validation = Validator::make($request->all(), [
            'image'     => 'required|image|mimes:jpeg,png|min:1|max:2048'
        ]);

        // Check if it fails //
        if( $validation->fails() ){
            return redirect()->back()->withInput()
                             ->with('errors', $validation->errors() );
        }

        // Process valid data & go to success page //
        $image = new Image;

        // upload the image //
        $file = $request->file('image');
        $destination_path = public_path() . '/uploads/';
        $filename = str_random(6).'_'.$file->getClientOriginalName();
        $file->move($destination_path, $filename);

        // save image data into database //
        $image->file = $filename;
        $image->save();

        return redirect('online')->with('message','You just uploaded an image!');
    }
}
