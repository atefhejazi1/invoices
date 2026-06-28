<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class products extends Model
{
    use HasTranslations;

    protected $fillable = [
        "Product_name",
        "description",
        "section_id"
    ];

    public $translatable = ['Product_name'];

    public function section()
    {
        return $this->belongsTo(sections::class);
    }
}
