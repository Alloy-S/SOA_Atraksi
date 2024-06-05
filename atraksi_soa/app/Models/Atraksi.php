<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Atraksi extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = [
        'id'
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function Paket() {
        return $this->hasMany(Paket::class);
    }

    public function Photo() {
        return $this->hasMany(Photo::class);
    }

    public function JamBuka() {
        return $this->hasMany(JamBuka::class);
    }

    public function tgl_tutup() {
        return $this->hasMany(tgl_tutup::class);
    }
}
