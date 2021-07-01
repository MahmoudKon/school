<?php

namespace App\Http\Middleware;

use App\Models\Log;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $controller = ['', 'bug'];
        $message = '';

        if (isset(request()->route()->action))
            $controller = explode('@', array_slice(explode('\\', request()->route()->action['controller']), -1, 1)[0]);

        $model = Str::singular(str_replace('Controller', '', $controller[0]));

        if ($message == null) {
            switch ($controller[1]) {
                case 'index':
                    $message = 'visit the index of ' . str_replace('Controller', '', $controller[0]) . ' page';
                    break;
                case 'create':
                    $message = 'visit the form of create new ' . $model;
                    break;
                case 'store':
                    $message = 'store new ' . $model . ' data';
                    break;
                case 'edit':
                    $message = 'visit the form of edit ' . $model . ', his id is ' . request()->route()->parameters[request()->route()->parameterNames[0]];
                    break;
                case 'update':
                    $message = 'update the ' . $model . ' data, his id is ' . request()->route()->parameters[request()->route()->parameterNames[0]];
                    $page    = '<div class="badge badge-warning round"> <span> Update </span> <i class="fa fa-"></i> </div>';
                case 'destroy':
                    $message = 'destroy some ' . str_replace('Controller', '', $controller[0]) . ' data';
                    break;
                default:
                    $message = 'visit the ' . $controller[1] . ' page in ' . str_replace('Controller', '', $controller[0]);
            }
        }

        Log::create([
            'message'       => $message,
            'url'           => request()->path(),
            'page'          => $controller[1],
            'method'        => request()->method(),
            'controller'    => $controller[0],
            'model'         => $model,
            'user_id'       => auth()->user()->id ?? 1,
        ]);
        return $response;
    }
}
