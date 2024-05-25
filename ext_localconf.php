<?php

use Arcadia\UnityLinks\Controller\StorageController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die('Access denied.');

ExtensionUtility::configurePlugin(
   'UnityLinks',
   'Storage',
    [
        StorageController::class => 'addForm, list, show, add',
    ],
    [
        StorageController::class => 'addForm, list, show, add',
    ]
);
