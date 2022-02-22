<?php declare(strict_types=1);

namespace App\Extensions\Message;

use League\CommonMark\Node\Block\AbstractBlock;
use League\CommonMark\Node\Block\Paragraph;
use League\CommonMark\Parser\Block\AbstractBlockContinueParser;
use League\CommonMark\Parser\Block\BlockContinue;
use League\CommonMark\Parser\Block\BlockContinueParserInterface;
use League\CommonMark\Parser\Block\BlockContinueParserWithInlinesInterface;
use League\CommonMark\Parser\Cursor;
use League\CommonMark\Parser\InlineParserEngineInterface;

class MessageBlockContinueParser extends AbstractBlockContinueParser implements BlockContinueParserWithInlinesInterface
{
    private string $syntax;
    private Message $block;
    private array $lines = [];

    public function __construct(string|null $style, string $syntax)
    {
        $this->syntax = $syntax;
        $this->block = new Message();

        $this->block->data->set('style', $style);
    }

    public function isContainer(): bool
    {
        return true;
    }

    public function canHaveLazyContinuationLines(): bool
    {
        return true;
    }

    public function addLine(string $line): void
    {
        $this->lines[] = $line;
    }

    public function canContain(AbstractBlock $childBlock): bool
    {
        return true;
    }

    public function getBlock(): AbstractBlock
    {
        return $this->block;
    }

    public function tryContinue(Cursor $cursor, BlockContinueParserInterface $activeBlockParser): ?BlockContinue
    {
        $cursor->advanceToNextNonSpaceOrTab();

        $savedState = $cursor->saveState();

        $match = $cursor->match('/' . $this->syntax . '/');

        if (! is_null($match)) {
            $cursor->advanceToEnd();
            return BlockContinue::finished();
        }

        $cursor->restoreState($savedState);

        return BlockContinue::at($cursor);
    }

    public function parseInlines(InlineParserEngineInterface $inlineParser): void
    {
        foreach ($this->lines as $line) {
            $paragraph = new Paragraph;

            $inlineParser->parse($line, $paragraph);

            $this->block->appendChild($paragraph);
        }
    }
}
