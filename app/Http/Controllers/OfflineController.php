<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;

use Storage;
use DB;
use App\Dataset;

use File;

class OfflineController extends Controller
{
    
   
    public function getIndex()
    {
        $data = Dataset::where('exp2', '1')
                        ->orderBy(DB::raw('RAND()'))    
                        ->paginate(6);

        return view('offline',['data' => $data]);
    }

    public function loadJSON()
    {


        return view('experiment', ['dataset' => json_decode($file,true) ]);
    }
    public function postImageid(Request $request)
    {

        $path = storage_path() . "/json/dataset.json";
        
        if (!File::exists($path)) {
            throw new Exception("Invalid File");
        }

        $dataset = File::get($path); // string

        $imageId = $request['imgId'];
        $building = $request['building'];
        $descriptor = $request['descriptor'];
        $exp1 = $request['exp1'];
        $exp2 = $request['exp2'];        
        
        if ($descriptor == 'Sift')
        {

            $resultPath = File::get(base_path('public/sift_exps/exp2/') . $imageId . '/results.json');
            $classRankPath = File::get(base_path('public/sift_exps/exp2/') . $imageId . '/classRank.json');
            $exp = 2;

        }
        else if ($descriptor == 'Surf')
        {
              
            $resultPath = File::get(base_path('public/surf_exps/exp2/') . $imageId . '/results.json');
            $classRankPath = File::get(base_path('public/surf_exps/exp2/') . $imageId . '/classRank.json');
            $exp = 2;

        }
        
        return view('experiment',['imageId' => $imageId,
                                  'building' => $building,
                                  'exp_path' => strtolower($descriptor) . '_exps',
                                  'log_path' => strtolower($descriptor) . '_logs',
                                  'exp' => 'exp' . $exp,
                                  'match' => '/' . strtolower($descriptor) . '_match.jpg',
                                  'results'=>json_decode($resultPath,true),
                                  'classRank'=>json_decode($classRankPath,true),
                                  'dataset' => json_decode($dataset,true)  ]);
    }
}
