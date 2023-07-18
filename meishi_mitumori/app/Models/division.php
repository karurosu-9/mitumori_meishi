<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $table = 'divisions';
    protected $fillable = ['corp_id', 'division_name'];

    public function corp()
    {
        return $this->belongsTo(Corp::class);
    }

    public function businessCard()
    {
        return $this->belongsTo(BusinessCard::class);
    }
}
