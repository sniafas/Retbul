<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\Uuids;

class Dataset extends Model
{
    //
    public $incrementing = false;
    public $table = 'dataset';
    use Uuids;
}
