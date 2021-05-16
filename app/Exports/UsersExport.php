<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    public function headings() :array
    {
        return [__('users.username'),__('users.full_name') , __('users.email'),
                __('users.address'), __('users.phone'), __('users.job'),
                __('general.image'), __('users.code'), __('users.personal_id'), __('users.age')];
    } // end of headings

    public function collection()
    {
        return User::select(['username', 'full_name', 'email', 'address', 'phone', 'job', 'image', 'code', 'personal_id', 'age'])->get();
    } // end of collection

} // end of users export
