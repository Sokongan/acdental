<?php   
class Container
{
    private array $instances = [];

    public function set(string $class, object $instance): void
    {
        $this->instances[$class] = $instance;
    }

    public function get(string $class)
    {
        if (isset($this->instances[$class])) {
            return $this->instances[$class];
        }

        $reflectionClass = new ReflectionClass($class);

        if (!$reflectionClass->isInstantiable()) {
            throw new Exception("Class {$class} is not instantiable.");
        }

        $constructor = $reflectionClass->getConstructor();

        if (is_null($constructor)) {
            $object = new $class();
            $this->instances[$class] = $object;
            return $object;
        }

        $parameters = $constructor->getParameters();
        $dependencies = [];

        foreach ($parameters as $parameter) {
            $paramType = $parameter->getType();

            if ($paramType === null) {
                if ($parameter->isDefaultValueAvailable()) {
                    $dependencies[] = $parameter->getDefaultValue();
                } else {
                    throw new Exception("Cannot resolve class dependency {$parameter->name} of class {$class}");
                }
            } else if ($paramType instanceof ReflectionNamedType && !$paramType->isBuiltin()) {
                $dependencyClassName = $paramType->getName();
                $dependencies[] = $this->get($dependencyClassName);
            } else {
                throw new Exception("Unsupported parameter type for {$parameter->name} in class {$class}");
            }
        }

        $object = $reflectionClass->newInstanceArgs($dependencies);
        $this->instances[$class] = $object;
        return $object;
    }
}
