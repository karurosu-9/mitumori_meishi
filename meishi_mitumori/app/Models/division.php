<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class division extends Model
{
    use HasFactory;

    protected $table = 'division';
    protected $fillable = ['division'];

    public function corp()
    {
        return $this->belongsTo(Corp::class);
    }

    public function businessCard()
    {
        return $this->belongsTo(BusinessCard::class);
    }
}