<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;

class Personne extends Model implements Authenticatable
{
    use BasicAuthenticatable;
    protected $table = 'personne';
    protected $fillable = ['nomPers', 'prenomPers', 'emailPers', 'user', 'pass', 'admin', 'avatar'];

    public function getAuthPassword()
    {
        return $this->pass;
    }
}
