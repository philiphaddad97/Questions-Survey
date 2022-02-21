<?php

namespace App\Models;

use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    use HasFactory;


    public $timestamps = false;


    protected $fillable
        = [
            'parent_id', 'parent_answer', 'text','question_no', 'survey_id', 'type'
        ];


    public function childs()
    {
        return $this->hasMany(Question::class, 'parent_id');
    }

    public function scopeSelectIndex($query)
    {
        return $query->select('id', 'text', 'parent_answer', 'parent_id');
    }

    public function scopeShow($query, $id, $answer)
    {
        return $query->where('parent_id', $id)
                     ->where('parent_answer', $answer)
                     ->where('type', 'node')->selectIndex();
    }


}
