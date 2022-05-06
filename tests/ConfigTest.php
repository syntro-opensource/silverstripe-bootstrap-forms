<?php

namespace Syntro\SilverstripeKlaro\Tests;

use SilverStripe\Dev\SapphireTest;

/**
 * Test
 * @author Matthias Leutenegger <hello@syntro.ch>
 */
class DemoTest extends SapphireTest
{
    protected static $fixture_file = './fixture.yml';

    public function testDemo()
    {
        $this->assertEquals(2, 1+1);
    }
}
