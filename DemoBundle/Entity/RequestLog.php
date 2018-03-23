<?php
/**
 * Created by PhpStorm.
 * User: Sergey Pavliuckhov
 * Date: 20.03.2018
 * Time: 15:06
 */

namespace DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class RequestLog
 *
 * @package DemoBundle\Entity\
 * @ORM\Entity
 * @ORM\Table(name="request_log")
 */
class RequestLog
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="request_date", type="datetime", nullable=false)
     */
    protected $requestDate;

    /**
     * @ORM\Column(name="ip", type="string", length=15, nullable=false)
     */
    protected $ip;

    /**
     * @ORM\Column(name="request_url", type="string", length=255,
     *   nullable=false)
     */
    protected $requestUrl;

    /**
     * @ORM\Column(name="response_url", type="string", length=255,
     *   nullable=false)
     */
    protected $responseUrl;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getRequestDate()
    {
        return $this->requestDate;
    }

    /**
     * @param mixed $requestDate
     */
    public function setRequestDate($requestDate)
    {
        $this->requestDate = $requestDate;
    }

    /**
     * @return mixed
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param mixed $ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    /**
     * @return mixed
     */
    public function getRequestUrl()
    {
        return $this->requestUrl;
    }

    /**
     * @param mixed $requestUrl
     */
    public function setRequestUrl($requestUrl)
    {
        $this->requestUrl = $requestUrl;
    }

    /**
     * @return mixed
     */
    public function getResponseUrl()
    {
        return $this->responseUrl;
    }

    /**
     * @param mixed $responseUrl
     */
    public function setResponseUrl($responseUrl)
    {
        $this->responseUrl = $responseUrl;
    }
}