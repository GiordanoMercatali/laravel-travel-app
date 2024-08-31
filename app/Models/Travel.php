<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Travel extends Model
{
    use HasFactory;

    protected $table = 'travels';

    protected $fillable = ['title', 'cover_image', 'description', 'start_date', 'end_date', 'rating'];

    public function stages() {
        return $this->belongsToMany(Stage::class, 'travel_stage', 'travel_id', 'stage_id');
    }
}
