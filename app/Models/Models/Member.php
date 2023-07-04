<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Models\Preservation;

class Member extends Model
{
    use HasFactory;
  
    public $itemstamps =false;
    
    public function preservation()
    {
        return $this->belongsTo(Preservation::class);
    }

}
