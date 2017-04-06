<?php

namespace Hodi;

class HodiResponse
{
    private $data = [];
    protected $status = false;
    protected $errorMessage = null;
    protected $isDomain = null;
    protected $isIp = null;
    protected $domainScheme = null;
    protected $domainHost = null;
    protected $domainPort = null;
    protected $domainUser = null;
    protected $domainPass = null;
    protected $domainPath = null;
    protected $domainQuery = null;
    protected $domainFragment = null;
    protected $domainNameservers = [];

    public function __construct(array $data = [])
    {
        if ($data) {
            $this->fill($data);
        }
    }

    public function fill($data)
    {
        $this->data = $data;

        $this->domainScheme = $this->ifSet('scheme');
        $this->domainPort = $this->ifSet('port');
        $this->domainHost = $this->ifSet('host');
        $this->domainUser = $this->ifSet('user');
        $this->domainPass = $this->ifSet('pass');
        $this->domainPath = $this->ifSet('path');
        $this->domainQuery = $this->ifSet('query');
        $this->domainFragment = $this->ifSet('fragment');
        $this->domainNameservers = $this->ifSet('nameservers', []);
    }

    private function ifSet($key, $default = null)
    {
        return array_key_exists($key, $this->data) ? $this->data[$key] : $default;
    }

    public function isStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
        return $this;
    }

    public function toArray()
    {
        return [
            'status' => $this->status,
            'errorMessage' => $this->errorMessage,
            'isDomain' => $this->isDomain,
            'isIp' => $this->isIp,
            'domainScheme' => $this->domainScheme,
            'domainHost' => $this->domainHost,
            'domainPort' => $this->domainPort,
            'domainUser' => $this->domainUser,
            'domainPass' => $this->domainPass,
            'domainPath' => $this->domainPath,
            'domainQuery' => $this->domainQuery,
            'domainFragment' => $this->domainFragment,
            'domainNameservers' => $this->domainNameservers,
        ];
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    public function getIsDomain()
    {
        return $this->isDomain;
    }

    public function setIsDomain($isDomain)
    {
        $this->isDomain = $isDomain;
        return $this;
    }

    public function getIsIp()
    {
        return $this->isIp;
    }

    public function setIsIp($isIp)
    {
        $this->isIp = $isIp;
        return $this;
    }

    public function getDomainScheme()
    {
        return $this->domainScheme;
    }

    public function setDomainScheme($domainScheme)
    {
        $this->domainScheme = $domainScheme;
        return $this;
    }

    public function getDomainHost()
    {
        return $this->domainHost;
    }

    public function setDomainHost($domainHost)
    {
        $this->domainHost = $domainHost;
        return $this;
    }

    public function getDomainPort()
    {
        return $this->domainPort;
    }

    public function setDomainPort($domainPort)
    {
        $this->domainPort = $domainPort;
        return $this;
    }

    public function getDomainUser()
    {
        return $this->domainUser;
    }

    public function setDomainUser($domainUser)
    {
        $this->domainUser = $domainUser;
        return $this;
    }

    public function getDomainPass()
    {
        return $this->domainPass;
    }

    public function setDomainPass($domainPass)
    {
        $this->domainPass = $domainPass;
        return $this;
    }

    public function getDomainPath()
    {
        return $this->domainPath;
    }

    public function setDomainPath($domainPath)
    {
        $this->domainPath = $domainPath;
        return $this;
    }

    public function getDomainQuery()
    {
        return $this->domainQuery;
    }

    public function setDomainQuery($domainQuery)
    {
        $this->domainQuery = $domainQuery;
        return $this;
    }

    public function getDomainFragment()
    {
        return $this->domainFragment;
    }

    public function setDomainFragment($domainFragment)
    {
        $this->domainFragment = $domainFragment;
        return $this;
    }

    public function getDomainNameservers()
    {
        return $this->domainNameservers;
    }

    public function setDomainNameservers($domainNameservers)
    {
        $this->domainNameservers = $domainNameservers;
        return $this;
    }
}
