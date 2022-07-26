<?php

namespace Syntro\SilverstripeBootstrapForms\Dev;

use SilverStripe\Dev\TestOnly;
use SilverStripe\CMS\Controllers\ContentController;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\RequiredFields;
use Syntro\SilverstripeBootstrapForms\Forms\CheckboxField;
use Syntro\SilverstripeBootstrapForms\Forms\CheckboxSetField;
use Syntro\SilverstripeBootstrapForms\Forms\DropdownField;
use Syntro\SilverstripeBootstrapForms\Forms\EmailField;
use Syntro\SilverstripeBootstrapForms\Forms\OptionsetField;
use Syntro\SilverstripeBootstrapForms\Forms\PhoneField;
use Syntro\SilverstripeBootstrapForms\Forms\TextareaField;
use Syntro\SilverstripeBootstrapForms\Forms\TextField;
use Syntro\SilverstripeBootstrapForms\Forms\FieldGroup;

/**
 * demo controller
 * @author Matthias Leutenegger
 */
class FormPageController extends ContentController implements TestOnly
{
    /**
     * Defines methods that can be called directly
     * @var array
     */
    private static $allowed_actions = [
        'Form' => true
    ];

    /**
     * Form
     *
     * @return Form
     */
    public function Form()
    {
        $fields = new FieldList(
            $checkboxfield = CheckboxField::create('checkboxfield', 'checkboxfield'),
            $checkboxsetfield = CheckboxSetField::create('checkboxsetfield', 'checkboxsetfield', ['a' => 'value a', 'b' => 'value b']),
            $dropdownfield = DropdownField::create('dropdownfield', 'dropdownfield', ['a' => 'value a', 'b' => 'value b']),
            $emailfield = EmailField::create('emailfield', 'emailfield'),
            $optionsetfield = OptionsetField::create('optionsetfield', 'optionsetfield', ['a' => 'value a', 'b' => 'value b']),
            $phonefield = PhoneField::create('phonefield', 'phonefield'),
            $textareafield = TextareaField::create('textareafield', 'textareafield'),
            $textfield = TextField::create('textfield', 'textfield'),
        );

        $checkboxfield->addHolderClass('checkboxfieldholderclass')->addExtraClass('checkboxfieldextraclass');
        $checkboxsetfield->addHolderClass('checkboxsetfieldholderclass')->addExtraClass('checkboxsetfieldextraclass');
        $dropdownfield->addHolderClass('dropdownfieldholderclass')->addExtraClass('dropdownfieldextraclass');
        $emailfield->addHolderClass('emailfieldholderclass')->addExtraClass('emailfieldextraclass');
        $optionsetfield->addHolderClass('optionsetfieldholderclass')->addExtraClass('optionsetfieldextraclass');
        $phonefield->addHolderClass('phonefieldholderclass')->addExtraClass('phonefieldextraclass');
        $textareafield->addHolderClass('textareafieldholderclass')->addExtraClass('textareafieldextraclass');
        $textfield->addHolderClass('textfieldholderclass')->addExtraClass('textfieldextraclass');

        $actions = new FieldList(FormAction::create('submit', 'Submit'));
        $required = new RequiredFields('required');
        $form = new Form($this, 'Form', $fields, $actions, $required);

        return $form;
    }

    public function submit($data, Form $form)
    {
        $form->sessionMessage('Hello.', 'success');

        return $this->redirectBack();
    }
}
