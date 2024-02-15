<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use HasFactory;
    public $table = "contato";
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'contato',
        'email',
    ];
}
