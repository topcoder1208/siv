<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Province extends Model
{
    use SoftDeletes;

    public $table = 'provinces';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'provincia',
        'regione_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function provinciaCitta()
    {
        return $this->hasMany(Cittum::class, 'provincia_id', 'id');
    }

    public function regione()
    {
        return $this->belongsTo(Regioni::class, 'regione_id');
    }
}
