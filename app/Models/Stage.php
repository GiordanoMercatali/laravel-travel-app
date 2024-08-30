<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Stage extends Model
{
    use HasFactory;
    protected $table = 'stages';

    protected $fillable = ['name', 'image', 'location', 'description', 'date', 'travel_id'];

    public function travels() {
        return $this->belongsTo(Travel::class);
    }
}
