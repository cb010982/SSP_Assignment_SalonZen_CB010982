<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClickCount extends Model
{
    use HasFactory;
    protected $table = 'click_counts';
}
