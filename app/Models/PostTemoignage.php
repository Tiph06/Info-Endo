<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostTemoignage extends Model

{
    protected $fillable = ['categorie', 'contenu', 'auteur'];
}
