<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Agenti extends Model
{
    use SoftDeletes;

    public $table = 'agentis';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_brand_id',
        'codice',
        'agente',
        'conto_contabilita',
        'indirizzo',
        'cap',
        'citta_id',
        'provincia_id',
        'email',
        'telefono',
        'agenzia_responsabile',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function id_brand()
    {
        return $this->belongsTo(Brand::class, 'id_brand_id');
    }

    public function citta()
    {
        return $this->belongsTo(Cittum::class, 'citta_id');
    }

    public function provincia()
    {
        return $this->belongsTo(Province::class, 'provincia_id');
    }
}
