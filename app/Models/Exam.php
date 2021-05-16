<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $tables = ['exams'];
    protected $guard  = ['id'];
    protected $fillable   = ['name', 'user_id', 'subject_id', 'time', 'degree'];

    /*
    *****************************************************************************
    *************************** Begin RELATIONS Area ****************************
    *****************************************************************************
    */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    } // To Return The Relation Between Exam and User

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    } // To Return The Relation Between Exam and Subject

    public function questions()
    {
        return $this->hasMany(Question::class, 'exam_id', 'id');
    } // To Return The Relation Between Exam and Subject

    /*
    *****************************************************************************
    *************************** Begin SCOPE Area ********************************
    *****************************************************************************
    */
    public function scopeSearch($query, $request)
    {
        return $query->where('user_id', auth()->user()->id)->where($request['column'], 'LIKE', "%" . $request['text'] . "%");
    } // To do Some Query
}
