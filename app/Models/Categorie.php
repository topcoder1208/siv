<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Categorie extends Model
{
    use SoftDeletes;

    public $table = 'categories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const TIPOLOGIA_SELECT = [
        'Fissa'  => 'Fissa',
        'Mobile' => 'Mobile',
    ];

    protected $fillable = [
        'nome',
        'tipologia',
        'attivo',
        'brand_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function categoriaTecnologia()
    {
        return $this->hasMany(Tecnologium::class, 'categoria_id', 'id');
    }

    public function brandTipologiaGareInserimentos()
    {
        return $this->belongsToMany(GareInserimento::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
