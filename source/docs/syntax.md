---
title: Syntax Demo
description: Hidden page with the syntax examples.
extends: _layouts.documentation
section: content
permalink: syntax/index.html
---

[TOC]

# Syntax Examples

# Heading 1
## Heading 2
### Heading 3
#### Heading 4
##### Heading 5
###### Heading 6



## Inline Text Styling

**Bold text**

*Italic text*

~~Strikethrough text~~

`Inline Code Block`

[Inline Link](syntax)

[External Link](https://google.com)

<u>Underlined text text</u>

<small>Small text</small>

==Word highlight==



## Blockquote

> Tip: This configuration file is also where you’ll define any "collections" (for example, a collection of the contributors to your site, or a collection of blog posts). Check out the official [Jigsaw documentation](https://jigsaw.tighten.co/docs/collections/) to learn more.



## List

Here's how a list title will look like:
- One
- Two
- Three
  - Nested

And here's how it works with a normal paragraph of text.



## Styled Message Box

:::
Default message box.

- A list
- Nested inside
- A message box
:::

:::info
Info message box.
:::

:::success
Success message box.
:::

:::warning
Warning message box.
:::

:::danger
Danger message box.
:::



## Code Box With Highlighting

```php
// config.php
return [
    'baseUrl' => 'https://my-awesome-jigsaw-site.com/',
    'production' => false,
    'siteName' => 'My Site',
    'siteDescription' => 'Give your documentation a boost with Jigsaw.',
    'docsearchApiKey' => '',
    'docsearchIndexName' => '',
    'navigation' => require_once('navigation.php'),
];
```

```bash
# build static files with Jigsaw
./vendor/bin/jigsaw build

# compile assets with Laravel Mix
# options: dev, staging, prod
npm run dev
```
