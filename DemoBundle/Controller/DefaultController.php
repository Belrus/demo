<?php
/**
 * Created by PhpStorm.
 * User: Sergey Pavliuckhov
 * Date: 20.03.2018
 * Time: 14:21
 */

namespace DemoBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
     * @Route("/parse-logs")
     */
    public function parseLogsAction(){

    }



}