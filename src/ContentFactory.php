<?php
declare(strict_types=1);
/**
 * This file contains the Content Factory class
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Document;

use Edu\Iu\Uits\KnowledgeBase\Document\Content;

/**
 * Content class factory
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
class ContentFactory
{
    /**
     * Create a Content class instance from the xml document contents
     *
     * @param string $docContent The kbdoc contents
     * @return Edu\Iu\Uits\KnowledgeBase\Document\Content\Content An instance of Content
     */
    public static function create(string $docContent): Content
    {
        $xml = simplexml_load_string($docContent);
        $xml->registerXPathNamespace('xhtml', 'http://www.w3.org/1999/xhtml');
        
        $content = new Content();
        $content->setApprovedDate(
            new \DateTime(self::getMetaContent($xml, 'approved-date'))
        );
        
        $content->setAudiences(
            [self::getMetaContent($xml, 'audiences')]
        );
        
        $content->setLastModified(
            new \DateTime(self::getMetaContent($xml, 'last-modified'))
        );
        
        $content->setDocid(
            self::getMetaContent($xml, 'docid')
        );
        
        $content->setOwner(
            self::getMetaContent($xml, 'owner')
        );
        
        $content->setTitle(
            (string)$xml->head->title
        );
        
        $content->setBody(
            self::getBody($xml)
        );
        
        return $content;
    }
    
    /**
     * Run an xpath query on a given xml object and return the content.
     * This exists because I am lazy and HATE the way SimpleXML works for
     * querying attributes.
     *
     * @param \SimpleXMLElement $xml The given xml object
     * @param string $name The meta tag name
     * @return string The contents of the given meta tag
     */
    public static function getMetaContent(\SimpleXMLElement $xml, string $name): string
    {
        return (string)$xml->xpath("//xhtml:meta[@name='{$name}']")[0]->attributes()['content'];
    }
    
    /**
     * Return the content of the body tag
     *
     * @param \SimpleXMLElement $xml The xml object
     * @return string The contents of the body tags
     */
    public static function getBody(\SimpleXMLElement $xml): string
    {
        $body = $xml->body->asXML();
        preg_match('/<body>(.*?)<\/body>/s', $body, $matches);
        return $matches[1];
    }
}
