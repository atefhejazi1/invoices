<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class sections extends Model
{
    use HasTranslations;

    protected $fillable = [
        "section_name",
        "description",
        "Created_by"
    ];

    public $translatable = ['section_name'];
}
