<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class TranslateController extends Controller
{
    public function translate ()
    {
        if ( count(request()->all()) == 1) {
            return response()->json(__('alerts.' . request()->message));
        }

        $data['message'] = __('alerts.' . request()->message, ['count' => request()->count]);
        $data['title'] = __('alerts.' . request()->title);
        $data['yes_sure'] = __('alerts.' . request()->yes_sure);
        $data['no_cancel'] = __('alerts.' . request()->no_cancel);

        return response()->json($data);
    }
}
