<?php

namespace Hodi;

class Parser
{

    protected $haydar;

    protected $response;

    protected $objectResult = true;

    const DOMAIN_REGEX_VALID_CHARS = "/(https|http|ftp)\:\/\/|([a-z0-9A-Z]+\.[a-z0-9A-Z]+\.[a-zA-Z]{2,4})|([a-z0-9A-Z]+\.[a-zA-Z]{2,4})|\?([a-zA-Z0-9]+[\&\=\#a-z]+)/i";

    const IP_REGEX = '/^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/';

    public function __construct()
    {
        $this->response = new HodiResponse();
    }

    public function parseUrl($urlString)
    {

        $isDomain = $this->checkDomain($urlString);
        $isIp = $this->checkIp($urlString);

        if (!$isDomain && !$isIp) {
            $this->response->setErrorMessage("No valid url or ip");
            $this->response->setStatus(0);
            return $this->response;
        }

        $this->response->setStatus(1);
        $this->response->setIsIp(true);
        $this->response->setIsDomain(false);

        if ($isDomain) {

            $this->response->setIsIp(false);
            $this->response->setIsDomain(true);
            $domainInfo = $this->getUrlInfo($urlString);
            $this->response->fill($domainInfo);

        }

        return ($this->objectResult === true) ? $this->response : $this->response->toArray();
    }

    private function getUrlInfo($urlString)
    {

        $defaults = [
            'scheme' => null,
            'host' => null,
            'port' => null,
            'user' => null,
            'pass' => null,
            'path' => null,
            'query' => null,
            'fragment' => null,
        ];

        $parsed = parse_url($urlString);
        $parsed['nameservers'] = $this->getDnsInfo($parsed);

        return array_merge($defaults, $parsed);
    }

    private function getDnsInfo($parsedUrl)
    {
        $nameservers = array_reduce(dns_get_record($parsedUrl['host'], DNS_NS), function ($result, $item) {
            $result[] = $item['target'];
            return $result;
        });
        return !$nameservers ? [] : $nameservers;
    }

    public function checkIp($urlString)
    {
        return preg_match(self::IP_REGEX, $urlString);
    }

    public function checkDomain($urlString)
    {
        return preg_match(self::DOMAIN_REGEX_VALID_CHARS, $urlString);
    }

    public function isObjectResult()
    {
        return $this->objectResult;
    }

    public function setObjectResult($objectResult)
    {
        $this->objectResult = $objectResult;
        return $this;
    }


}