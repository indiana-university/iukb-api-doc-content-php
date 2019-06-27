<?php
declare(strict_types=1);
/**
 * This file contains the Audiences trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Document\Traits;

/**
 * This trait represents an audiences
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
trait Audiences
{
    /** @var The given audiences of this item */
    private $audiences;
    
    /**
     * Get the audiences for this item
     *
     * @return array The audiences for this item
     */
    public function getAudiences(): array
    {
        return $this->audiences;
    }
    
    /**
     * Set the audiences for this item
     *
     * @param array $input The audiences for this time
     * @return object The instance of this object
     */
    public function setAudiences(array $input)
    {
        $this->audiences = $input;
        return $this;
    }
}
