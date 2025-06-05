<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function customerGroups()
    {
        return $this->hasMany(CustomerGroup::class);
    }

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }
}
