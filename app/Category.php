<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\Ticket;

class Category extends Model
{
    protected $fillable = ['name'];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
