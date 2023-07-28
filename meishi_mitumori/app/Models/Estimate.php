<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Consts\EstimateFormCountConsts;

class Estimate extends Model
{
    use HasFactory;

    protected $table = 'estimates';
    protected $fillable = ['date', 'corp_id', 'total_price'];
    public $timestamps = true;

    public function __construct(array $attributes = [])
    {
        for ($i = 1; $i <= EstimateFormCountConsts::FORM_NOT_HOSOKU; $i++) {
            $this->fillable[] = 'tekiyo' . $i;
            $this->fillable[] = 'unit_price' . $i;
            $this->fillable[] = 'quantity' . $i;
            $this->fillable[] = 'amount' . $i;
            $this->fillable[] = 'note' . $i;
        }

        parent::__construct($attributes);
    }

    public function corp()
    {
        return $this->belongsTo(Corp::class);
    }
}
