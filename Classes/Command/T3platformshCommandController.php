<?php
namespace Ksjogo\T3platformsh\Command;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Core\Database\ConnectionPool;

class T3platformshCommandController extends \TYPO3\CMS\Extbase\Mvc\Controller\CommandController
{

    /**
     * Fixes the special domain record
     *
     * @param int $pageId On which page shall the domain record be created. 1 as default.
     * @param string $region And this is an optional argument.
     * @return void
     */
    public function autodomainCommand($pageId = 1, $region = 'eu') {
        $qb = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('sys_domain');
        $qb->delete('sys_domain')
            ->where('domainName LIKE "%.platform.sh%"')
            ->andWhere('pid = :pid')
            ->setParameter('pid', $pageId)
            ->execute();
        $url = $this->getWantedUrl($region);

        $qb->insert('sys_domain')
            ->values([
                'pid' => $pageId,
                'domainName' => $url
            ])
            ->execute();
    }

    public function getWantedUrl($region = 'eu') {
        $environment = getenv('PLATFORM_ENVIRONMENT');
        $project = getenv('$PLATFORM_PROJECT');
        return 'http://' . $environment . '-' . $project . '.' . $region . '.platform.sh';
    }
}
