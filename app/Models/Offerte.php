<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Offerte extends Model
{
    use SoftDeletes;

    public $table = 'offertes';

    const TIPOLOGIA_SELECT = [
        'FISSO'  => 'FISSO',
        'MOBILE' => 'MOBILE',
    ];

    protected $dates = [
        'inizio_validita',
        'fine_validita',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nome',
        'inizio_validita',
        'fine_validita',
        'brand_id',
        'tipologia',
        'tecnologia_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getInizioValiditaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setInizioValiditaAttribute($value)
    {
        $this->attributes['inizio_validita'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFineValiditaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFineValiditaAttribute($value)
    {
        $this->attributes['fine_validita'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function tecnologia()
    {
        return $this->belongsTo(Tecnologium::class, 'tecnologia_id');
    }
}
