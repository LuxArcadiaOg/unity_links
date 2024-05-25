<?php

defined('TYPO3') or die('Access denied.');

return [
    'ctrl' => [
        'title' => 'Storage',
        'label' => 'name',
        'sortby' => 'sorting',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'dividers2tabs' => true,
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'typeicon_classes' => [
            'default' => 'actions-check'
        ],
        'searchFields' => 'uid, name, links',
    ],
    'columns' => [
        'name' => [
            'label' => 'Name',
            'config' => [
                'type' => 'input',
                'max' => 50,
                'required' => true
            ],
        ],
        'slug' => [
            'label' => 'Slug',
            'config' => [
                'type' => 'slug',
                'size' => 50,
                'generatorOptions' => [
                    'fields' => [
                        'pid',
                    ],
                    'fieldSeparator' => '/',
                    'prefixParentPageSlug' => true,
                ],
                'fallbackCharacter' => '-',
                'eval' => 'uniqueInSite',
                'default' => '',
            ],
        ],
        'description' => [
            'label' => 'Beschreibung',
            'config' => [
                'type' => 'text',
            ],
        ],
        'profile_image' => [
            'label' => 'Profile Image',
            'config' => [
                'type' => 'file',
                'allowed' => 'common-media-types',
                'maxitems' => 1,
            ],
        ],
        'header_image' => [
            'label' => 'Header Image',
            'config' => [
                'type' => 'file',
                'allowed' => 'common-media-types',
                'maxitems' => 1,
            ],
        ],
        'user' => [
            'label' => 'User',
            'config' => [
                'type' => 'group',
                'allowed' => 'fe_users',
                'maxitems' => 1,
                'minitems' => 0,
                'size' => 1,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => false,
                    ],
                ],
            ],
        ],
        'links' => [
            'label' => 'Links',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_unitylinks_domain_model_link',
                'foreign_field' => 'storage'
            ],
        ],
    ],
    'types' => [
        0 => [
            'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    name,
                    slug,
                    user,
                    description,
                    profile_image,
                    header_image,
                    links,
            ',
        ],
    ],
];
