<?php

namespace Phramework\Tests;

use PHPUnit\Framework\TestCase;
use Phramework\Framework;
use Symfony\Component\Routing\{
    Matcher\UrlMatcherInterface,
    Exception\ResourceNotFoundException,
    RequestContext
};
use Symfony\Component\HttpKernel\Controller\ControllerResolverInterface;
use Symfony\Component\HttpFoundation\Request;

class FrameworkTest extends TestCase
{

    public function test_notFoundException_isHandled()
    {
        $framework = $this->getFrameworkForException(new ResourceNotFoundException());
        $response  = $framework->handle(new Request());
        $this->assertSame(404, $response->getStatusCode());
    }

    public function test_runtimeException_isHandled()
    {
        $framework = $this->getFrameworkForException(new \RuntimeException());
        $response  = $framework->handle(new Request());
        $this->assertSame(500, $response->getStatusCode());
    }

    protected function getFrameworkForException($exception)
    {
        $matcherMock        = $this->createMock(UrlMatcherInterface::class);
        $requestContextMock = $this->createMock(RequestContext::class);
        $matcherMock
                ->expects($this->once())
                ->method('match')
                ->will($this->throwException($exception));
        $matcherMock
                ->expects($this->once())
                ->method('getContext')
                ->will($this->returnValue($requestContextMock));
        $resolverMock       = $this->createMock(ControllerResolverInterface::class);

        return new Framework($matcherMock, $resolverMock);
    }

}
