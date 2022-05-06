<?php

namespace Syntro\SilverstripeFrontendForms\Forms;

use SilverStripe\Forms\Form;
use SilverStripe\Forms\DropdownField as BackendDropdownField;

/**
 *
 */
class DropdownField extends BackendDropdownField
{

    use HolderClass;

    /**
     * Returns an input field.
     *
     * @param string $name The field name
     * @param string $title The field title
     * @param array|ArrayAccess $source A map of the dropdown items
     * @param mixed $value The current value
     */
    function __construct($name, $title = null, $source = [], $value = null)
    {
        $this->setFieldHolderTemplate('Syntro\\SilverstripeFrontendForms\\Forms\\FormField_holder');
        $this->setSmallFieldHolderTemplate('Syntro\\SilverstripeFrontendForms\\Forms\\FormField_holder_small');
        $this->setupDefaultHolderClasses();
        parent::__construct($name, $title, $source, $value);
    }
}