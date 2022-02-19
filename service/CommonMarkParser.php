<?php

namespace App\Service;

use League\CommonMark\Extension\Attributes\AttributesExtension;
use League\CommonMark\Extension\Autolink\AutolinkExtension;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\DefaultAttributes\DefaultAttributesExtension;
use League\CommonMark\Extension\ExternalLink\ExternalLinkExtension;
use League\CommonMark\Extension\Footnote\FootnoteExtension;
use League\CommonMark\Extension\FrontMatter\FrontMatterExtension;
use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension;
use League\CommonMark\Extension\Strikethrough\StrikethroughExtension;
use League\CommonMark\Extension\Table\TableExtension;
use League\CommonMark\Extension\TableOfContents\TableOfContentsExtension;
use Mni\FrontYAML\Markdown\MarkdownParser;
use League\CommonMark\Environment\Environment;
use League\CommonMark\MarkdownConverter;

class CommonMarkParser implements MarkdownParser
{
    private MarkdownConverter $converter;

    public function __construct($config = [])
    {
        $environment = new Environment($config);

        $environment->addExtension(new CommonMarkCoreExtension());

        // $environment->addExtension(new DefaultAttributesExtension());
        $environment->addExtension(new AttributesExtension());
        $environment->addExtension(new AutolinkExtension());
        $environment->addExtension(new ExternalLinkExtension());
        $environment->addExtension(new FootnoteExtension());
        $environment->addExtension(new FrontMatterExtension());
        $environment->addExtension(new HeadingPermalinkExtension());
        $environment->addExtension(new StrikethroughExtension());
        $environment->addExtension(new TableExtension());
        $environment->addExtension(new TableOfContentsExtension());

        $this->converter = new MarkdownConverter($environment);
    }

    public function parse($markdown): string
    {
        return $this->converter->convert($markdown);
    }
}
