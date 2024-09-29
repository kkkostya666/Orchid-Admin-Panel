<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class IntroText extends Model
{
    use HasFactory;
    use AsSource;

    protected $fillable = [
        'title_1',
        'title_2',
    ];
}
