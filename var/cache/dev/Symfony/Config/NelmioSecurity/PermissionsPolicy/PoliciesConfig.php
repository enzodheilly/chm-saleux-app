<?php

namespace Symfony\Config\NelmioSecurity\PermissionsPolicy;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class PoliciesConfig 
{
    private $accelerometer;
    private $ambientLightSensor;
    private $attributionReporting;
    private $autoplay;
    private $bluetooth;
    private $browsingTopics;
    private $camera;
    private $capturedSurfaceControl;
    private $computePressure;
    private $crossOriginIsolated;
    private $deferredFetch;
    private $deferredFetchMinimal;
    private $displayCapture;
    private $encryptedMedia;
    private $fullscreen;
    private $gamepad;
    private $geolocation;
    private $gyroscope;
    private $hid;
    private $identityCredentialsGet;
    private $idleDetection;
    private $interestCohort;
    private $languageDetector;
    private $localFonts;
    private $magnetometer;
    private $microphone;
    private $midi;
    private $otpCredentials;
    private $payment;
    private $pictureInPicture;
    private $publickeyCredentialsCreate;
    private $publickeyCredentialsGet;
    private $screenWakeLock;
    private $serial;
    private $speakerSelection;
    private $storageAccess;
    private $summarizer;
    private $translator;
    private $usb;
    private $webShare;
    private $windowManagement;
    private $xrSpatialTracking;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function accelerometer(mixed $value = NULL): static
    {
        $this->_usedProperties['accelerometer'] = true;
        $this->accelerometer = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function ambientLightSensor(mixed $value = NULL): static
    {
        $this->_usedProperties['ambientLightSensor'] = true;
        $this->ambientLightSensor = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function attributionReporting(mixed $value = NULL): static
    {
        $this->_usedProperties['attributionReporting'] = true;
        $this->attributionReporting = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function autoplay(mixed $value = NULL): static
    {
        $this->_usedProperties['autoplay'] = true;
        $this->autoplay = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function bluetooth(mixed $value = NULL): static
    {
        $this->_usedProperties['bluetooth'] = true;
        $this->bluetooth = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function browsingTopics(mixed $value = NULL): static
    {
        $this->_usedProperties['browsingTopics'] = true;
        $this->browsingTopics = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function camera(mixed $value = NULL): static
    {
        $this->_usedProperties['camera'] = true;
        $this->camera = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function capturedSurfaceControl(mixed $value = NULL): static
    {
        $this->_usedProperties['capturedSurfaceControl'] = true;
        $this->capturedSurfaceControl = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function computePressure(mixed $value = NULL): static
    {
        $this->_usedProperties['computePressure'] = true;
        $this->computePressure = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function crossOriginIsolated(mixed $value = NULL): static
    {
        $this->_usedProperties['crossOriginIsolated'] = true;
        $this->crossOriginIsolated = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function deferredFetch(mixed $value = NULL): static
    {
        $this->_usedProperties['deferredFetch'] = true;
        $this->deferredFetch = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function deferredFetchMinimal(mixed $value = NULL): static
    {
        $this->_usedProperties['deferredFetchMinimal'] = true;
        $this->deferredFetchMinimal = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function displayCapture(mixed $value = NULL): static
    {
        $this->_usedProperties['displayCapture'] = true;
        $this->displayCapture = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function encryptedMedia(mixed $value = NULL): static
    {
        $this->_usedProperties['encryptedMedia'] = true;
        $this->encryptedMedia = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function fullscreen(mixed $value = NULL): static
    {
        $this->_usedProperties['fullscreen'] = true;
        $this->fullscreen = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function gamepad(mixed $value = NULL): static
    {
        $this->_usedProperties['gamepad'] = true;
        $this->gamepad = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function geolocation(mixed $value = NULL): static
    {
        $this->_usedProperties['geolocation'] = true;
        $this->geolocation = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function gyroscope(mixed $value = NULL): static
    {
        $this->_usedProperties['gyroscope'] = true;
        $this->gyroscope = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function hid(mixed $value = NULL): static
    {
        $this->_usedProperties['hid'] = true;
        $this->hid = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function identityCredentialsGet(mixed $value = NULL): static
    {
        $this->_usedProperties['identityCredentialsGet'] = true;
        $this->identityCredentialsGet = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function idleDetection(mixed $value = NULL): static
    {
        $this->_usedProperties['idleDetection'] = true;
        $this->idleDetection = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function interestCohort(mixed $value = NULL): static
    {
        $this->_usedProperties['interestCohort'] = true;
        $this->interestCohort = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function languageDetector(mixed $value = NULL): static
    {
        $this->_usedProperties['languageDetector'] = true;
        $this->languageDetector = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function localFonts(mixed $value = NULL): static
    {
        $this->_usedProperties['localFonts'] = true;
        $this->localFonts = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function magnetometer(mixed $value = NULL): static
    {
        $this->_usedProperties['magnetometer'] = true;
        $this->magnetometer = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function microphone(mixed $value = NULL): static
    {
        $this->_usedProperties['microphone'] = true;
        $this->microphone = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function midi(mixed $value = NULL): static
    {
        $this->_usedProperties['midi'] = true;
        $this->midi = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function otpCredentials(mixed $value = NULL): static
    {
        $this->_usedProperties['otpCredentials'] = true;
        $this->otpCredentials = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function payment(mixed $value = NULL): static
    {
        $this->_usedProperties['payment'] = true;
        $this->payment = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function pictureInPicture(mixed $value = NULL): static
    {
        $this->_usedProperties['pictureInPicture'] = true;
        $this->pictureInPicture = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function publickeyCredentialsCreate(mixed $value = NULL): static
    {
        $this->_usedProperties['publickeyCredentialsCreate'] = true;
        $this->publickeyCredentialsCreate = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function publickeyCredentialsGet(mixed $value = NULL): static
    {
        $this->_usedProperties['publickeyCredentialsGet'] = true;
        $this->publickeyCredentialsGet = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function screenWakeLock(mixed $value = NULL): static
    {
        $this->_usedProperties['screenWakeLock'] = true;
        $this->screenWakeLock = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function serial(mixed $value = NULL): static
    {
        $this->_usedProperties['serial'] = true;
        $this->serial = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function speakerSelection(mixed $value = NULL): static
    {
        $this->_usedProperties['speakerSelection'] = true;
        $this->speakerSelection = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function storageAccess(mixed $value = NULL): static
    {
        $this->_usedProperties['storageAccess'] = true;
        $this->storageAccess = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function summarizer(mixed $value = NULL): static
    {
        $this->_usedProperties['summarizer'] = true;
        $this->summarizer = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function translator(mixed $value = NULL): static
    {
        $this->_usedProperties['translator'] = true;
        $this->translator = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function usb(mixed $value = NULL): static
    {
        $this->_usedProperties['usb'] = true;
        $this->usb = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function webShare(mixed $value = NULL): static
    {
        $this->_usedProperties['webShare'] = true;
        $this->webShare = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function windowManagement(mixed $value = NULL): static
    {
        $this->_usedProperties['windowManagement'] = true;
        $this->windowManagement = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function xrSpatialTracking(mixed $value = NULL): static
    {
        $this->_usedProperties['xrSpatialTracking'] = true;
        $this->xrSpatialTracking = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('accelerometer', $value)) {
            $this->_usedProperties['accelerometer'] = true;
            $this->accelerometer = $value['accelerometer'];
            unset($value['accelerometer']);
        }

        if (array_key_exists('ambient_light_sensor', $value)) {
            $this->_usedProperties['ambientLightSensor'] = true;
            $this->ambientLightSensor = $value['ambient_light_sensor'];
            unset($value['ambient_light_sensor']);
        }

        if (array_key_exists('attribution_reporting', $value)) {
            $this->_usedProperties['attributionReporting'] = true;
            $this->attributionReporting = $value['attribution_reporting'];
            unset($value['attribution_reporting']);
        }

        if (array_key_exists('autoplay', $value)) {
            $this->_usedProperties['autoplay'] = true;
            $this->autoplay = $value['autoplay'];
            unset($value['autoplay']);
        }

        if (array_key_exists('bluetooth', $value)) {
            $this->_usedProperties['bluetooth'] = true;
            $this->bluetooth = $value['bluetooth'];
            unset($value['bluetooth']);
        }

        if (array_key_exists('browsing_topics', $value)) {
            $this->_usedProperties['browsingTopics'] = true;
            $this->browsingTopics = $value['browsing_topics'];
            unset($value['browsing_topics']);
        }

        if (array_key_exists('camera', $value)) {
            $this->_usedProperties['camera'] = true;
            $this->camera = $value['camera'];
            unset($value['camera']);
        }

        if (array_key_exists('captured_surface_control', $value)) {
            $this->_usedProperties['capturedSurfaceControl'] = true;
            $this->capturedSurfaceControl = $value['captured_surface_control'];
            unset($value['captured_surface_control']);
        }

        if (array_key_exists('compute_pressure', $value)) {
            $this->_usedProperties['computePressure'] = true;
            $this->computePressure = $value['compute_pressure'];
            unset($value['compute_pressure']);
        }

        if (array_key_exists('cross_origin_isolated', $value)) {
            $this->_usedProperties['crossOriginIsolated'] = true;
            $this->crossOriginIsolated = $value['cross_origin_isolated'];
            unset($value['cross_origin_isolated']);
        }

        if (array_key_exists('deferred_fetch', $value)) {
            $this->_usedProperties['deferredFetch'] = true;
            $this->deferredFetch = $value['deferred_fetch'];
            unset($value['deferred_fetch']);
        }

        if (array_key_exists('deferred_fetch_minimal', $value)) {
            $this->_usedProperties['deferredFetchMinimal'] = true;
            $this->deferredFetchMinimal = $value['deferred_fetch_minimal'];
            unset($value['deferred_fetch_minimal']);
        }

        if (array_key_exists('display_capture', $value)) {
            $this->_usedProperties['displayCapture'] = true;
            $this->displayCapture = $value['display_capture'];
            unset($value['display_capture']);
        }

        if (array_key_exists('encrypted_media', $value)) {
            $this->_usedProperties['encryptedMedia'] = true;
            $this->encryptedMedia = $value['encrypted_media'];
            unset($value['encrypted_media']);
        }

        if (array_key_exists('fullscreen', $value)) {
            $this->_usedProperties['fullscreen'] = true;
            $this->fullscreen = $value['fullscreen'];
            unset($value['fullscreen']);
        }

        if (array_key_exists('gamepad', $value)) {
            $this->_usedProperties['gamepad'] = true;
            $this->gamepad = $value['gamepad'];
            unset($value['gamepad']);
        }

        if (array_key_exists('geolocation', $value)) {
            $this->_usedProperties['geolocation'] = true;
            $this->geolocation = $value['geolocation'];
            unset($value['geolocation']);
        }

        if (array_key_exists('gyroscope', $value)) {
            $this->_usedProperties['gyroscope'] = true;
            $this->gyroscope = $value['gyroscope'];
            unset($value['gyroscope']);
        }

        if (array_key_exists('hid', $value)) {
            $this->_usedProperties['hid'] = true;
            $this->hid = $value['hid'];
            unset($value['hid']);
        }

        if (array_key_exists('identity_credentials_get', $value)) {
            $this->_usedProperties['identityCredentialsGet'] = true;
            $this->identityCredentialsGet = $value['identity_credentials_get'];
            unset($value['identity_credentials_get']);
        }

        if (array_key_exists('idle_detection', $value)) {
            $this->_usedProperties['idleDetection'] = true;
            $this->idleDetection = $value['idle_detection'];
            unset($value['idle_detection']);
        }

        if (array_key_exists('interest_cohort', $value)) {
            $this->_usedProperties['interestCohort'] = true;
            $this->interestCohort = $value['interest_cohort'];
            unset($value['interest_cohort']);
        }

        if (array_key_exists('language_detector', $value)) {
            $this->_usedProperties['languageDetector'] = true;
            $this->languageDetector = $value['language_detector'];
            unset($value['language_detector']);
        }

        if (array_key_exists('local_fonts', $value)) {
            $this->_usedProperties['localFonts'] = true;
            $this->localFonts = $value['local_fonts'];
            unset($value['local_fonts']);
        }

        if (array_key_exists('magnetometer', $value)) {
            $this->_usedProperties['magnetometer'] = true;
            $this->magnetometer = $value['magnetometer'];
            unset($value['magnetometer']);
        }

        if (array_key_exists('microphone', $value)) {
            $this->_usedProperties['microphone'] = true;
            $this->microphone = $value['microphone'];
            unset($value['microphone']);
        }

        if (array_key_exists('midi', $value)) {
            $this->_usedProperties['midi'] = true;
            $this->midi = $value['midi'];
            unset($value['midi']);
        }

        if (array_key_exists('otp_credentials', $value)) {
            $this->_usedProperties['otpCredentials'] = true;
            $this->otpCredentials = $value['otp_credentials'];
            unset($value['otp_credentials']);
        }

        if (array_key_exists('payment', $value)) {
            $this->_usedProperties['payment'] = true;
            $this->payment = $value['payment'];
            unset($value['payment']);
        }

        if (array_key_exists('picture_in_picture', $value)) {
            $this->_usedProperties['pictureInPicture'] = true;
            $this->pictureInPicture = $value['picture_in_picture'];
            unset($value['picture_in_picture']);
        }

        if (array_key_exists('publickey_credentials_create', $value)) {
            $this->_usedProperties['publickeyCredentialsCreate'] = true;
            $this->publickeyCredentialsCreate = $value['publickey_credentials_create'];
            unset($value['publickey_credentials_create']);
        }

        if (array_key_exists('publickey_credentials_get', $value)) {
            $this->_usedProperties['publickeyCredentialsGet'] = true;
            $this->publickeyCredentialsGet = $value['publickey_credentials_get'];
            unset($value['publickey_credentials_get']);
        }

        if (array_key_exists('screen_wake_lock', $value)) {
            $this->_usedProperties['screenWakeLock'] = true;
            $this->screenWakeLock = $value['screen_wake_lock'];
            unset($value['screen_wake_lock']);
        }

        if (array_key_exists('serial', $value)) {
            $this->_usedProperties['serial'] = true;
            $this->serial = $value['serial'];
            unset($value['serial']);
        }

        if (array_key_exists('speaker_selection', $value)) {
            $this->_usedProperties['speakerSelection'] = true;
            $this->speakerSelection = $value['speaker_selection'];
            unset($value['speaker_selection']);
        }

        if (array_key_exists('storage_access', $value)) {
            $this->_usedProperties['storageAccess'] = true;
            $this->storageAccess = $value['storage_access'];
            unset($value['storage_access']);
        }

        if (array_key_exists('summarizer', $value)) {
            $this->_usedProperties['summarizer'] = true;
            $this->summarizer = $value['summarizer'];
            unset($value['summarizer']);
        }

        if (array_key_exists('translator', $value)) {
            $this->_usedProperties['translator'] = true;
            $this->translator = $value['translator'];
            unset($value['translator']);
        }

        if (array_key_exists('usb', $value)) {
            $this->_usedProperties['usb'] = true;
            $this->usb = $value['usb'];
            unset($value['usb']);
        }

        if (array_key_exists('web_share', $value)) {
            $this->_usedProperties['webShare'] = true;
            $this->webShare = $value['web_share'];
            unset($value['web_share']);
        }

        if (array_key_exists('window_management', $value)) {
            $this->_usedProperties['windowManagement'] = true;
            $this->windowManagement = $value['window_management'];
            unset($value['window_management']);
        }

        if (array_key_exists('xr_spatial_tracking', $value)) {
            $this->_usedProperties['xrSpatialTracking'] = true;
            $this->xrSpatialTracking = $value['xr_spatial_tracking'];
            unset($value['xr_spatial_tracking']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['accelerometer'])) {
            $output['accelerometer'] = $this->accelerometer;
        }
        if (isset($this->_usedProperties['ambientLightSensor'])) {
            $output['ambient_light_sensor'] = $this->ambientLightSensor;
        }
        if (isset($this->_usedProperties['attributionReporting'])) {
            $output['attribution_reporting'] = $this->attributionReporting;
        }
        if (isset($this->_usedProperties['autoplay'])) {
            $output['autoplay'] = $this->autoplay;
        }
        if (isset($this->_usedProperties['bluetooth'])) {
            $output['bluetooth'] = $this->bluetooth;
        }
        if (isset($this->_usedProperties['browsingTopics'])) {
            $output['browsing_topics'] = $this->browsingTopics;
        }
        if (isset($this->_usedProperties['camera'])) {
            $output['camera'] = $this->camera;
        }
        if (isset($this->_usedProperties['capturedSurfaceControl'])) {
            $output['captured_surface_control'] = $this->capturedSurfaceControl;
        }
        if (isset($this->_usedProperties['computePressure'])) {
            $output['compute_pressure'] = $this->computePressure;
        }
        if (isset($this->_usedProperties['crossOriginIsolated'])) {
            $output['cross_origin_isolated'] = $this->crossOriginIsolated;
        }
        if (isset($this->_usedProperties['deferredFetch'])) {
            $output['deferred_fetch'] = $this->deferredFetch;
        }
        if (isset($this->_usedProperties['deferredFetchMinimal'])) {
            $output['deferred_fetch_minimal'] = $this->deferredFetchMinimal;
        }
        if (isset($this->_usedProperties['displayCapture'])) {
            $output['display_capture'] = $this->displayCapture;
        }
        if (isset($this->_usedProperties['encryptedMedia'])) {
            $output['encrypted_media'] = $this->encryptedMedia;
        }
        if (isset($this->_usedProperties['fullscreen'])) {
            $output['fullscreen'] = $this->fullscreen;
        }
        if (isset($this->_usedProperties['gamepad'])) {
            $output['gamepad'] = $this->gamepad;
        }
        if (isset($this->_usedProperties['geolocation'])) {
            $output['geolocation'] = $this->geolocation;
        }
        if (isset($this->_usedProperties['gyroscope'])) {
            $output['gyroscope'] = $this->gyroscope;
        }
        if (isset($this->_usedProperties['hid'])) {
            $output['hid'] = $this->hid;
        }
        if (isset($this->_usedProperties['identityCredentialsGet'])) {
            $output['identity_credentials_get'] = $this->identityCredentialsGet;
        }
        if (isset($this->_usedProperties['idleDetection'])) {
            $output['idle_detection'] = $this->idleDetection;
        }
        if (isset($this->_usedProperties['interestCohort'])) {
            $output['interest_cohort'] = $this->interestCohort;
        }
        if (isset($this->_usedProperties['languageDetector'])) {
            $output['language_detector'] = $this->languageDetector;
        }
        if (isset($this->_usedProperties['localFonts'])) {
            $output['local_fonts'] = $this->localFonts;
        }
        if (isset($this->_usedProperties['magnetometer'])) {
            $output['magnetometer'] = $this->magnetometer;
        }
        if (isset($this->_usedProperties['microphone'])) {
            $output['microphone'] = $this->microphone;
        }
        if (isset($this->_usedProperties['midi'])) {
            $output['midi'] = $this->midi;
        }
        if (isset($this->_usedProperties['otpCredentials'])) {
            $output['otp_credentials'] = $this->otpCredentials;
        }
        if (isset($this->_usedProperties['payment'])) {
            $output['payment'] = $this->payment;
        }
        if (isset($this->_usedProperties['pictureInPicture'])) {
            $output['picture_in_picture'] = $this->pictureInPicture;
        }
        if (isset($this->_usedProperties['publickeyCredentialsCreate'])) {
            $output['publickey_credentials_create'] = $this->publickeyCredentialsCreate;
        }
        if (isset($this->_usedProperties['publickeyCredentialsGet'])) {
            $output['publickey_credentials_get'] = $this->publickeyCredentialsGet;
        }
        if (isset($this->_usedProperties['screenWakeLock'])) {
            $output['screen_wake_lock'] = $this->screenWakeLock;
        }
        if (isset($this->_usedProperties['serial'])) {
            $output['serial'] = $this->serial;
        }
        if (isset($this->_usedProperties['speakerSelection'])) {
            $output['speaker_selection'] = $this->speakerSelection;
        }
        if (isset($this->_usedProperties['storageAccess'])) {
            $output['storage_access'] = $this->storageAccess;
        }
        if (isset($this->_usedProperties['summarizer'])) {
            $output['summarizer'] = $this->summarizer;
        }
        if (isset($this->_usedProperties['translator'])) {
            $output['translator'] = $this->translator;
        }
        if (isset($this->_usedProperties['usb'])) {
            $output['usb'] = $this->usb;
        }
        if (isset($this->_usedProperties['webShare'])) {
            $output['web_share'] = $this->webShare;
        }
        if (isset($this->_usedProperties['windowManagement'])) {
            $output['window_management'] = $this->windowManagement;
        }
        if (isset($this->_usedProperties['xrSpatialTracking'])) {
            $output['xr_spatial_tracking'] = $this->xrSpatialTracking;
        }

        return $output;
    }

}
