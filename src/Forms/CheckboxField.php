<?php

namespace Syntro\SilverstripeFrontendForms\Forms;

use SilverStripe\Forms\Form;
use SilverStripe\Forms\CheckboxField as BackendCheckboxField;

/**
 *
 */
class CheckboxField extends BackendCheckboxField
{

    use HolderClass;


    /**
     * Creates a new field.
     *
     * @param string $name The internal field name, passed to forms.
     * @param null|string|\SilverStripe\View\ViewableData $title The human-readable field label.
     * @param mixed $value The value of the field.
     */
    function __construct($name, $title = null, $value = null)
    {
        // $this->setTemplate('Syntro\\SilverstripeFrontendForms\\Forms\\TextField');
        // $this->setFieldHolderTemplate('Syntro\\SilverstripeFrontendForms\\Forms\\FormField_holder');
        // $this->setSmallFieldHolderTemplate('Syntro\\SilverstripeFrontendForms\\Forms\\FormField_holder_small');
        $this->setupDefaultHolderClasses();
        parent::__construct($name, $title, $value);
    }
}
