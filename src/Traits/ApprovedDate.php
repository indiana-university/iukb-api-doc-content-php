<?php
declare(strict_types=1);
/**
 * This file contains the ApprovedDate trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Document\Traits;

/**
 * This trait represents a approvedDate
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
trait ApprovedDate
{
    /** @var The given approvedDate of this item */
    private $approvedDate;
    
    /**
     * Get the approvedDate for this item
     *
     * @return \DateTime The approvedDate for this item
     */
    public function getApprovedDate(): \DateTime
    {
        return $this->approvedDate;
    }
    
    /**
     * Set the approvedDate for this item
     *
     * @param string $input The approvedDate for this time
     * @return object The instance of this object
     */
    public function setApprovedDate(\DateTime $input)
    {
        $this->approvedDate = $input;
        return $this;
    }
}
