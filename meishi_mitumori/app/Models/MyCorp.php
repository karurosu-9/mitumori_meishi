<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyCorp extends Model
{
    use HasFactory;

    protected $table = 'my_corp';
    protected $fillable = ['corp_name', 'postal_code', 'address', 'tel', 'fax', 'place', 'conditions', 'deadline'];

    public $timestamps = true;
}
