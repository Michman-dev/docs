<?php

use League\CommonMark\Extension\CommonMark\Node\Block\Heading;
use League\CommonMark\Extension\CommonMark\Node\Inline\Link;
use League\CommonMark\Extension\Table\Table;
use League\CommonMark\Node\Block\Paragraph;

return [
    // 'renderer' => [
    //     'block_separator' => "\n",
    //     'inner_separator' => "\n",
    //     'soft_break'      => "\n",
    // ],

    'commonmark' => [
        'enable_em'                 => true,
        'enable_strong'             => true,
        'use_asterisk'              => true,
        'use_underscore'            => true,
        // 'unordered_list_markers' => ['-', '*', '+'],
    ],

    'html_input' => 'allow',

    // https://commonmark.thephpleague.com/2.2/extensions/default-attributes/
    /*
    'default_attributes' => [
        Heading::class => [
            'class' => static function (Heading $node) {
                if ($node->getLevel() === 1) {
                    return 'title-main';
                } else {
                    return null;
                }
            },
        ],
        Table::class => [
            'class' => 'table',
        ],
        Paragraph::class => [
            'class' => ['text-center', 'font-comic-sans'],
        ],
        Link::class => [
            'class' => 'btn btn-link',
            'target' => '_blank',
        ],
    ],
    */

    // https://commonmark.thephpleague.com/2.2/extensions/heading-permalinks/
    'heading_permalink' => [
        'html_class'        => 'heading-permalink',
        'id_prefix'         => '',
        'fragment_prefix'   => '',
        'insert'            => 'after',
        'min_heading_level' => 1,
        'max_heading_level' => 6,
        'title'             => '',
        'symbol'            => '#',
        'aria_hidden'       => true,
    ],

    // https://commonmark.thephpleague.com/2.2/extensions/table-of-contents/
    'table_of_contents' => [
        'html_class'        => 'table-of-contents',
        'position'          => 'placeholder',
        'style'             => 'bullet',
        'min_heading_level' => 1,
        'max_heading_level' => 6,
        'normalize'         => 'relative',
        'placeholder'       => '[TOC]',
    ],

    // https://commonmark.thephpleague.com/2.2/extensions/external-links/
    'external_link' => [
        'internal_hosts' => ['localhost', 'michman.dev'],
        'open_in_new_window' => true,
        'html_class' => 'external-link',
        'nofollow' => '',
        'noopener' => 'external',
        'noreferrer' => 'external',
    ],

    // https://commonmark.thephpleague.com/2.2/extensions/footnotes/
    'footnote' => [
        'backref_class'         => 'footnote-backref',
        // 'backref_symbol'        => '↩',
        'backref_symbol'        => '↑',
        'container_add_hr'      => true,
        'container_class'       => 'footnotes',
        'ref_class'             => 'footnote-ref',
        'ref_id_prefix'         => 'fnref:',
        'footnote_class'        => 'footnote',
        'footnote_id_prefix'    => 'fn:',
    ],
];
