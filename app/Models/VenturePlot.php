<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VenturePlot extends Model
{
    use HasFactory;

    public function ventureInfo()
    {
        return $this->hasOne(Venture::class, 'id', 'venture_id');
    }
}
