<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KHS extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    public function witel()
    {
        return witel::where('id', '=', $this->witel_id)->first();
    }
    public function sto()
    {
        return sto::where('id', '=', $this->sto_id)->first();
    }
}
