<?php declare(strict_types=1);

namespace App\Extensions\Message;

use League\CommonMark\Node\Block\AbstractBlock;

class Message extends AbstractBlock
{
    private array $content;

    public function setContent(array $content): void
    {
        $this->content = $content;
    }

    public function getContent(): array
    {
        return $this->content;
    }
}
