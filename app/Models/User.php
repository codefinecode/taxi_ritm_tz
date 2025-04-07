<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $fillable = ['login', 'email', 'password'];

    protected $hidden = ['password', 'remember_token',];

    /**
     * Get the attributes that should be cast.
     *
     * @return array
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function isAdmin(): bool
    {
        return $this->id === 1;
    }

    // protected static function booted(): void
    // {
    //     parent::booted();
    //     static::addGlobalScope('no_admin_deletion', function (Builder $builder) {
    //         $builder->where('id', '!=', 1)->orWhereNull('id');
    //     });
    // }
}
