<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Profesional extends Model
{
    use HasFactory;

    protected $table = 'profesionales';

    protected $fillable = [
        'nombre_completo',
        'slug',
        'cargo',
        'especialidad',
        'biografia_corta',
        'biografia_completa',
        'foto',
        'enlace_linkedin',
        'email',
        'orden',
        'publicado',
    ];

    protected $casts = [
        'publicado' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Accesor para la URL de la foto
    public function getFotoUrlAttribute()
    {
        if (!$this->foto) {
            return asset('images/default-profile.jpg');
        }
        
        return Str::startsWith($this->foto, 'http') 
            ? $this->foto 
            : asset('storage/' . $this->foto);
    }

    // Accesor para iniciales (útil para avatares)
    public function getInicialesAttribute()
    {
        return Str::initials($this->nombre_completo);
    }

    // Generación automática de slug
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($profesional) {
            if (empty($profesional->slug) || $profesional->isDirty('nombre_completo')) {
                $profesional->slug = Str::slug($profesional->nombre_completo);
            }
        });
    }

    // Scope para profesionales publicados
    public function scopePublicados($query)
    {
        return $query->where('publicado', true);
    }

    // Scope para ordenar por el campo 'orden'
    public function scopeOrdenados($query)
    {
        return $query->orderBy('orden');
    }
}