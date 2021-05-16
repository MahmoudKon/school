<?php

namespace App\Observers;

use App\Models\User;
use Keygen\Keygen;

class UserObserve
{
    public function created(User $user)
    {
        $user->code = Keygen::numeric(6)->generate();
        $this->image($user);
        $user->save();
    } //  Call The Image Method IN Down When Create New User And Create Generate Unique Code

    public function updated(User $user)
    {
        if (substr($user->image, 0, 4) == '/tmp')
            $user->update(['image' => uploadImage($user->image, 'users'),]);
    } //  Call The Image Method IN Down When Update The User

    public function deleted(User $user)
    {
        removeImage($user->image, 'users');
    } // Remove The Image From Folder When Delete The User

    protected function image($user)
    {
        if (substr($user->image, 0, 4) == '/tmp')
            $user->image = uploadImage($user->image, 'users');
    } // To Check If The User Has IN Database New Image Upload to To Folder
}
