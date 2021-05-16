<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    protected $tables   = ['absences'];
    protected $guard    = ['id'];
    protected $fillable = ['user_id', 'code_id', 'month', 'day', 'Tpresence', 'Tback', 'status', 'note'];
    protected $date     = ['created_at', 'updated_at'];

    /*
    *****************************************************************************
    *************************** Begin RELATIONS Area ****************************
    *****************************************************************************
    */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    } // To Return The Relation Between User and Absences

    public function salaries()
    {
        return $this->hasMany(Salary::class, 'absence_id', 'id');
    } // To Return The Relation between user and absences

    /*
    *****************************************************************************
    *************************** Begin SCOPE Area ********************************
    *****************************************************************************
    */
    public function scopeSearch($query, $request)
    {
        return $query->where('id', '<>', auth()->user()->id)
            ->where($request['column'], 'LIKE', "%" . $request['text'] . "%");
    } // To do Some Query

    /*
    *****************************************************************************
    *************************** Begin ATTRIBUTES Area ***************************
    *****************************************************************************
    */
    public function status()
    {
        if ($this->status == 1)
            return '<div class="badge badge-danger">' . __('absences.absent') . '</div>';

        return '<div class="badge badge-success">' . __('absences.existing') . '</div>';
    } // To Return The Status
}
