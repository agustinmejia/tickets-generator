<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];

    public function local() {
        return $this->belongsTo(Team::class, 'local_id');
    }

    public function visitor() {
        return $this->belongsTo(Team::class, 'visitor_id');
    }
}
