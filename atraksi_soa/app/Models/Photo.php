<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function getRouteKeyName(): string
    {
        return 'id';
    }

    public function Atraksi() {
        return $this->belongsTo(Atraksi::class);
    }
}
