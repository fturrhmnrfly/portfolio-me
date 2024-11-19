<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificates extends Model
{
    protected $fillable =[
        'name',
        'issued_by',
        'issued_at',
        'description',
        'file',
    ];

    protected $casts = [
        'issued_at' => 'date'
    ];

}
