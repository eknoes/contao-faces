<?php

/*
 * This file is part of [package name].
 *
 * (c) John Doe
 *
 * @license LGPL-3.0-or-later
 */

namespace Eknoes\ContaoFaces\Tests;

use Eknoes\ContaoFaces\ContaoFacesBundle;
use PHPUnit\Framework\TestCase;

class ContaoFacesBundleTest extends TestCase
{
    public function testCanBeInstantiated()
    {
        $bundle = new ContaoFacesBundle();

        $this->assertInstanceOf('Eknoes\ContaoFaces\ContaoFacesBundle', $bundle);
    }
}
