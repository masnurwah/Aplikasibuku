<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLanguange
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $lang = $request->segment(1);

        if(in_array($lang, ['id', 'en'])){
            App::setLocale($lang);
        }
        elseif(!isset($lang)){
            App::setLocale(config('locale.id'));
        }
        elseif($lang == 'admin'){
            return redirect()->route('admin.dashboard');
        }

        return $next($request);
    }
}
