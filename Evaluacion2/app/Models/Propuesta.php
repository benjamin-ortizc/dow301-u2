<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Propuesta extends Model
{
    use HasFactory;
    use SoftDeletes;
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
