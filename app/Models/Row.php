<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Row extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /*
    *****************************************************************************
    *************************** Begin RELATIONS Area ****************************
    *****************************************************************************
    */
    public function subjects()
    {
        return $this->hasMany(Subject::class, 'row_id', 'id');
    } // To Return The Relation Between Class and Subjects
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
}
