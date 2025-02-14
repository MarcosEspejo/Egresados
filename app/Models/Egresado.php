<?php
namespace App\Models;
use Illuminate\Contracts\Auth\Authenticatable; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait; 
class Egresado extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;

    protected $fillable = [
        'nombre',
        'apellido',
        'documento',
        'email',
        'programa',
        'ano_graduacion',
        'foto_url',
    ];

    protected $guard = 'web';

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getAttribute($this->getAuthIdentifierName());
    }

    public function getAuthPassword()
    {
        return $this->documento;
    }

    public function getRememberToken()
    {
        return null;
    }

    public function setRememberToken($value)
    {
    }

    public function getRememberTokenName()
    {
        return null;
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function unreadNotifications()
    {
        return $this->notifications()->where('read', false);
    }
}
