<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Vendite extends Model
{
    use SoftDeletes;

    public $table = 'vendites';

    protected $dates = [
        'data_inserimento',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'data_inserimento',
        'ora_inserimento',
        'operatore',
        'servizio_id',
        'quantita',
        'id_agente_id',
        'id_point_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getDataInserimentoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDataInserimentoAttribute($value)
    {
        $this->attributes['data_inserimento'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function servizio()
    {
        return $this->belongsTo(Offerte::class, 'servizio_id');
    }

    public function id_agente()
    {
        return $this->belongsTo(Agenti::class, 'id_agente_id');
    }

    public function id_point()
    {
        return $this->belongsTo(DealerPoint::class, 'id_point_id');
    }
}
