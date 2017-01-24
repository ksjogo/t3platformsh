<?php
if (!defined('TYPO3_MODE'))
    die('Access denied.');

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['extbase']
    ['commandControllers'][$_EXTKEY] = \Ksjogo\T3platformsh\Command\T3platformshCommandController::class;
