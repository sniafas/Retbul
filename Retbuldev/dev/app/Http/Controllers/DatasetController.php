<?php

namespace App\Http\Controllers;

use App\Dataset;
use Illuminate\Http\Request;

class DatasetController extends Controller
{

    public function index()
    {
        $listImage = Dataset::paginate(10);
        return view('welcome',['data' => $listImage]);
        //$listImage = $this->dataset->paginate(20);
        //$response()->json($listImage);
        //$listImage = Dataset::all();
        //return response()->json($listImage);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:500'
        ]);

        return Dataset::create([ 'body' => request('body') ]);
    }

    public function destroy($id)
    {
        $image = Dataset::findOrFail($id);
        $image->delete();
        return 204;
    }
}