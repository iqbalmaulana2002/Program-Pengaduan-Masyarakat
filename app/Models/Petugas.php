<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Petugas extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'petugas';

    protected $guard = 'petugas';

    protected $fillable = ['nama', 'username', 'password', 'email', 'telp', 'level'];

    protected $hidden = 'password';

    public function tanggapan()
    {
        return $this->hasMany(Tanggapan::class, 'id_petugas');
    }

}
