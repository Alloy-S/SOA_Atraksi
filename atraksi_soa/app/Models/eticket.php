<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eticket extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function getRouteKeyName(): string
    {
        return 'id';
    }

}
