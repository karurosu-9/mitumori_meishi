<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corp extends Model
{
    use HasFactory;

    protected $table = 'corps';
    protected $fillable = ['corp_name', 'postal_code', 'address', 'tel'];

    //タイムスタンプの自動更新を有効
    public $timestamps = true;

    public function businessCards()
    {
        return $this->hasMany(BusinessCard::class);
    }
}
