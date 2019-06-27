<?php
declare(strict_types=1);
/**
 * This file contains the Owner trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Document\Traits;

/**
 * This trait represents an owner
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
trait Owner
{
    /** @var The given owner of this item */
    private $owner;
    
    /**
     * Get the owner for this item
     *
     * @return string The owner for this item
     */
    public function getOwner(): string
    {
        return $this->owner;
    }
    
    /**
     * Set the owner for this item
     *
     * @param string $input The owner for this time
     * @return object The instance of this object
     */
    public function setOwner(string $input)
    {
        $this->owner = $input;
        return $this;
    }
}
