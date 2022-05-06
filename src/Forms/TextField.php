<?php

namespace Syntro\SilverstripeFrontendForms\Forms;

use SilverStripe\Forms\Form;
use SilverStripe\Forms\TextField as BackendTextField;

/**
 *
 */
class TextField extends BackendTextField
{

    use HolderClass;

    /**
     * Returns an input field.
     *
     * @param string $name name of the field
     * @param null|string $title title of the field
     * @param string $value value of the field
     * @param null|int $maxLength Max characters to allow for this field. If this value is stored
     * against a DB field with a fixed size it's recommended to set an appropriate max length
     * matching this size.
     * @param null|Form $form the form
     */
    function __construct($name, $title = null, $value = '', $maxLength = null, $form = null)
    {
        $this->setFieldHolderTemplate('Syntro\\SilverstripeFrontendForms\\Forms\\FormField_holder');
        $this->setSmallFieldHolderTemplate('Syntro\\SilverstripeFrontendForms\\Forms\\FormField_holder_small');
        $this->setupDefaultHolderClasses();
        parent::__construct($name, $title, $value, $maxLength, $form);
    }
}
