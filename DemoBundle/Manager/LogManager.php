<?php
/**
 * Created by PhpStorm.
 * User: Sergey Pavliuckhov
 * Date: 21.03.2018
 * Time: 9:36
 */

namespace DemoBundle\Manager;


use Symfony\Component\DependencyInjection\ContainerInterface;

class LogManager
{

    /**
     * @var ContainerInterface $container
     */
    protected $container;

    protected $doctrine;

    /**
     * LogManager constructor.
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->doctrine = $this->container->get('doctrine');
    }

    /**
     * @param int $currentPage
     * @param int $limit
     *
     * @return array
     * @throws \Doctrine\DBAL\DBALException
     */
    public function getLogs($currentPage = 1, $limit = 5)
    {
        /**
         * @var \Doctrine\DBAL\Statement $query
         */
        $query = $this->doctrine->getConnection()
          ->prepare('SELECT rl.ip, count(rl.ip), (select request_url from request_log where rl.ip = ip order by request_date ASC limit 1 ) as firstRequestUrl, (select response_url from request_log where rl.ip = ip order by request_date DESC limit 1) as lastResponseUrl, (select browser from browser_log where ip = rl.ip order by id DESC limit 1) as browser, (select operating_system from browser_log where ip = rl.ip order by id DESC limit 1) as os FROM request_log rl GROUP BY ip LIMIT ' . $limit . ' OFFSET ' . $limit * ($currentPage - 1));
        $query->execute();
        $result = $query->fetchAll();

        /**
         * @var \Doctrine\DBAL\Statement $queryCount
         */
        $queryCount = $this->doctrine->getConnection()
          ->prepare('SELECT rl.ip FROM request_log AS rl GROUP BY rl.ip');
        $queryCount->execute();
        $queryCount = $queryCount->rowCount();

        return ['result' => $result, 'total' => $queryCount];
    }
}