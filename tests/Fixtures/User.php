<?php

namespace Firefly\Test\Fixtures;

use Firefly\FireflyUser;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use FireflyUser;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];
}