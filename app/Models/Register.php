<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Database\Eloquent\Model;

class Register extends Authenticatable
{
    protected $table ='registertables';
    protected $fillable=['name','email','password','mobile','image','role'];
}
