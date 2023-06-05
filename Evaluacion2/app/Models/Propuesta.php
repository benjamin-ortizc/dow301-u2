<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Propuesta extends Model
{
    use HasFactory;
    protected $table = 'propuestas';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    public function profesorPivot(): BelongsToMany {
      return $this->belongsToMany(Profesor::class)->withPivot(
        [
          'fecha',
          'hora',
          'comentario'
        ]
      );
    }
}
