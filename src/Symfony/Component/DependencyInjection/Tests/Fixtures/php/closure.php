<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\ParameterNotFoundException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class ProjectServiceContainer extends Container
{
    protected $parameters = [];
    protected readonly \WeakReference $ref;

    public function __construct()
    {
        $this->ref = \WeakReference::create($this);
        $this->services = $this->privates = [];
        $this->methodMap = [
            'closure' => 'getClosureService',
            'closure_of_service_closure' => 'getClosureOfServiceClosureService',
        ];

        $this->aliases = [];
    }

    public function compile(): void
    {
        throw new LogicException('You cannot compile a dumped container that was already compiled.');
    }

    public function isCompiled(): bool
    {
        return true;
    }

    public function getRemovedIds(): array
    {
        return [
            'bar' => true,
            'bar2' => true,
        ];
    }

    /**
     * Gets the public 'closure' shared service.
     *
     * @return \Closure
     */
    protected static function getClosureService($container)
    {
        return $container->services['closure'] = (new \stdClass())->__invoke(...);
    }

    /**
     * Gets the public 'closure_of_service_closure' shared service.
     *
     * @return \Closure
     */
    protected static function getClosureOfServiceClosureService($container)
    {
        $containerRef = $container->ref;

        return $container->services['closure_of_service_closure'] = #[\Closure(name: 'bar2', class: 'stdClass')] function () use ($containerRef) {
            $container = $containerRef->get();

            return ($container->privates['bar2'] ??= new \stdClass());
        };
    }
}
