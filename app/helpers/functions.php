<?php

use App\Models\Permission;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

// this function used in navbar to make the tag link is active by the url
function active($model, $method = null)
{
    $url =  explode('/', Request::path());

    if (in_array($model, $url) && $method === null) {
        return 'active';
    }
    if (in_array($model, $url) && in_array($method, $url)) {
        return 'active';
    }
    if (in_array($model, $url) && end($url) === $model && $method === 'index') {
        return 'active';
    }
    return '';
} // end of active function

// function to return the model name form url
function getModel()
{
    if (Request::segment(1) === 'dashboard' && !empty(Request::segment(2)))
        return Request::segment(2);

    if (Request::segment(2) === 'dashboard' && !empty(Request::segment(3)))
        return Request::segment(3);

    return 'dashboard';
} // end of active function

// function to return the Permissions name array
function getPermissions()
{
    $permissions = [];
    foreach (Permission::select('name')->get()->toArray() as $permission)
        $permissions[explode('_', $permission['name'])[1]][] = $permission['name'];

    return $permissions;
} // end of getPermissions function

// function to check the string in the url | RETURN => true , false
function in_url(string $param)
{
    $url =  explode('/', Request::path());
    return in_array($param, $url) ? true : false;
} // end of in_url function

// function to return the rtl folder or ltr
function pageDir(string $folder)
{
    if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
        return $folder . '-rtl';
    return $folder;
} // end of dir function

// function to return the dashboard files path
function path(string $path)
{
    return asset('assets/dashboard/' . $path);
} // end of path function

// function to save the image in image folder
function uploadImage($image, $folder)
{
    image::make($image)
        ->resize(150, null, function ($constraint) {
            $constraint->aspectRatio();
        })
        ->save(public_path('uploads/images/' . $folder . '/' . $image->hashName()), 60);
    return $image->hashName();
} // end of image function

// function to remove the image
function removeImage($oldImage, $folder)
{
    $path = public_path('uploads/images/' . $folder . '/' . $oldImage);
    if (File::exists($path))
        unlink($path);
} // end of removed image function
