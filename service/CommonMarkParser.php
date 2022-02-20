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
use Spatie\CommonMarkShikiHighlighter\HighlightCodeExtension;

class CommonMarkParser implements MarkdownParser
{
    private MarkdownConverter $converter;

    public function __construct($config = [])
    {
        $environment = new Environment($config);

        // Required base CommonMark extension
        $environment->addExtension(new CommonMarkCoreExtension());

        // Customization extensions
        $environment
            ->addExtension(new DefaultAttributesExtension())
            ->addExtension(new AttributesExtension())
            ->addExtension(new AutolinkExtension())
            ->addExtension(new ExternalLinkExtension())
            ->addExtension(new FootnoteExtension())
            ->addExtension(new FrontMatterExtension())
            ->addExtension(new HeadingPermalinkExtension())
            ->addExtension(new StrikethroughExtension())
            ->addExtension(new TableExtension())
            ->addExtension(new TableOfContentsExtension())
            ->addExtension(new HighlightCodeExtension('github-dark-dimmed'));

        $this->converter = new MarkdownConverter($environment);
    }

    public function parse($markdown): string
    {
        /*
         * We have to undo and then redo the escaping that Jigsaw Markdown handler applies,
         * otherwise the JS-based highlighter shiki breaks everything down the road.
         * See TightenCo\Jigsaw\Handlers\MarkdownHandler->getEscapedMarkdownContent.
         */
        $markdown = strtr($markdown, [
            "<{{'?php'}}" => '<?php',
            "{{'@'}}" => '@',
            '@{{' => '{{',
            '@{!!' => '{!!',
        ]);

        $result = $this->converter->convert($markdown);

        $result = strtr($result, [
            '<?php' => "<{{'?php'}}",
            '@' => "{{'@'}}",
            '{{' => '@{{',
            '{!!' => '@{!!',
        ]);

        return $result;
    }
}
