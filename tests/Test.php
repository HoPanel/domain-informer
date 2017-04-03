<?php

require __DIR__.'/../vendor/autoload.php';

class Test extends \PHPUnit\Framework\TestCase
{
    const SUCCESS_URLS = [
        'https://user:pass@subdomain.domain.tld:9090/path/to/file.html?query=queryt#hash',
    ];

    public function testDomainInformer()
    {
        foreach (self::SUCCESS_URLS as $url) {
            $parser = new \Hodi\Parser();
            $response = $parser->parseUrl($url);

            $this->assertInstanceOf(\Hodi\Response::class, $response, $url);

            $result = $parser->getResult();
            $this->assertTrue(is_array($result), $url);
            $this->assertArrayHasKey('created_at', $result, $url);
        }
    }
}
