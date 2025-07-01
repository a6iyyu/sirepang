<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RemovePageOne
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->query('page') == 1) {
            $query = http_build_query($request->except('page'));
            $url = $request->url() . ($query ? "?{$query}" : '');
            return redirect()->to($url);
        }

        return $next($request);
    }
}