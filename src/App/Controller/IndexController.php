<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use \App\Controller\Controller;

class IndexController extends Controller
{

    public function indexAction(Request $request)
    {
        return $this->render($request, [
                    'indexVar' => 'value',
        ]);
    }

}
