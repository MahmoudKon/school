<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;


    protected $tables = ['salaries'];
    protected $guard = ['id'];
    protected $fillable = ['absence_id', 'salary' ,'deduction', 'incentives', 'rate', 'note'];
    protected $date = ['created_at', 'updated_at'];

    /*
    *****************************************************************************
    *************************** Begin RELATIONS Area ****************************
    *****************************************************************************
    */
    public function absence()
    {
        return $this->belongsTo(Absence::class, 'absence_id', 'id');
    } // To Return The Relation Between Absence and Salary

    /*
    *****************************************************************************
    *************************** Begin SCOPE Area ********************************
    *****************************************************************************
    */
    public function scopeSearch($query, $request)
    {
        return $query->where($request['column'], 'LIKE', "%" . $request['text'] . "%");
    } // To do Some Query
}
