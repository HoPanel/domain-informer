<?php

namespace Hodi;

class Parser
{

    protected $response;

    const DOMAIN_REGEX_VALID_CHARS = "/(https|http|ftp)\:\/\/|([a-z0-9A-Z]+\.[a-z0-9A-Z]+\.[a-zA-Z]{2,4})|([a-z0-9A-Z]+\.[a-zA-Z]{2,4})|\?([a-zA-Z0-9]+[\&\=\#a-z]+)/i";

    const IP_REGEX = '/^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/';

    public function __construct()
    {
        $this->response = new Response();
    }

    public function parseUrl($urlString)
    {

        $isDomain = $this->checkDomain($urlString);
        $isIp = $this->checkIp($urlString);

        if (!$isDomain && !$isIp) {
            $this->response->setErrorMessage("No valid string");
            $this->response->setStatus(0);
            return $this->response;
        }

        $this->response->setStatus(1);

        if ($isDomain) {
            $this->response->setResult($this->getUrlInfo($urlString));

        }

        return $this->response;
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

        $parsed['dns']['nameservers'] = $this->getDnsInfo($parsed);

        return array_merge($defaults, $parsed);
    }

    private function getDnsInfo($parsedUrl)
    {
        $nameservers = array_reduce(dns_get_record($parsedUrl['host'], DNS_NS), function ($r, $i) {
            $r[] = $i['target'];
            return $r;
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

}