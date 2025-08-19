<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = ['title', 'description', 'frequency'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    
    public function responses()
    {
    return $this->hasMany(\App\Models\SurveyResponse::class);
    }
    public function survey()
{
    return $this->belongsTo(Survey::class);
}

}
