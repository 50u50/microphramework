<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\{
    Request,
    Response
};

class Controller
{

    public function render(Request $request, Array $viewVars)
    {
        extract($request->attributes->all(), EXTR_SKIP);
        extract($viewVars);
        ob_start();
        $view = sprintf('%s/../../views/%s.phtml', __DIR__, $_route);
        include(sprintf('%s/../../views/layout.phtml', __DIR__, $_route));

        return new Response(ob_get_clean());
    }

}
