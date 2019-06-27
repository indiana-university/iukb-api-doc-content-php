<?php
declare(strict_types=1);
/**
 * This file contains the Docid trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Document\Traits;

/**
 * This trait represents a docid
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
trait Docid
{
    /** @var The given docid of this item */
    private $docid;
    
    /**
     * Get the docid for this item
     *
     * @return string The docid for this item
     */
    public function getDocid(): string
    {
        return $this->docid;
    }
    
    /**
     * Set the docid for this item
     *
     * @param string $input The docid for this time
     * @return object The instance of this object
     */
    public function setDocid(string $input)
    {
        $this->docid = $input;
        return $this;
    }
}
