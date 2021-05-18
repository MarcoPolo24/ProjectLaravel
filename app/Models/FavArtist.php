<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavArtist extends Model
{
    use HasFactory;

    protected $table = "favourite_artists";
    public $timestamps = false;
    protected $fillable = ['id_artista', 'artist', 'id_usuario', 'id_artista', 'coordinates1', 'coordinates2', 'labels', 'location', 'description', 'timezone', 'updated', 'date'];
}
