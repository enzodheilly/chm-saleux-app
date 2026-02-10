<?php

namespace Symfony\Config\NelmioSecurity;

require_once __DIR__.\DIRECTORY_SEPARATOR.'CrossOriginIsolation'.\DIRECTORY_SEPARATOR.'PathConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class CrossOriginIsolationConfig 
{
    private $enabled;
    private $paths;
    private $_usedProperties = [];

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enabled($value): static
    {
        $this->_usedProperties['enabled'] = true;
        $this->enabled = $value;

        return $this;
    }

    public function path(string $pattern, array $value = []): \Symfony\Config\NelmioSecurity\CrossOriginIsolation\PathConfig
    {
        if (!isset($this->paths[$pattern])) {
            $this->_usedProperties['paths'] = true;
            $this->paths[$pattern] = new \Symfony\Config\NelmioSecurity\CrossOriginIsolation\PathConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "path()" has already been initialized. You cannot pass values the second time you call path().');
        }

        return $this->paths[$pattern];
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('enabled', $value)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }

        if (array_key_exists('paths', $value)) {
            $this->_usedProperties['paths'] = true;
            $this->paths = array_map(fn ($v) => new \Symfony\Config\NelmioSecurity\CrossOriginIsolation\PathConfig($v), $value['paths']);
            unset($value['paths']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['enabled'])) {
            $output['enabled'] = $this->enabled;
        }
        if (isset($this->_usedProperties['paths'])) {
            $output['paths'] = array_map(fn ($v) => $v->toArray(), $this->paths);
        }

        return $output;
    }

}
