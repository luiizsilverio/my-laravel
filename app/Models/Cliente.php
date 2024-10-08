<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nome',
        'email',
        'telefone',
        'empresa',
        'tel_com'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
