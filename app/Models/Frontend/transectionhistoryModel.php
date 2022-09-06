<?php

namespace App\Models\frontend;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class transectionhistoryModel extends Model
{
    use HasFactory;

    public function users(){
     return $this->belongsTo(User::class);
    }

}


