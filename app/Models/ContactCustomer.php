<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactCustomer extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_id',
        'customer_id',
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
