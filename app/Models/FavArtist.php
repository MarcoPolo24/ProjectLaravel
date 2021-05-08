<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavArtist extends Model
{
    use HasFactory;

    protected $table = "favourite_artists";
    public $timestamps = false;
    protected $fillable = ['id_artista', 'nombre_artista', 'id_usuario', 'id_artista'];
}
