<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'cover_image', 'description', 'start_date', 'end_date'];

    public function stages() {
        return $this->hasMany(Stage::class);
    }
}
