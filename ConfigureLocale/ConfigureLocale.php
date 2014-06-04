<?php
namespace Rk\LocaleBundle\ConfigureLocale;

/**
 * Class ConfigureLocale
 *
 * Configure flags list  and default route project
 *
 * @package Rk\LocaleBundle\ConfigureLocale
 */
class ConfigureLocale {

    protected $locales;
    protected $default_target_path;

    public function __construct($default_target_path, $locales)
    {
        $this->setDefaultTargetPath($default_target_path);
        $this->setLocales($locales);
    }

    /**
     * @param mixed $default_target_path
     */
    public function setDefaultTargetPath($default_target_path)
    {
        $this->default_target_path = $default_target_path;
    }

    /**
     * @return mixed
     */
    public function getDefaultTargetPath()
    {
        return $this->default_target_path;
    }

    /**
     * @param Array $locales
     * @throws \InvalidArgumentException
     */
    public function setLocales($locales)
    {
        if( ! is_array($locales)){
            throw new \InvalidArgumentException('Langs is not array -> '. $locales);
        }
        $this->locales = $locales;
    }

    /**
     * @return mixed
     */
    public function getLocales()
    {
        return $this->locales;
    }
} 