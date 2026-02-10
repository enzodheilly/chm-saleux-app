<?php

namespace Symfony\Config\NelmioSecurity;

require_once __DIR__.\DIRECTORY_SEPARATOR.'PermissionsPolicy'.\DIRECTORY_SEPARATOR.'PoliciesConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class PermissionsPolicyConfig 
{
    private $enabled;
    private $policies;
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

    public function policies(array $value = []): \Symfony\Config\NelmioSecurity\PermissionsPolicy\PoliciesConfig
    {
        if (null === $this->policies) {
            $this->_usedProperties['policies'] = true;
            $this->policies = new \Symfony\Config\NelmioSecurity\PermissionsPolicy\PoliciesConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "policies()" has already been initialized. You cannot pass values the second time you call policies().');
        }

        return $this->policies;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('enabled', $value)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }

        if (array_key_exists('policies', $value)) {
            $this->_usedProperties['policies'] = true;
            $this->policies = new \Symfony\Config\NelmioSecurity\PermissionsPolicy\PoliciesConfig($value['policies']);
            unset($value['policies']);
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
        if (isset($this->_usedProperties['policies'])) {
            $output['policies'] = $this->policies->toArray();
        }

        return $output;
    }

}
