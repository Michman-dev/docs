<?php declare(strict_types=1);

namespace App\Extensions\Message;

use League\CommonMark\Parser\Block\BlockStart;
use League\CommonMark\Parser\Block\BlockStartParserInterface;
use League\CommonMark\Parser\Cursor;
use League\CommonMark\Parser\MarkdownParserStateInterface;
use League\Config\ConfigurationAwareInterface;
use League\Config\ConfigurationInterface;

class MessageBlockStarterParser implements BlockStartParserInterface, ConfigurationAwareInterface
{
    private ConfigurationInterface $config;

    public function setConfiguration(ConfigurationInterface $configuration): void
    {
        $this->config = $configuration;
    }

    public function tryStart(Cursor $cursor, MarkdownParserStateInterface $parserState): ?BlockStart
    {
        if ($cursor->isIndented())
            return BlockStart::none();

        $syntax = $this->config->get('message/syntax');

        $savedState = $cursor->saveState();

        $match = $cursor->match('/' . $syntax . '/');

        if (is_null($match)) {
            $cursor->restoreState($savedState);
            return BlockStart::none();
        }

        $style = trim($cursor->getRemainder());
        $style = empty($style) ? null : $style;

        $cursor->advanceToEnd();

        return BlockStart::of(new MessageBlockContinueParser(
            $style,
            $syntax,
        ))->at($cursor);
    }
}
