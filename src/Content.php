<?php
declare(strict_types=1);
/**
 * This file contains the Parsed Document class
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */
namespace Edu\Iu\Uits\KnowledgeBase\Document;

use Edu\Iu\Uits\KnowledgeBase\Document\Traits\ApprovedDate;
use Edu\Iu\Uits\KnowledgeBase\Document\Traits\Audiences;
use Edu\Iu\Uits\KnowledgeBase\Document\Traits\LastModified;
use Edu\Iu\Uits\KnowledgeBase\Document\Traits\Docid;
use Edu\Iu\Uits\KnowledgeBase\Document\Traits\Owner;
use Edu\Iu\Uits\KnowledgeBase\Document\Traits\Title;
use Edu\Iu\Uits\KnowledgeBase\Document\Traits\Body;
use Edu\Iu\Uits\KnowledgeBase\Document\Traits\Rivetize;

/**
 * This class represents the parsed content of a kb document
 *
 * @author Anthony Vitacco <avitacco@iu.edu>
 */
class Content
{
    use ApprovedDate;
    use Audiences;
    use LastModified;
    use Docid;
    use Owner;
    use Title;
    use Body;
    use Rivetize;
    
    /**
     * Change the base part of kb links
     *
     * @param string $currentBase The current base
     * @param string $newBase The new base with trailing slash
     */
    public function rebaseKbLinks(string $currentBase, string $newBase): void
    {
        $currentBase = preg_quote($currentBase, '/');
        $this->body = preg_replace(
            "/href=\"{$currentBase}([a-zA-Z]{4}[#a-zA-Z]*)\"/s",
            "href=\"{$newBase}$1\"",
            $this->body
        );
    }
}
