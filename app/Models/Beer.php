<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function brewery()
    {
        return $this->belongsTo(Brewery::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }
}
