<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'NelmioSecurity'.\DIRECTORY_SEPARATOR.'SignedCookieConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'NelmioSecurity'.\DIRECTORY_SEPARATOR.'ClickjackingConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'NelmioSecurity'.\DIRECTORY_SEPARATOR.'ExternalRedirectsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'NelmioSecurity'.\DIRECTORY_SEPARATOR.'FlexibleSslConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'NelmioSecurity'.\DIRECTORY_SEPARATOR.'ForcedSslConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'NelmioSecurity'.\DIRECTORY_SEPARATOR.'ContentTypeConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'NelmioSecurity'.\DIRECTORY_SEPARATOR.'XssProtectionConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'NelmioSecurity'.\DIRECTORY_SEPARATOR.'CspConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'NelmioSecurity'.\DIRECTORY_SEPARATOR.'ReferrerPolicyConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'NelmioSecurity'.\DIRECTORY_SEPARATOR.'PermissionsPolicyConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'NelmioSecurity'.\DIRECTORY_SEPARATOR.'CrossOriginIsolationConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class NelmioSecurityConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $signedCookie;
    private $clickjacking;
    private $externalRedirects;
    private $flexibleSsl;
    private $forcedSsl;
    private $contentType;
    private $xssProtection;
    private $csp;
    private $referrerPolicy;
    private $permissionsPolicy;
    private $crossOriginIsolation;
    private $_usedProperties = [];

    public function signedCookie(array $value = []): \Symfony\Config\NelmioSecurity\SignedCookieConfig
    {
        if (null === $this->signedCookie) {
            $this->_usedProperties['signedCookie'] = true;
            $this->signedCookie = new \Symfony\Config\NelmioSecurity\SignedCookieConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "signedCookie()" has already been initialized. You cannot pass values the second time you call signedCookie().');
        }

        return $this->signedCookie;
    }

    public function clickjacking(array $value = []): \Symfony\Config\NelmioSecurity\ClickjackingConfig
    {
        if (null === $this->clickjacking) {
            $this->_usedProperties['clickjacking'] = true;
            $this->clickjacking = new \Symfony\Config\NelmioSecurity\ClickjackingConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "clickjacking()" has already been initialized. You cannot pass values the second time you call clickjacking().');
        }

        return $this->clickjacking;
    }

    public function externalRedirects(array $value = []): \Symfony\Config\NelmioSecurity\ExternalRedirectsConfig
    {
        if (null === $this->externalRedirects) {
            $this->_usedProperties['externalRedirects'] = true;
            $this->externalRedirects = new \Symfony\Config\NelmioSecurity\ExternalRedirectsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "externalRedirects()" has already been initialized. You cannot pass values the second time you call externalRedirects().');
        }

        return $this->externalRedirects;
    }

    /**
     * @default {"enabled":false,"cookie_name":"auth","unsecured_logout":false}
    */
    public function flexibleSsl(array $value = []): \Symfony\Config\NelmioSecurity\FlexibleSslConfig
    {
        if (null === $this->flexibleSsl) {
            $this->_usedProperties['flexibleSsl'] = true;
            $this->flexibleSsl = new \Symfony\Config\NelmioSecurity\FlexibleSslConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "flexibleSsl()" has already been initialized. You cannot pass values the second time you call flexibleSsl().');
        }

        return $this->flexibleSsl;
    }

    /**
     * @default {"enabled":false,"hsts_max_age":null,"hsts_subdomains":false,"hsts_preload":false,"allow_list":[],"hosts":[],"redirect_status_code":302}
    */
    public function forcedSsl(array $value = []): \Symfony\Config\NelmioSecurity\ForcedSslConfig
    {
        if (null === $this->forcedSsl) {
            $this->_usedProperties['forcedSsl'] = true;
            $this->forcedSsl = new \Symfony\Config\NelmioSecurity\ForcedSslConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "forcedSsl()" has already been initialized. You cannot pass values the second time you call forcedSsl().');
        }

        return $this->forcedSsl;
    }

    public function contentType(array $value = []): \Symfony\Config\NelmioSecurity\ContentTypeConfig
    {
        if (null === $this->contentType) {
            $this->_usedProperties['contentType'] = true;
            $this->contentType = new \Symfony\Config\NelmioSecurity\ContentTypeConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "contentType()" has already been initialized. You cannot pass values the second time you call contentType().');
        }

        return $this->contentType;
    }

    /**
     * @deprecated The "xss_protection" option is deprecated, use Content Security Policy without allowing "unsafe-inline" scripts instead.
    */
    public function xssProtection(array $value = []): \Symfony\Config\NelmioSecurity\XssProtectionConfig
    {
        if (null === $this->xssProtection) {
            $this->_usedProperties['xssProtection'] = true;
            $this->xssProtection = new \Symfony\Config\NelmioSecurity\XssProtectionConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "xssProtection()" has already been initialized. You cannot pass values the second time you call xssProtection().');
        }

        return $this->xssProtection;
    }

    /**
     * @default {"enabled":true,"request_matcher":null,"hosts":[],"content_types":[],"report_endpoint":{"log_channel":null,"log_formatter":"nelmio_security.csp_report.log_formatter","log_level":"notice","filters":{"domains":true,"schemes":true,"browser_bugs":true,"injected_scripts":true},"dismiss":[]},"compat_headers":true,"report_logger_service":"logger","hash":{"algorithm":"sha256"}}
    */
    public function csp(array $value = []): \Symfony\Config\NelmioSecurity\CspConfig
    {
        if (null === $this->csp) {
            $this->_usedProperties['csp'] = true;
            $this->csp = new \Symfony\Config\NelmioSecurity\CspConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "csp()" has already been initialized. You cannot pass values the second time you call csp().');
        }

        return $this->csp;
    }

    /**
     * @default {"enabled":false,"policies":["no-referrer","no-referrer-when-downgrade"]}
    */
    public function referrerPolicy(array $value = []): \Symfony\Config\NelmioSecurity\ReferrerPolicyConfig
    {
        if (null === $this->referrerPolicy) {
            $this->_usedProperties['referrerPolicy'] = true;
            $this->referrerPolicy = new \Symfony\Config\NelmioSecurity\ReferrerPolicyConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "referrerPolicy()" has already been initialized. You cannot pass values the second time you call referrerPolicy().');
        }

        return $this->referrerPolicy;
    }

    /**
     * @default {"enabled":false}
    */
    public function permissionsPolicy(array $value = []): \Symfony\Config\NelmioSecurity\PermissionsPolicyConfig
    {
        if (null === $this->permissionsPolicy) {
            $this->_usedProperties['permissionsPolicy'] = true;
            $this->permissionsPolicy = new \Symfony\Config\NelmioSecurity\PermissionsPolicyConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "permissionsPolicy()" has already been initialized. You cannot pass values the second time you call permissionsPolicy().');
        }

        return $this->permissionsPolicy;
    }

    /**
     * @default {"enabled":false,"paths":[]}
    */
    public function crossOriginIsolation(array $value = []): \Symfony\Config\NelmioSecurity\CrossOriginIsolationConfig
    {
        if (null === $this->crossOriginIsolation) {
            $this->_usedProperties['crossOriginIsolation'] = true;
            $this->crossOriginIsolation = new \Symfony\Config\NelmioSecurity\CrossOriginIsolationConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "crossOriginIsolation()" has already been initialized. You cannot pass values the second time you call crossOriginIsolation().');
        }

        return $this->crossOriginIsolation;
    }

    public function getExtensionAlias(): string
    {
        return 'nelmio_security';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('signed_cookie', $value)) {
            $this->_usedProperties['signedCookie'] = true;
            $this->signedCookie = new \Symfony\Config\NelmioSecurity\SignedCookieConfig($value['signed_cookie']);
            unset($value['signed_cookie']);
        }

        if (array_key_exists('clickjacking', $value)) {
            $this->_usedProperties['clickjacking'] = true;
            $this->clickjacking = new \Symfony\Config\NelmioSecurity\ClickjackingConfig($value['clickjacking']);
            unset($value['clickjacking']);
        }

        if (array_key_exists('external_redirects', $value)) {
            $this->_usedProperties['externalRedirects'] = true;
            $this->externalRedirects = new \Symfony\Config\NelmioSecurity\ExternalRedirectsConfig($value['external_redirects']);
            unset($value['external_redirects']);
        }

        if (array_key_exists('flexible_ssl', $value)) {
            $this->_usedProperties['flexibleSsl'] = true;
            $this->flexibleSsl = \is_array($value['flexible_ssl']) ? new \Symfony\Config\NelmioSecurity\FlexibleSslConfig($value['flexible_ssl']) : $value['flexible_ssl'];
            unset($value['flexible_ssl']);
        }

        if (array_key_exists('forced_ssl', $value)) {
            $this->_usedProperties['forcedSsl'] = true;
            $this->forcedSsl = \is_array($value['forced_ssl']) ? new \Symfony\Config\NelmioSecurity\ForcedSslConfig($value['forced_ssl']) : $value['forced_ssl'];
            unset($value['forced_ssl']);
        }

        if (array_key_exists('content_type', $value)) {
            $this->_usedProperties['contentType'] = true;
            $this->contentType = new \Symfony\Config\NelmioSecurity\ContentTypeConfig($value['content_type']);
            unset($value['content_type']);
        }

        if (array_key_exists('xss_protection', $value)) {
            $this->_usedProperties['xssProtection'] = true;
            $this->xssProtection = new \Symfony\Config\NelmioSecurity\XssProtectionConfig($value['xss_protection']);
            unset($value['xss_protection']);
        }

        if (array_key_exists('csp', $value)) {
            $this->_usedProperties['csp'] = true;
            $this->csp = new \Symfony\Config\NelmioSecurity\CspConfig($value['csp']);
            unset($value['csp']);
        }

        if (array_key_exists('referrer_policy', $value)) {
            $this->_usedProperties['referrerPolicy'] = true;
            $this->referrerPolicy = \is_array($value['referrer_policy']) ? new \Symfony\Config\NelmioSecurity\ReferrerPolicyConfig($value['referrer_policy']) : $value['referrer_policy'];
            unset($value['referrer_policy']);
        }

        if (array_key_exists('permissions_policy', $value)) {
            $this->_usedProperties['permissionsPolicy'] = true;
            $this->permissionsPolicy = \is_array($value['permissions_policy']) ? new \Symfony\Config\NelmioSecurity\PermissionsPolicyConfig($value['permissions_policy']) : $value['permissions_policy'];
            unset($value['permissions_policy']);
        }

        if (array_key_exists('cross_origin_isolation', $value)) {
            $this->_usedProperties['crossOriginIsolation'] = true;
            $this->crossOriginIsolation = \is_array($value['cross_origin_isolation']) ? new \Symfony\Config\NelmioSecurity\CrossOriginIsolationConfig($value['cross_origin_isolation']) : $value['cross_origin_isolation'];
            unset($value['cross_origin_isolation']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['signedCookie'])) {
            $output['signed_cookie'] = $this->signedCookie->toArray();
        }
        if (isset($this->_usedProperties['clickjacking'])) {
            $output['clickjacking'] = $this->clickjacking->toArray();
        }
        if (isset($this->_usedProperties['externalRedirects'])) {
            $output['external_redirects'] = $this->externalRedirects->toArray();
        }
        if (isset($this->_usedProperties['flexibleSsl'])) {
            $output['flexible_ssl'] = $this->flexibleSsl instanceof \Symfony\Config\NelmioSecurity\FlexibleSslConfig ? $this->flexibleSsl->toArray() : $this->flexibleSsl;
        }
        if (isset($this->_usedProperties['forcedSsl'])) {
            $output['forced_ssl'] = $this->forcedSsl instanceof \Symfony\Config\NelmioSecurity\ForcedSslConfig ? $this->forcedSsl->toArray() : $this->forcedSsl;
        }
        if (isset($this->_usedProperties['contentType'])) {
            $output['content_type'] = $this->contentType->toArray();
        }
        if (isset($this->_usedProperties['xssProtection'])) {
            $output['xss_protection'] = $this->xssProtection->toArray();
        }
        if (isset($this->_usedProperties['csp'])) {
            $output['csp'] = $this->csp->toArray();
        }
        if (isset($this->_usedProperties['referrerPolicy'])) {
            $output['referrer_policy'] = $this->referrerPolicy instanceof \Symfony\Config\NelmioSecurity\ReferrerPolicyConfig ? $this->referrerPolicy->toArray() : $this->referrerPolicy;
        }
        if (isset($this->_usedProperties['permissionsPolicy'])) {
            $output['permissions_policy'] = $this->permissionsPolicy instanceof \Symfony\Config\NelmioSecurity\PermissionsPolicyConfig ? $this->permissionsPolicy->toArray() : $this->permissionsPolicy;
        }
        if (isset($this->_usedProperties['crossOriginIsolation'])) {
            $output['cross_origin_isolation'] = $this->crossOriginIsolation instanceof \Symfony\Config\NelmioSecurity\CrossOriginIsolationConfig ? $this->crossOriginIsolation->toArray() : $this->crossOriginIsolation;
        }

        return $output;
    }

}
