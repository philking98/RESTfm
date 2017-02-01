<?php
/**
 * RESTfm - FileMaker RESTful Web Service
 *
 * @copyright
 *  Copyright (c) 2011-2016 Goya Pty Ltd.
 *
 * @license
 *  Licensed under The MIT License. For full copyright and license information,
 *  please see the LICENSE file distributed with this package.
 *  Redistributions of files must retain the above copyright notice.
 *
 * @link
 *  http://restfm.com
 *
 * @author
 *  Gavin Stewart
 */

// Manually include Diagnostics.php as autoload can't find Report class.
include "lib/RESTfm/Diagnostics.php";

class ReportTest extends PHPUnit_Framework_TestCase {

    public function testSetAndGet () {
        $report = new Report();

        $reportItem1 = new ReportItem();
        $reportItem2 = new ReportItem();

        $report->key1 = $reportItem1;
        $report->key2 = $reportItem2;

        $this->assertEquals( spl_object_hash($reportItem1),
                             spl_object_hash($report->key1));

        $this->assertEquals( spl_object_hash($reportItem2),
                             spl_object_hash($report->key2));

        return $report;
    }

    /**
     * @depends testSetAndGet
     */
    public function testIterator (Report $report) {
        foreach ($report as $key => $reportItem) {
            $this->assertEquals(get_class($reportItem), 'ReportItem');
        }
    }

};
