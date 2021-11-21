<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mitarbeiter;
class Firma extends Model
{
    use HasFactory;
    protected $fillable = ["firmenname"];
    protected $table = "firmen";
    public function workers()
    {
        return $this->hasMany(Mitarbeiter::class, "firmen_id");
    }
}
