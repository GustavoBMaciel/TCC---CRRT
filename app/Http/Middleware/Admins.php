<?php

namespace App\Http\Middleware;

use Closure;

class Admins
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
      $loggedUser = \Auth::user();

      if ($loggedUser->name != 'Administrador') {

        $request->session()->flash('warning', 'Record not added!');

        return redirect()->route('home')->with(['message' => 'Voce não tem permissão para esta Função. Somente o Administrador pode gerenciar usuarios.']);;
      }
        return $next($request);
    }
}
