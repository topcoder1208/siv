<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class DealerPoint extends Model
{
    use SoftDeletes;

    public $table = 'dealer_points';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_dealer_id',
        'conto_contabilita',
        'codice',
        'point',
        'indirizzo',
        'cap',
        'citta_id',
        'provincia_id',
        'email',
        'telefono',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function idPointVendites()
    {
        return $this->hasMany(Vendite::class, 'id_point_id', 'id');
    }

    public function id_dealer()
    {
        return $this->belongsTo(Dealer::class, 'id_dealer_id');
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
