<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'kader';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'role',
        'tgl_lahir',
        'tahun_kader',
        'pendidikan',
        'tahun_pelatihan',
        'no_hp',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email_verified_at',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'tgl_lahir' => 'date',
    ];

    protected $appends = [
        'avatar_url'
    ];

    public function getAvatarUrlAttribute()
    {
        if ($this->avatar && Storage::disk('avatars')->exists($this->avatar)) {
            return Storage::disk('avatars')->url($this->avatar);
        }
        return asset('user.jpg');
    }
    public function isAdmin()
    {
        if ($this->role != self::ROLE_ADMIN) {
            return false;
        }
        return true;
    }
    public function getTglLahirAttribute($value)
    {
        return Carbon::parse($value)->toFormattedDate();
    }
    public function getUmurAttribute()
    {
        $now = Carbon::now();
        $tgl_lahir = Carbon::parse($this->tgl_lahir);
        $umur = $tgl_lahir->diffInYears($now);
        return $umur;
    }
}
