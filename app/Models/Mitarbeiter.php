<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitarbeiter extends Model
{
    use HasFactory;

    protected $fillable = ["firmen_id", "vorname", "nachname", "email"];
    protected $table = "mitarbeiter";
    public function firma()
    {
        return $this->belongsTo(Firma::class, "firmen_id");
    }
}
