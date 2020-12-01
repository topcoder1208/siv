<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class GareInserimento extends Model
{
    use SoftDeletes;

    public $table = 'gare_inserimentos';

    const ESITO_RADIO = [
        '1' => 'Sì',
        '0' => 'No',
    ];

    const METODO_CALCOLO_RADIO = [
        '1' => 'Sì',
        '0' => 'No',
    ];

    const METODO_FAMIGLIA_RADIO = [
        'Accesso TIM' => 'Accesso TIM',
        'Rete Fissa'  => 'Rete Fissa',
    ];

    protected $dates = [
        'validita_inizio',
        'validita_fine',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'titolo',
        'tipologia_gara',
        'validita_inizio',
        'validita_fine',
        'esito',
        'esito_incremento',
        'esito_decremento',
        'numero_fasce_previste',
        'servizi',
        'metodo_attribuzione',
        'metodo_calcolo',
        'metodo_famiglia',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getValiditaInizioAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setValiditaInizioAttribute($value)
    {
        $this->attributes['validita_inizio'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getValiditaFineAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setValiditaFineAttribute($value)
    {
        $this->attributes['validita_fine'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function brand_tipologias()
    {
        return $this->belongsToMany(Categorie::class);
    }

    public function visibilitas()
    {
        return $this->belongsToMany(SoggettiTipologium::class);
    }

    public function esito_negativos()
    {
        return $this->belongsToMany(Offerte::class);
    }
}
