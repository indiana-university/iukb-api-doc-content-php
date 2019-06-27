<?php
declare(strict_types=1);
/**
 * This file contains tests for the rivetize function
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */

namespace Edu\Iu\Uits\KnowledgeBase\Document\Content\Factory\Tests;

use Edu\Iu\Uits\KnowledgeBase\Document\ContentFactory;
use Edu\Iu\Uits\KnowledgeBase\Document\Traits\Body;
use Edu\Iu\Uits\KnowledgeBase\Document\Traits\Rivetize;
use PHPUnit\Framework\TestCase;

class RivetizeTraitTest extends TestCase
{
    use Body;
    use Rivetize;

    public function rivetizeProvider()
    {
        return [
            [
                '<div class="references test">This is a test</div>',
                '',
            ],
            [
                '<div> <p><a href="#top" title="">Back to the top</a></p> </div>',
                '',
            ],
            [
                '<hr/>',
                '',
            ],
            [
                '<h1>',
                '<h1 class="rvt-ts-41 rvt-text-bold rvt-lh-title rvt-m-all-remove rvt-p-bottom-xs">',
            ],
            [
                '<h2 id="test">',
                '<h2 id="test" class="rvt-ts-20 rvt-text-bold rvt-lh-title rvt-p-bottom-xs rvt-m-all-remove">',
            ],
            [
                '<h3 id="test">',
                '<h3 id="test" class="rvt-text-bold rvt-lh-title">',
            ],
            [
                '<p>This is a test</p>',
                '<p class="rvt-ts-base">This is a test</p>',
            ],
            [
                '<div class="panel panel-info"><span>This is a test</span></div>',
                '<div class="rvt-alert rvt-alert--info rvt-m-top-md rvt-m-bottom-md"><span>This is a test</span></div>',
            ],
            [
                '<div class="panel panel-danger"><span>Test</span></div>',
                '<div class="rvt-alert rvt-alert--message rvt-m-top-md rvt-m-bottom-md"><span>Test</span></div>',
            ],
            [
                '<pre class="code highlight">10 print hello world</pre>',
                '<pre><code class="hljs code highlight">10 print hello world</code></pre>',
            ],
        ];
    }

    /**
     * @dataProvider rivetizeProvider
     */
    public function testRivetize($test, $expected)
    {
        $this->setBody($test);
        $this->rivetize();
        $this->assertEquals($expected, $this->getBody());
    }
}
