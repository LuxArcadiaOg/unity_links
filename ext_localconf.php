<?php

use Arcadia\UnityLinks\Controller\SettingsController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die('Access denied.');

ExtensionUtility::configurePlugin(
   'UnityLinks',
   'Settings',
    [
        SettingsController::class => 'addForm, list, show, add',
    ],
    [
        SettingsController::class => 'addForm, list, show, add',
    ]
);
