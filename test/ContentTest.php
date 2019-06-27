<?php
declare(strict_types=1);
/**
 * This file contains the tests for the KB Content class
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Document\Content\Factory\Tests;

use \PHPUnit\Framework\TestCase;
use Edu\Iu\Uits\KnowledgeBase\Document\Content;
use Edu\Iu\Uits\KnowledgeBase\Document\ContentFactory;

/**
 *
 */
class ContentFactoryTest extends TestCase
{
    public function testCreate()
    {
        $xml = file_get_contents(__dir__ . '/data/rest.content.xml');
        $content = ContentFactory::create($xml);
        
        $this->assertInstanceOf(
            '\Edu\Iu\Uits\KnowledgeBase\Document\Content',
            $content
        );
    }
    
    /**
     * @depends testCreate
     */
    public function testRebase()
    {
        $this->assertTrue(true);
        $xml = file_get_contents(__dir__ . '/data/rest.content.xml');
        $content = ContentFactory::create($xml);
        $content->setBody('<p><a href="aoeu">Test</a></p>');
        $content->rebaseKbLinks('', 'https://example.com/test/');
        $this->assertEquals(
            '<p><a href="https://example.com/test/aoeu">Test</a></p>',
            $content->getBody()
        );
        $content->rebaseKbLinks('https://example.com/test/', '/help/');
        $this->assertEquals(
            '<p><a href="/help/aoeu">Test</a></p>',
            $content->getBody()
        );
    }

    /**
     * @depends testCreate
     */
    public function testRebaseWithAnchor()
    {
        $xml = file_get_contents(__dir__ . '/data/rest.content.xml');
        $content = ContentFactory::create($xml);
        $content->setBody('<p><a href="aoeu#anchor">Test</a></p>');

        $content->rebaseKbLinks('', 'https://example.com/test/');
        $this->assertEquals(
            '<p><a href="https://example.com/test/aoeu#anchor">Test</a></p>',
            $content->getBody()
        );

        $content->rebaseKbLinks('https://example.com/test/', '/help/');
        $this->assertEquals(
            '<p><a href="/help/aoeu#anchor">Test</a></p>',
            $content->getBody()
        );
    }
}
