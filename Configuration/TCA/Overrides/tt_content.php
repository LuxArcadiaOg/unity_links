<?php

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

(static function (): void {
    ExtensionUtility::registerPlugin(
        'UnityLinks',
        'Storage',
        'Panel Einstellungen'
    );
})();
