<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Temoignage extends Model
{
    protected $fillable = ['categorie', 'contenu', 'auteur'];
}
