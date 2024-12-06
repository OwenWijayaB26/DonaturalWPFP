<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonateList extends Model
{
    use HasFactory;

    protected $guarded = ['id','publishing_date'];
}
