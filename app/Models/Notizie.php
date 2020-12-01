<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;

class Notizie extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'notizies';

    protected $appends = [
        'file_pdf',
    ];

    const AUTORIZZATI_SELECT = [
        'PDV'     => 'PDV',
        'Agenti'  => 'Agenti',
        'Auditor' => 'Auditor',
    ];

    protected $dates = [
        'inizio_visualizzazione',
        'fine_visualizzazione',
        'visualizza_primapagina',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'titolo',
        'brand_id',
        'descrizione_breve',
        'inizio_visualizzazione',
        'fine_visualizzazione',
        'visualizza_primapagina',
        'link',
        'autorizzati',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function getInizioVisualizzazioneAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setInizioVisualizzazioneAttribute($value)
    {
        $this->attributes['inizio_visualizzazione'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFineVisualizzazioneAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFineVisualizzazioneAttribute($value)
    {
        $this->attributes['fine_visualizzazione'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getVisualizzaPrimapaginaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setVisualizzaPrimapaginaAttribute($value)
    {
        $this->attributes['visualizza_primapagina'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFilePdfAttribute()
    {
        return $this->getMedia('file_pdf');
    }
}
