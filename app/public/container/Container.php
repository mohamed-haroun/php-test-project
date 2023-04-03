<?php

namespace container;
use Psr\Container\ContainerInterface;
use exceptions\{NotFoundException, ContainerException};


class Container implements ContainerInterface
{

    private array $entries;

    /**
     * @inheritDoc
     * @throws \ReflectionException
     */
    public function get(string $id)
    {
        if ($this->has($id)) {
            $entry = $this->entries[$id];
            return $entry($this);
        }

        return $this->resolve($id);

    }

    /**
     * @inheritDoc
     */
    public function has(string $id): bool
    {
        return isset($this->entries[$id]);
    }

    // Setting the classes in the container
    public function set(string $id, callable $concrete):void
    {
        $this->entries[$id] = $concrete;
    }

    // Register the dependencies using the auto-wiring

    /**
     * @throws \ReflectionException
     * @throws ContainerException
     */
    public function resolve(string $id)
    {
        // 1. Inspect the class that we are trying to get from container.
        $reflectionClass = new \ReflectionClass($id);

        if(! $reflectionClass->isInstantiable()) {
            throw new ContainerException('Class "' . $id . '" is not instantiable');
        }

        // 2. Inspect the constructor of the class
        $constructor = $reflectionClass->getConstructor();

        if (!$constructor) {
            return new $id;
        }

        // 3. Inspect the constructor parameters (dependencies)
        $parameters = $constructor->getParameters();

        if(! $parameters) {
            return new $id;
        }

        // 4. If the constructor parameter is a class then try to resolve that class using thr container
        $dependencies = array_map(
            function(\ReflectionParameter $param) use ($id) {
                $name = $param->getName();
                $type = $param->getType();

                if (! $type) {
                    throw new ContainerException(
                        'Failed to resolve class "' . $id . '" because param' . $name . ' is missing a type hint'
                    );
                }

                if ($type instanceof \ReflectionUnionType) {
                    throw new ContainerException(
                        'Failed to resolve class "' . $id . '" because of union type for param "' . $name . '"'
                    );
                }

                if ($type instanceof \ReflectionNamedType && ! $type->isBuiltin()) {
                    return $this->get($type->getName());
                }

                throw new ContainerException(
                    'Failed to resolve class "' . $id . '" because of in valid param' . $name . '"'
                );
            }
        , $parameters);

        return $reflectionClass->newInstanceArgs($dependencies);

    }
}