<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;
    protected $guard_name = 'web'; // ✅ تأكد من ضبط الحارس الصحيح

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'Status',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    private const AVATAR_PALETTE = [
        '#6c5ce7', '#00b894', '#0984e3', '#e17055',
        '#fdcb6e', '#d63031', '#00cec9', '#e84393',
    ];

    public function getAvatarUrlAttribute(): ?string
    {
        return $this->avatar ? asset('storage/' . $this->avatar) : null;
    }

    /**
     * First two letters of the name, shown when no avatar is uploaded.
     */
    public function getInitialsAttribute(): string
    {
        $name = trim((string) $this->name);

        return $name === '' ? '?' : mb_strtoupper(mb_substr($name, 0, 2));
    }

    public function getAvatarColorAttribute(): string
    {
        $index = crc32($this->name ?? '') % count(self::AVATAR_PALETTE);

        return self::AVATAR_PALETTE[$index];
    }
}
