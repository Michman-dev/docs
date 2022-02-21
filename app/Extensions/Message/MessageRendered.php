<?php declare(strict_types=1);

namespace App\Extensions\Message;

use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Util\HtmlElement;
use League\Config\ConfigurationAwareInterface;
use League\Config\ConfigurationInterface;

class MessageRendered implements NodeRendererInterface, ConfigurationAwareInterface
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

        $filling = $childRenderer->renderNodes($node->children());
        $innerSeparator = $childRenderer->getInnerSeparator();

        // dd('Filling: ', $filling);

        $attrs = [
            'class' => $this->config->get('message/base_class') . ' ' . $this->config->get('message/style_class_prefix') . $node->data->get('style'),
        ];

        if ($filling === '') {
            return new HtmlElement('div', $attrs, $innerSeparator . implode('', $node->getContent()));
        }

        return new HtmlElement(
            'div',
            $attrs,
            $innerSeparator . $filling . $innerSeparator
        );
    }
}
