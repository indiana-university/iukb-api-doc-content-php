<?php
declare(strict_types=1);
/**
 * This file contains the Title trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Document\Traits;

/**
 * This trait represents a title
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
trait Title
{
    /** @var The given title of this item */
    private $title;
    
    /**
     * Get the title for this item
     *
     * @return string The title for this item
     */
    public function getTitle(): string
    {
        return $this->title;
    }
    
    /**
     * Set the title for this item
     *
     * @param string $input The title for this time
     * @return object The instance of this object
     */
    public function setTitle(string $input)
    {
        $this->title = $input;
        return $this;
    }
}
