<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contato extends Model
{
    use HasFactory, SoftDeletes;
    public $table = "contato";
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'contato',
        'email',
    ];
}
