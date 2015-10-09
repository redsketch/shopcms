<?php

namespace App\Models\Eloquents\Entities\Store;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'store';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email'];
    
}
