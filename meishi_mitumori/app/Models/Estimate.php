<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    use HasFactory;

    protected $table = 'estimates';
    protected $fillable = [];

    public $timestamps = true;

    public function corp()
    {
        return $this->belongsTo(Corp::class);
    }
}
