<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesRecords extends Model
{
    use HasFactory;


    //sales_records
    protected $table = 'sales_records';
    protected $guarded = [];
    public $timestamps = false;
}
