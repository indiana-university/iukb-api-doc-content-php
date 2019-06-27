<?php
declare(strict_types=1);
/**
 * This file contains the Body trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Document\Traits;

/**
 * This trait represents an body
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
trait Body
{
    /** @var The given body of this item */
    private $body;
    
    /**
     * Get the body for this item
     *
     * @return string The body for this item
     */
    public function getBody(): string
    {
        return $this->body;
    }
    
    /**
     * Set the body for this item
     *
     * @param string $input The body for this time
     * @return object The instance of this object
     */
    public function setBody(string $input)
    {
        $this->body = $input;
        return $this;
    }
}
