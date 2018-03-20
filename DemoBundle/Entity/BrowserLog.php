<?php
/**
 * Created by PhpStorm.
 * User: Sergey Pavliuckhov
 * Date: 20.03.2018
 * Time: 15:13
 */

namespace DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class BrowserLog
 *
 * @package DemoBundle\Entity\
 * @ORM\Entity
 * @ORM\Table(name="browser_log")
 */
class BrowserLog
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="ip", type="string", length=15, nullable=false)
     */
    protected $ip;

    /**
     * @ORM\Column(name="browser", type="string", length=255, nullable=false)
     */
    protected $browser;

    /**
     * @ORM\Column(name="operating_system", type="string", length=255,
     *   nullable=false)
     */
    protected $operatingSystem;

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
    public function getBrowser()
    {
        return $this->browser;
    }

    /**
     * @param mixed $browser
     */
    public function setBrowser($browser)
    {
        $this->browser = $browser;
    }

    /**
     * @return mixed
     */
    public function getOperatingSystem()
    {
        return $this->operatingSystem;
    }

    /**
     * @param mixed $operatingSystem
     */
    public function setOperatingSystem($operatingSystem)
    {
        $this->operatingSystem = $operatingSystem;
    }
}