<?php
$EM_CONF[$_EXTKEY] = array(
    'title' => 't3platformsh',
    'description' => 'Scripts and Configuration needed for a good Platform.sh experience',
    'constraints' => array(
        'depends' => array(
            'typo3' => '8.5.0-8.99.99'
        ),
        'conflicts' => array(
        ),
    ),
    'autoload' => array(
        'psr-4' => array(
            'Ksjogo\\T3platformsh\\' => 'Classes'
        ),
    ),
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => '',
    'author_email' => '',
    'author_company' => '',
    'version' => '1.0.0',
);
