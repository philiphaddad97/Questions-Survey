<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;


    protected $fillable = ['title', 'email'];


    public function scopeSelectIndex($query)
    {
        return $query->select('surveys.id', 'surveys.email', 'surveys.title', 'surveys.created_at');
    }

    public function mainQuestion()
    {
        return $this->hasOne(Question::class, 'survey_id')->where('type', 'root');
    }


    public function submits()
    {
        return $this->hasMany(Submit::class);
    }


}
