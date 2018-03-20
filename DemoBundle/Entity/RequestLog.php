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
     * @ORM\Column(name="request_date", type="date", nullable=false)
     */
    protected $requestDate;

    /**
     * @ORM\Column(name="request_time", type="time", nullable=false)
     */
    protected $requestTime;

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
     * @ORM\Column(name="request_path", type="string", length=255,
     *   nullable=false)
     */
    protected $requestPath;

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
    public function getRequestTime()
    {
        return $this->requestTime;
    }

    /**
     * @param mixed $requestTime
     */
    public function setRequestTime($requestTime)
    {
        $this->requestTime = $requestTime;
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
    public function getRequestPath()
    {
        return $this->requestPath;
    }

    /**
     * @param mixed $requestPath
     */
    public function setRequestPath($requestPath)
    {
        $this->requestPath = $requestPath;
    }
}