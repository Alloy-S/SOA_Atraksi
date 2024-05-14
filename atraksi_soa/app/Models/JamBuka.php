<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JamBuka extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function Atraksi() {
        return $this->belongsTo(Atraksi::class);
    }
}
