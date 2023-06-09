<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profesor extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'profesores';
    public $timestamps = false;

    public function propuestas(): BelongsToMany
    {
      return $this->belongsToMany(Propuesta::class);
    }

    public function propuestaPivot(): BelongsToMany {
      return $this->belongsToMany(Propuesta::class)->withPivot(
        [
          'fecha',
          'hora',
          'comentario'
        ]
      );
    }
}
