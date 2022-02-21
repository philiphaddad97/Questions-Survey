<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submit extends Model
{
    use HasFactory;

    protected $fillable = [
        'survey_id'
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
