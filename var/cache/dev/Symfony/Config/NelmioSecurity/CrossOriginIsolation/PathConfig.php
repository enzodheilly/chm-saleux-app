<?php

namespace Symfony\Config\NelmioSecurity\CrossOriginIsolation;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class PathConfig 
{
    private $coep;
    private $coop;
    private $corp;
    private $reportOnly;
    private $reportTo;
    private $_usedProperties = [];

    /**
     * Cross-Origin-Embedder-Policy (COEP) header value
     * @default null
     * @param ParamConfigurator|'unsafe-none'|'require-corp'|'credentialless' $value
     * @return $this
     */
    public function coep($value): static
    {
        $this->_usedProperties['coep'] = true;
        $this->coep = $value;

        return $this;
    }

    /**
     * Cross-Origin-Opener-Policy (COOP) header value
     * @default null
     * @param ParamConfigurator|'unsafe-none'|'same-origin-allow-popups'|'same-origin'|'noopener-allow-popups' $value
     * @return $this
     */
    public function coop($value): static
    {
        $this->_usedProperties['coop'] = true;
        $this->coop = $value;

        return $this;
    }

    /**
     * Cross-Origin-Resource-Policy (CORP) header value
     * @default null
     * @param ParamConfigurator|'same-site'|'same-origin'|'cross-origin' $value
     * @return $this
     */
    public function corp($value): static
    {
        $this->_usedProperties['corp'] = true;
        $this->corp = $value;

        return $this;
    }

    /**
     * Use Report-Only headers instead of enforcing (applies to COEP and COOP only)
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function reportOnly($value): static
    {
        $this->_usedProperties['reportOnly'] = true;
        $this->reportOnly = $value;

        return $this;
    }

    /**
     * Reporting endpoint name for violations (requires Reporting API configuration, applies to COEP and COOP only)
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function reportTo($value): static
    {
        $this->_usedProperties['reportTo'] = true;
        $this->reportTo = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('coep', $value)) {
            $this->_usedProperties['coep'] = true;
            $this->coep = $value['coep'];
            unset($value['coep']);
        }

        if (array_key_exists('coop', $value)) {
            $this->_usedProperties['coop'] = true;
            $this->coop = $value['coop'];
            unset($value['coop']);
        }

        if (array_key_exists('corp', $value)) {
            $this->_usedProperties['corp'] = true;
            $this->corp = $value['corp'];
            unset($value['corp']);
        }

        if (array_key_exists('report_only', $value)) {
            $this->_usedProperties['reportOnly'] = true;
            $this->reportOnly = $value['report_only'];
            unset($value['report_only']);
        }

        if (array_key_exists('report_to', $value)) {
            $this->_usedProperties['reportTo'] = true;
            $this->reportTo = $value['report_to'];
            unset($value['report_to']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['coep'])) {
            $output['coep'] = $this->coep;
        }
        if (isset($this->_usedProperties['coop'])) {
            $output['coop'] = $this->coop;
        }
        if (isset($this->_usedProperties['corp'])) {
            $output['corp'] = $this->corp;
        }
        if (isset($this->_usedProperties['reportOnly'])) {
            $output['report_only'] = $this->reportOnly;
        }
        if (isset($this->_usedProperties['reportTo'])) {
            $output['report_to'] = $this->reportTo;
        }

        return $output;
    }

}
