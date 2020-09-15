<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use InvalidArgumentException;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /** @return HasMany  */
    public function posts()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * @param string $text 
     * @return Model 
     */
    public function createPost(string $text)
    {
        return $this->posts()->create(['text' => $text]);
    }

    /** @return bool  */
    public function isDisabled()
    {
        return $this->is_disabled;
    }

    /**
     * @return void 
     * @throws InvalidArgumentException 
     */
    public function disable()
    {
        $this->is_disabled = true;
        $this->save();
    }

    public function enable()
    {
        $this->is_disabled = false;
        $this->save();
    }
}
