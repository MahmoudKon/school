<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $tables = ['questions'];
    protected $guard = ['id'];
    protected $fillable = ['exam_id', 'question', 'answers', 'correct', 'attach'];

    /*
    *****************************************************************************
    *************************** Begin RELATIONS Area ****************************
    *****************************************************************************
    */
    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id', 'id');
    } // To Return The Relation Between Question and Exam

    /*
    *****************************************************************************
    *************************** Begin SCOPE Area ********************************
    *****************************************************************************
    */
    public function scopeSearch($query, $request)
    {
        return $query->whereHas('exam', function ($q) {
            $q->where('user_id', auth()->user()->id);
        })->where($request['column'], 'LIKE', "%" . $request['text'] . "%");
    } // To do Some Query

    public function getAttachPathAttribute()
    {
        if ($this->attach)
            return asset('uploads/images/questions/' . $this->attach);
    } // To Return The Image Path

    // public function setAnswersAttribute($answers)
    // {
    //     return $this->attributes['answers'] = explode(', ', $answers);
    // } // To Return The Image Path

    public function getAnswersAttribute($answers)
    {
        return $answers;
        // return implode(',', $answers);
    } // To Return The Image Path
}
