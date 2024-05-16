<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    // protected $with = ['atraksi', 'type'];

    public function Atraksi() {
        return $this->belongsTo(Atraksi::class);
    }

    public function Type() {
        return $this->belongsTo(Type::class);
    }

}
