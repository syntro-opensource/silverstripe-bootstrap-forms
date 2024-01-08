<?php

namespace Syntro\SilverstripeBootstrapForms\Tests;

use SilverStripe\Dev\FunctionalTest;
use Syntro\SilverstripeBootstrapForms\Dev\FormPage;
use Syntro\SilverstripeBootstrapForms\Forms\CheckboxField;
use Syntro\SilverstripeBootstrapForms\Forms\CheckboxSetField;
use Syntro\SilverstripeBootstrapForms\Forms\DropdownField;
use Syntro\SilverstripeBootstrapForms\Forms\EmailField;
use Syntro\SilverstripeBootstrapForms\Forms\FieldGroup;
use Syntro\SilverstripeBootstrapForms\Forms\OptionsetField;
use Syntro\SilverstripeBootstrapForms\Forms\ReadonlyField;
use Syntro\SilverstripeBootstrapForms\Forms\TextareaField;
use Syntro\SilverstripeBootstrapForms\Forms\TextField;

/**
 * Test the form fields generation
 * @author Matthias Leutenegger <hello@syntro.ch>
 */
class RenderFormFieldsTest extends FunctionalTest
{
    protected static $fixture_file = './fixture.yml';

    /**
     * By default, the test database won't contain any DataObjects that have the interface TestOnly.
     * This variable lets you define additional TestOnly DataObjects to set up for this test.
     * Set it to an array of DataObject subclass names.
     *
     * @var array
     */
    protected static $extra_dataobjects = [
        FormPage::class
    ];

    /**
     * testCheckboxFieldRendering - description
     *
     * @return void
     */
    public function testCheckboxFieldRendering()
    {
        $formPage = $this->objFromFixture(FormPage::class, 'page');
        $formPage->copyVersionToStage('Stage', 'Live');

        $page = $this->get('/form');
        $body = $page->getBody();

        $this->assertStringContainsString('<div id="Form_Form_checkboxfield_Holder" class="form-check checkboxfieldholderclass">', $body);
        $this->assertStringContainsString('<input type="checkbox" name="checkboxfield" value="1" class="checkbox form-check-input checkboxfieldextraclass" id="Form_Form_checkboxfield" />', $body);
        $this->assertStringContainsString('<label class="form-check-label" for="Form_Form_checkboxfield">checkboxfield</label>', $body);
    }

    /**
     * testCheckboxsetFieldRendering - description
     *
     * @return void
     */
    public function testCheckboxsetFieldRendering()
    {
        $formPage = $this->objFromFixture(FormPage::class, 'page');
        $formPage->copyVersionToStage('Stage', 'Live');

        $page = $this->get('/form');
        $body = $page->getBody();

        $this->assertStringContainsString('<div id="Form_Form_checkboxsetfield_Holder" class="checkboxsetfieldholderclass">', $body);
        $this->assertStringContainsString('<label class="form-label" for="Form_Form_checkboxsetfield">checkboxsetfield</label>', $body);
        $this->assertStringContainsString('<div class="odd vala optionset checkboxset checkboxsetfieldextraclass" role="option">', $body);
        $this->assertStringContainsString('<input id="Form_Form_checkboxsetfield_a" class="form-check-input" name="checkboxsetfield[a]" type="checkbox" value="a" />', $body);
    }

    /**
     * testDropdownFieldRendering - description
     *
     * @return void
     */
    public function testDropdownFieldRendering()
    {
        $formPage = $this->objFromFixture(FormPage::class, 'page');
        $formPage->copyVersionToStage('Stage', 'Live');

        $page = $this->get('/form');
        $body = $page->getBody();

        $this->assertStringContainsString('<div id="Form_Form_dropdownfield_Holder" class="dropdownfieldholderclass">', $body);
        $this->assertStringContainsString('<label class="form-label" for="Form_Form_dropdownfield">dropdownfield</label>', $body);
        $this->assertStringContainsString('<select name="dropdownfield" class="dropdown form-select dropdownfieldextraclass" id="Form_Form_dropdownfield">', $body);
    }

    /**
     * testEmailFieldRendering - description
     *
     * @return void
     */
    public function testEmailFieldRendering()
    {
        $formPage = $this->objFromFixture(FormPage::class, 'page');
        $formPage->copyVersionToStage('Stage', 'Live');

        $page = $this->get('/form');
        $body = $page->getBody();

        $this->assertStringContainsString('<div id="Form_Form_emailfield_Holder" class="emailfieldholderclass">', $body);
        $this->assertStringContainsString('<label class="form-label" for="Form_Form_emailfield">emailfield</label>', $body);
        $this->assertStringContainsString('<input type="email" name="emailfield" class="email text form-control emailfieldextraclass" id="Form_Form_emailfield" />', $body);
    }

    /**
     * testOptionsetFieldRendering - description
     *
     * @return void
     */
    public function testOptionsetFieldRendering()
    {
        $formPage = $this->objFromFixture(FormPage::class, 'page');
        $formPage->copyVersionToStage('Stage', 'Live');

        $page = $this->get('/form');
        $body = $page->getBody();

        $this->assertStringContainsString('<div id="Form_Form_optionsetfield_Holder" class="optionsetfieldholderclass">', $body);
        $this->assertStringContainsString('<label class="form-label" for="Form_Form_optionsetfield">optionsetfield</label>', $body);
        $this->assertStringContainsString('<div class="odd vala optionset form-check optionsetfieldextraclass" role="option">', $body);
        $this->assertStringContainsString('<input id="Form_Form_optionsetfield_a" class="form-check-input" name="optionsetfield" type="radio" value="a"  />', $body);
    }


    /**
     * testPhoneFieldRendering - description
     *
     * @return void
     */
    public function testPhoneFieldRendering()
    {
        $formPage = $this->objFromFixture(FormPage::class, 'page');
        $formPage->copyVersionToStage('Stage', 'Live');

        $page = $this->get('/form');
        $body = $page->getBody();

        $this->assertStringContainsString('<div id="Form_Form_phonefield_Holder" class="phonefieldholderclass">', $body);
        $this->assertStringContainsString('<label class="form-label" for="Form_Form_phonefield">phonefield</label>', $body);
        $this->assertStringContainsString('<input type="tel" name="phonefield" class="phone form-control phonefieldextraclass" id="Form_Form_phonefield" />', $body);
    }

    public function testReadonlyFieldRendering()
    {
        $formPage = $this->objFromFixture(FormPage::class, 'page');
        $formPage->copyVersionToStage('Stage', 'Live');

        $page = $this->get('/form');
        $body = $page->getBody();

        $this->assertStringContainsString('<div id="Form_Form_readonlyfield_Holder" class="readonlyfieldholderclass">', $body);
        $this->assertStringContainsString('<label class="form-label" for="Form_Form_readonlyfield">readonlyfield</label>', $body);
        $this->assertStringContainsString('<input type="Form_Form_readonlyfield_Holder" class="readonlyfieldholderclass">', $body);
    }

    /**
     * testTextareaFieldRendering - description
     *
     * @return void
     */
    public function testTextareaFieldRendering()
    {
        $formPage = $this->objFromFixture(FormPage::class, 'page');
        $formPage->copyVersionToStage('Stage', 'Live');

        $page = $this->get('/form');
        $body = $page->getBody();

        $this->assertStringContainsString('<div id="Form_Form_textareafield_Holder" class="textareafieldholderclass">', $body);
        $this->assertStringContainsString('<label class="form-label" for="Form_Form_textareafield">textareafield</label>', $body);
        $this->assertStringContainsString('<textarea name="textareafield" class="textarea form-control textareafieldextraclass"', $body);
    }


    /**
     * testTextFieldRendering - description
     *
     * @return void
     */
    public function testTextFieldRendering()
    {
        $formPage = $this->objFromFixture(FormPage::class, 'page');
        $formPage->copyVersionToStage('Stage', 'Live');

        $page = $this->get('/form');
        $body = $page->getBody();

        $this->assertStringContainsString('<div id="Form_Form_textfield_Holder" class="textfieldholderclass">', $body);
        $this->assertStringContainsString('<label class="form-label" for="Form_Form_textfield">textfield</label>', $body);
        $this->assertStringContainsString('<input type="text" name="textfield" class="text form-control textfieldextraclass" id="Form_Form_textfield" />', $body);
    }

}
