<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'deadline',
        'price',
        'working_hour',
        'status',
        'description',
        'currency_id',
        'contactcustomer_id',
        'group_id',
        'user_id',
    ];

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function contactCustomer()
    {
        return $this->belongsTo(ContactCustomer::class, 'contactcustomer_id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
