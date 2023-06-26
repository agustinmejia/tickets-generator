<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TicketPrint extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'user_id', 'game_id', 'branch_office_id', 'type', 'price', 'start_number', 'finish_number', 'observations', 'status'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function branch_office() {
        return $this->belongsTo(BranchOffice::class);
    }

    public function tickets() {
        return $this->hasMany(Ticket::class);
    }
}
