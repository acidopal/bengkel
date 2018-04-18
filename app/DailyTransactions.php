<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyTransactions extends Model
{
    protected $fillable = [
        'name_item', 'price', 'total_item', 'total'
    ];
}
