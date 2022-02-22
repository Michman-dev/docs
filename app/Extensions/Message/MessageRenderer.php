<?php declare(strict_types=1);

namespace App\Extensions\Message;

use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Util\HtmlElement;
use League\Config\ConfigurationAwareInterface;
use League\Config\ConfigurationInterface;

class MessageRenderer implements NodeRendererInterface, ConfigurationAwareInterface
{
    private ConfigurationInterface $config;

    public function setConfiguration(ConfigurationInterface $configuration): void
    {
        $this->config = $configuration;
    }

    /** @param Message $node */
    public function render(Node $node, ChildNodeRendererInterface $childRenderer): HtmlElement
    {
        Message::assertInstanceOf($node);

        $content = $childRenderer->renderNodes($node->children());
        $innerSeparator = $childRenderer->getInnerSeparator();

        $content = empty($content)
            ? $innerSeparator
            : ($innerSeparator . $content . $innerSeparator);

        $attrs = [
            'class' =>
                $this->config->get('message/base_class') . ' '
                . $this->config->get('message/style_class_prefix') . $node->data->get('style'),
        ];

        return new HtmlElement(
            'div',
            $attrs,
            $content
        );
    }
}
