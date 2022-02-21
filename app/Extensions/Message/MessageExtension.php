<?php declare(strict_types=1);

namespace App\Extensions\Message;

use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Extension\ConfigurableExtensionInterface;
use League\Config\ConfigurationBuilderInterface;
use Nette\Schema\Expect;

class MessageExtension implements ConfigurableExtensionInterface
{
    public function configureSchema(ConfigurationBuilderInterface $builder): void
    {
        $builder->addSchema('message', Expect::structure([
            'syntax' => Expect::anyOf(':::')->default(':::'),
            'base_class' => Expect::string()->default('message'),
            'style_class_prefix' => Expect::string()->default('message-'),
        ]));
    }

    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment
            ->addBlockStartParser(new MessageBlockStarterParser, 200)
            ->addRenderer(Message::class, new MessageRendered);
    }
}
