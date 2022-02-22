<?php declare(strict_types=1);

namespace App\Extensions\Message;

use League\CommonMark\Node\Block\AbstractBlock;
use League\CommonMark\Parser\Block\AbstractBlockContinueParser;
use League\CommonMark\Parser\Block\BlockContinue;
use League\CommonMark\Parser\Block\BlockContinueParserInterface;
use League\CommonMark\Parser\Cursor;

class MessageBlockContinueParser extends AbstractBlockContinueParser
{
    private string $syntax;
    private Message $block;

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
}
