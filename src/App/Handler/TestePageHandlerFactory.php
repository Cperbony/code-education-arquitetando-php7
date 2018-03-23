<?php

declare(strict_types=1);

namespace App\Handler;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class TestePageHandlerFactory
{
    public function __invoke(ContainerInterface $container): RequestHandlerInterface
    {
        try {
            $template = $container->has(TemplateRendererInterface::class)
                ? $container->get(TemplateRendererInterface::class)
                : null;
        } catch (NotFoundExceptionInterface $e) {
        } catch (ContainerExceptionInterface $e) {
        }

        return new TestePageHandler($template, get_class($container));
    }
}
