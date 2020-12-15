<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class GareInserimentoDettagli extends Model
{
    use SoftDeletes;

    public $table = 'gare_inserimento_dettaglis';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'gare_inserimento_id',
        'tipologia',
        'valore_n_1',
        'valore_n_2',
        'descrizione_valore',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const TIPOLOGIA_SELECT = [
        'Brand'         => 'Brand',
        'Beneficiario'  => 'Beneficiario',
        'Visibilita'    => 'Visibilità',
        'Concorrente'   => 'Concorrente',
        'Servizio'      => 'Servizio',
        'Target'        => 'Target',
        'Soglia Minima' => 'Soglia Minima',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function gara_inserimento()
    {
        return $this->belongsTo(GareInserimento::class, 'gare_inserimento_id');
    }
}
