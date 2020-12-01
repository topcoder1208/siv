<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class InserimentoSoglieRange extends Model
{
    use SoftDeletes;

    public $table = 'inserimento_soglie_ranges';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'gara_id',
        'percentuale',
        'soglia_minima',
        'soglia_massima',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function gara()
    {
        return $this->belongsTo(GareInserimento::class, 'gara_id');
    }
}
