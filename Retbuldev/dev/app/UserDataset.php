<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\Uuids;

class UserDataset extends Model
{
    public $table = 'userdataset';
    public $incrementing = false;
    
    use Uuids;
}
