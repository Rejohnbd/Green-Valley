<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venture extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('Y-m-d');
    }
}
