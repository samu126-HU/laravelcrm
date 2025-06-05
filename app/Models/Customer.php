<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'description',
        'customer_type_id',
    ];

    public function customerType()
    {
        return $this->belongsTo(CustomerType::class);
    }

    public function contactCustomers()
    {
        return $this->hasMany(ContactCustomer::class);
    }

    public function customerGroups()
    {
        return $this->hasMany(CustomerGroup::class);
    }
}
