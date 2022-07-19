<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sto extends Model
{
    use HasFactory;

    public function witel()
    {
        return $this->belongsTo(Witel::class, 'witel_id', 'id');
    }
}
