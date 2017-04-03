[Türkçe]
===

## Domain informer

Domain hakkında temel bilgileri verir.
Php'nin buildin fonksiyonları ile çalışır.



### Kullanımı
```
<?php

$url = 'https://user:pass@subdomain.domain.tld:9090/path/to/file.html?query=queryt#hash';
$parser = new Parser();
$result =  $parser->parseUrl($url);
print_r($result);
```

```
Hodi\Response Object
(
    [result:protected] => Array
        (
            [created_at] => DateTime Object
                (
                    [date] => 2017-04-03 17:01:59.000000
                    [timezone_type] => 3
                    [timezone] => Europe/Moscow
                )

            [status] => 1
            [code] =>
            [error_message] =>
            [result] => Array
                (
                    [scheme] => https
                    [host] => subdomain.domain.exp
                    [port] => 9090
                    [user] => user
                    [pass] => pass
                    [path] => /path/to/file.html
                    [query] => query=queryt
                    [fragment] => hash
                    [dns] => Array
                        (
                            [nameservers] => Array
                                (
                                )

                        )

                )

        )

)
```

### Unit Tests

```bash
composer install
vendor/bin/phpunit tests
```
