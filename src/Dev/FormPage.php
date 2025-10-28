<?php

namespace Syntro\SilverstripeBootstrapForms\Dev;

use SilverStripe\Dev\TestOnly;
use SilverStripe\CMS\Model\SiteTree;

/**
 * demo page
 * @author Matthias Leutenegger
 */
class FormPage extends SiteTree implements TestOnly
{
    /**
     * Defines the database table name
     *  @var string
     * @config
     */
    private static $table_name = 'FormPage';
}
