<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait, HasFactory, Notifiable;

    protected $guard = 'user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'full_name',
        'email',
        'address',
        'phone',
        'job',
        'personal_id',
        'age',
        'password',
        'image',
        'code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token',];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['email_verified_at' => 'datetime',];

    /*
    *****************************************************************************
    *************************** Begin RELATIONS Area ****************************
    *****************************************************************************
    */
    public function absences()
    {
        return $this->hasMany(Absence::class, 'user_id', 'id');
    } // To Return The Relation Between User and Absences

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'user_id', 'id');
    } // To Return The Relation Between User and Absences

    public function exams()
    {
        return $this->hasMany(Exam::class, 'user_id', 'id');
    } // To Return The Relation Between User and Exams

    public function questions()
    {
        return $this->hasMany(Question::class, 'user_id', 'id');
    } // To Return The Relation Between User and Questions

    /*
    *****************************************************************************
    *************************** Begin SCOPE Area ********************************
    *****************************************************************************
    */
    public function scopeWithOutAuth($query)
    {
        return $query->where('id', '<>', auth()->user()->id);
    } // Return all Users With Out The User Make Auth

    public function scopeSearch($query, $request)
    {
        return $query->withOutAuth()->where($request['column'], 'LIKE', "%" . $request['text'] . "%");
    } // To do Some Query

    /*
    *****************************************************************************
    *************************** Begin ATTRIBUTES Area ***************************
    *****************************************************************************
    */
    public function setUsernameAttribute($name)
    {
        return $this->attributes['username'] = strtolower($name);
    } // Make Format On User Name Attribute

    public function setPasswordAttribute($value)
    {
        return $this->attributes['password'] = bcrypt($value);
    } // Auto Hash Password

    public function getFullNameAttribute($name)
    {
        return $this->attributes['full_name'] = ucwords($name);
    } // Make Format On Full Name Attribute

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromDate($date)->diffForHumans();
    } // Make Format On Created_at Attribute

    public function getImagePathAttribute()
    {
        if (in_array($this->image, ['default.png', 'admin.jpg', 'male.png', 'female.jpg'])) {
            return asset('uploads/default/' . $this->image);
        }
        return asset('uploads/images/users/' . $this->image);
    } // To Return The Image Path

}
