<?php

namespace Syntro\SilverstripeBootstrapForms\Tests;

use SilverStripe\Dev\FunctionalTest;
use Syntro\SilverstripeBootstrapForms\Dev\FormPage;
use Syntro\SilverstripeBootstrapForms\Forms\PhoneField;

/**
 * Test the PhoneFieldClass
 * @author Matthias Leutenegger <hello@syntro.ch>
 */
class PhoneFieldTest extends FunctionalTest
{
    protected static $fixture_file = './fixture.yml';

    /**
     * testValidation
     *
     * @return void
     */
    public function testValidation()
    {
        $formPage = $this->objFromFixture(FormPage::class, 'page');
        $formPage->copyVersionToStage('Stage', 'Live');

        $page = $this->get('/form');
        $submit = $this->submitForm('Form_Form', null, $data = [
            'phonefield' => '-+asb'
        ]);

        $this->assertStringContainsString('Please enter a valid phone number', $submit->getBody());
    }
}
