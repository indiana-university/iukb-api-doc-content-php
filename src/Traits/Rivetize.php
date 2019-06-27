<?php
declare(strict_types=1);
/**
 * This file contains the rivetize trait
 * @copyright 2019 The Trustees of Indiana University
 * @license BSD-3-Clause
 */

namespace Edu\Iu\Uits\KnowledgeBase\Document\Traits;

/**
 * Trait Rivetize
 *
 * The contents of this class come almost exclusively from the rivetize
 * javascript library.
 *
 * @see https://github.com/indiana-university/rivetizer
 * @package Edu\Iu\Uits\KnowledgeBase\Document\Traits
 */
trait Rivetize
{
    /** @var array The css classes to use for replacements */
    private $cssClasses = [
        'h1' => 'rvt-ts-41 rvt-text-bold rvt-lh-title rvt-m-all-remove rvt-p-bottom-xs',
        'h2' => 'rvt-ts-20 rvt-text-bold rvt-lh-title rvt-p-bottom-xs rvt-m-all-remove',
        'h3' => 'rvt-text-bold rvt-lh-title',
        'p' => 'rvt-ts-base',
        'alert' => 'rvt-m-top-md rvt-m-bottom-md',
    ];

    /**
     * Rivetize function
     *
     * This function will alter the body of the current KB doc to use the css
     * classes for rivet instead of the classes the KB actually uses.
     *
     * @return void
     */
    public function rivetize(): void
    {
        $replacements = [
            [
                'pattern' => '/<div class="references [\s\w-]+">.*?<\/div>/',
                'replacement' => '',
            ],
            [
                'pattern' => '/<div>\s<p><a href="#top" title="">(.+)<\/a><\/p>\s<\/div>/',
                'replacement' => '',
            ],
            [
                'pattern' => '/<hr\/>/',
                'replacement' => '',
            ],
            [
                'pattern' => '/<h1>/',
                'replacement' => "<h1 class=\"{$this->cssClasses['h1']}\">",
            ],
            [
                'pattern' => '/<h2(\sid="(.+)")?>/',
                'replacement' => "<h2 id=\"$2\" class=\"{$this->cssClasses['h2']}\">",
            ],
            [
                'pattern' => '/<h3(\sid="(.+)")?>/',
                'replacement' => "<h3 id=\"$2\" class=\"{$this->cssClasses['h3']}\">",
            ],
            [
                'pattern' => '/<p>/',
                'replacement' => "<p class=\"{$this->cssClasses['p']}\">",
            ],
            [
                'pattern' => '/<div class="panel panel-info">/',
                'replacement' => "<div class=\"rvt-alert rvt-alert--info {$this->cssClasses['alert']}\">",
            ],
            [
                'pattern' => '/<div class="panel panel-danger">/',
                'replacement' => "<div class=\"rvt-alert rvt-alert--message {$this->cssClasses['alert']}\">",
            ],
            [
                'pattern' => '/<pre class="(.+)">/',
                'replacement' => "<pre><code class=\"hljs $1\">",
            ],
            [
                'pattern' => '/<\/pre>/',
                'replacement' => '</code></pre>',
            ]
        ];

        $body = $this->getBody();

        foreach ($replacements as $replacement) {
            $body = preg_replace(
                $replacement['pattern'],
                $replacement['replacement'],
                $body
            );
        }

        $this->setBody($body);

        return;
    }
}
