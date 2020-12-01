<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class InserimentoGareSoglie extends Model
{
    use SoftDeletes;

    public $table = 'inserimento_gare_soglies';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'premio',
        'titolo_id',
        'servizio',
        'percentuale',
        'quantita',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function titolo()
    {
        return $this->belongsTo(GareInserimento::class, 'titolo_id');
    }
}
