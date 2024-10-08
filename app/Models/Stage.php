<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Stage extends Model
{
    use HasFactory;
    protected $table = 'stages';

    // protected $fillable = ['name', 'image', 'location', 'description', 'date', 'travel_id'];
    protected $fillable = ['location', 'description'];

    public function travels() {
        return $this->belongsToMany(Travel::class, 'travel_stage', 'travel_id', 'stage_id');
    }
}
