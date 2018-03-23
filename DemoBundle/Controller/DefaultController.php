<?php
/**
 * Created by PhpStorm.
 * User: Sergey Pavliuckhov
 * Date: 20.03.2018
 * Time: 14:21
 */

namespace DemoBundle\Controller;


use DemoBundle\Manager\LogManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{

    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('DemoBundle:Default:index.html.twig');
    }

    /**
     * @Route("/get-logs")
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return JsonResponse
     * @throws \Doctrine\DBAL\DBALException
     */
    public function getLogsAction(Request $request)
    {
        $page = $request->get('page');
        $limit = $request->get('limit');

        $logManager = new LogManager($this->get('service_container'));
        $logs = $logManager->getLogs($page, $limit);

        return new JsonResponse([
          'data' => $logs['result'],
          'total' => $logs['total'],
        ]);
    }


}