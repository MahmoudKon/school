<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'row_id', 'subject', 'semester'];

    /*
    *****************************************************************************
    *************************** Begin RELATIONS Area ****************************
    *****************************************************************************
    */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    } // To Return The Relation Between Subject and User

    public function row()
    {
        return $this->belongsTo(Row::class, 'row_id', 'id');
    } // To Return The Relation Between Subject and User

    public function exams()
    {
        return $this->hasMany(Exam::class, 'subject_id', 'id');
    } // To Return The Relation Between Subject and Exams

    /*
    *****************************************************************************
    *************************** Begin SCOPE Area ********************************
    *****************************************************************************
    */
    public function scopeSearch($query, $request)
    {
        return $query->where($request['column'], 'LIKE', "%" . $request['text'] . "%");
    } // To do Some Query

    /*
    *****************************************************************************
    *************************** Begin ATTRIBUTES Area ***************************
    *****************************************************************************
    */
    public function semester()
    {
        if ($this->semester == 0)
            return '<div class="badge badge-primary">' . __('subjects.first') . '</div>';

        return '<div class="badge badge-info">' . __('subjects.second') . '</div>';
    } // To Return The Sementer Name
}
