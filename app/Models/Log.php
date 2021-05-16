<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $tables   = ['logs'];
    protected $fillable = ['message', 'url', 'page', 'method', 'controller', 'model', 'user_id',];
    protected $date     = ['created_at', 'updated_at'];

    /*
    *****************************************************************************
    *************************** Begin RELATIONS Area ****************************
    *****************************************************************************
    */
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    } // To Return The Relation Between Log and Users

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
    *************************** Begin ATTRIBUTE Area ****************************
    *****************************************************************************
    */
    public function getPageAttribute($page)
    {
        switch ($page) {
            case 'index':
                return $this->attributes['page'] = '<div class="badge badge-info round"> <span> Index </span> <i class="fa fa-eye"></i> </div>';
                break;
            case 'create':
                return $this->attributes['page'] = '<div class="badge badge-info round"> <span> Create </span> <i class="fa fa-plus"></i> </div>';
                break;
            case 'store':
                return $this->attributes['page'] = '<div class="badge badge-warning round"> <span> Store </span> <i class="fa fa-save"></i> </div>';
                break;
            case 'edit':
                return $this->attributes['page'] = '<div class="badge badge-info round"> <span> Edit </span> <i class="fa fa-edit"></i> </div>';
                break;
            case 'update':
                return $this->attributes['page'] = '<div class="badge badge-warning round"> <span> Update </span> <i class="fa fa-"></i> </div>';
                break;
            case 'destroy':
                return $this->attributes['page'] = '<div class="badge badge-danger round"> <span> Destroy </span> <i class="fa fa-trash"></i> </div>';
                break;
            default:
                return $this->attributes['page'] = '<div class="badge badge-info round"> <span> ' . $page . ' </span> <i class="fa fa-eye"></i> </div>';
        }



    } // To Add Some HTML Code

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromDate($date)->diffForHumans();
    } // To Add Some HTML Code
}
