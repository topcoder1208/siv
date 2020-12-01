<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Dealer extends Model
{
    use SoftDeletes;

    public $table = 'dealers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'dealer',
        'indirizzo',
        'cap',
        'citta_id',
        'provincia_id',
        'email',
        'telefono',
        'conto_contabilita',
        'codice',
        'stato',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function idDealerDealerPoints()
    {
        return $this->hasMany(DealerPoint::class, 'id_dealer_id', 'id');
    }

    public function idDealerSoggettiRelationships()
    {
        return $this->hasMany(SoggettiRelationship::class, 'id_dealer_id', 'id');
    }

    public function idDealerDealerMandatis()
    {
        return $this->hasMany(DealerMandati::class, 'id_dealer_id', 'id');
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
