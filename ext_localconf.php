<?php

use Arcadia\UnityLinks\Controller\SettingsController;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die('Access denied.');

/***************
 * Add default RTE configuration
 */
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['unity_links'] = 'EXT:unity_links/Configuration/RTE/Default.yaml';

/***************
 * PageTS
 */
ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:unity_links/Configuration/TsConfig/Page/All.tsconfig">');

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
