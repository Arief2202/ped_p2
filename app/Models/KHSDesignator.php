<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KHSDesignator extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    
    public function khs()
    {
        return KHS::where('id', '=', $this->khs_id)->first();
    }
    public function designator()
    {
        return Designator::where('id', '=', $this->designator_id)->first();
    }
}
