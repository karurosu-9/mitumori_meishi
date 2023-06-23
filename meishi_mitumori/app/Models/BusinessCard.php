<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessCard extends Model
{
    use HasFactory;

    protected $table = 'business_cards';
    protected $fillable = ['corp_id', 'division', 'title', 'employee_name', 'mobile_phone'];

    //タイムスタンプの自動更新を有効
    public $timestamps = true;

    public function corp()
    {
        return $this->belongsTo(Corp::class);
    }
}
