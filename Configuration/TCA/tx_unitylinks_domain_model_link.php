<?php

defined('TYPO3') or die('Access denied.');

return [
    'ctrl' => [
        'title' => 'Link',
        'label' => 'title',
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
        'searchFields' => 'uid, title, links',
    ],
    'columns' => [
        'title' => [
            'label' => 'Titel',
            'config' => [
                'type' => 'input',
                'max' => 255,
                'required' => true
            ],
        ],
        'href' => [
            'label' => 'href',
            'config' => [
                'type' => 'input',
                'max' => 255,
                'required' => true
            ],
        ],
        'storage' => [
            'label' => 'Storage',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_unitylinks_domain_model_storage',
            ],
        ],
    ],
    'types' => [
        0 => [
            'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    title,
                    href,
                    storage,
            ',
        ],
    ],
];
