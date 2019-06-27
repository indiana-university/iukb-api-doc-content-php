<?php
declare(strict_types=1);
/**
 * This file contains the LastModified trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Document\Traits;

/**
 * This trait represents a lastModified
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
trait LastModified
{
    /** @var The given lastModified of this item */
    private $lastModified;
    
    /**
     * Get the lastModified for this item
     *
     * @return \DateTime The lastModified for this item
     */
    public function getLastModified(): \DateTime
    {
        return $this->lastModified;
    }
    
    /**
     * Set the lastModified for this item
     *
     * @param string $input The lastModified for this time
     * @return object The instance of this object
     */
    public function setLastModified(\DateTime $input)
    {
        $this->lastModified = $input;
        return $this;
    }
}
