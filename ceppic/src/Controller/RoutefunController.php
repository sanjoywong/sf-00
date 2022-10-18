<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RoutefunController extends AbstractController
{
    # "/router"代表路由的URL routers_test代表路由名称 test()为路由所指向的控制器方法
    /**
     * @Route("/router", name="routers_test")
     */
    # Route('/router', name: 'test')
    public function test(): Response
    {
        return new Response(
            '<html><body>This is router test.</body></html>'
        );
    }
}