<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    
    protected $table = "contact";

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'contact_name', 'contact_email', 'contact_message', 'contact_date'
    ];

    //Test pour git 
    //Branche dev à travailler

}
