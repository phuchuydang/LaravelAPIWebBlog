<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['customer_name', 'customer_phone', 'customer_address', 'customer_email', 'customer_city'];
    protected $table = 'tbl_customer';
    protected $primaryKey = 'customer_id';
}
