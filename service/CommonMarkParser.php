<?php

namespace App\Service;

use Mni\FrontYAML\Markdown\MarkdownParser;
use League\CommonMark\GithubFlavoredMarkdownConverter;

class CommonMarkParser implements MarkdownParser
{
    public function __construct(
        private GithubFlavoredMarkdownConverter $converter,
    ) {}

    public function parse($markdown): string
    {
        return $this->converter->convert($markdown);
    }
}
