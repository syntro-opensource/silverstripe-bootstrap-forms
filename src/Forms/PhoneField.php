<?php

namespace Syntro\SilverstripeBootstrapForms\Forms;

use SilverStripe\Forms\Form;
use SilverStripe\Forms\FormField;
use SilverStripe\Forms\Validator;

/**
 * Frontend PhoneField
 * @author Matthias Leutenegger <hello@syntro.ch>
 */
class PhoneField extends FormField
{

    use HolderClass;

    /**
     * @var string
     */
    protected $countryCode;

    /**
     * @config
     * @var string
     */
    private static $default_country = 'CH';

    /**
     * Returns an input field.
     *
     * @param string      $name    name of the field
     * @param null|string $title   title of the field
     * @param string      $value   value of the field
     * @param null|string $country the ISO 3166-1 two letter country code.
     */
    function __construct($name, $title = null, $value = '', $country = null)
    {
        $this->setCountryCode($country ?: $this->config()->get('default_country'));
        $this->setTemplate('Syntro\\SilverstripeBootstrapForms\\Forms\\TextField');
        $this->setFieldHolderTemplate('Syntro\\SilverstripeBootstrapForms\\Forms\\FormField_holder');
        $this->setSmallFieldHolderTemplate('Syntro\\SilverstripeBootstrapForms\\Forms\\FormField_holder_small');
        $this->setupDefaultHolderClasses();
        parent::__construct($name, $title, $value);
    }

    /**
     * get the currently stored country code
     * @param string $countryCode the value to set
     * @return $this
     */
    public function setCountryCode(string $countryCode)
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**¨
     * set the country code for this field
     * @return null|string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * getAttributes - updates the default attributes to return correct ones
     * for a phone field
     *
     * @return array
     */
    public function getAttributes()
    {
        $attributes = [
            'type' => 'tel'
        ];

        return array_merge(
            parent::getAttributes(),
            $attributes
        );
    }
}
