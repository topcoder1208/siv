<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class DealerMandati extends Model
{
    use SoftDeletes;

    public $table = 'dealer_mandatis';

    protected $dates = [
        'inizio',
        'fine',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATUS_SELECT = [
        'Attivo'         => 'Attivo',
        'Finito mandato' => 'Finito Mandato',
        'Revocato'       => 'Revocato',
    ];

    protected $fillable = [
        'brand_id',
        'inizio',
        'fine',
        'status',
        'id_dealer_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function getInizioAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setInizioAttribute($value)
    {
        $this->attributes['inizio'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFineAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFineAttribute($value)
    {
        $this->attributes['fine'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function id_dealer()
    {
        return $this->belongsTo(Dealer::class, 'id_dealer_id');
    }
}
