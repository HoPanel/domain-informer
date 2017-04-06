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
Hodi\HodiResponse Object                                   
(                                                          
    [data:Hodi\HodiResponse:private] => Array              
        (                                                  
            [scheme] => https                              
            [host] => subdomain.domain.exp                 
            [port] => 9090                                 
            [user] => user                                 
            [pass] => pass                                 
            [path] => /path/to/file.html                   
            [query] => query=queryt                        
            [fragment] => hash                             
            [nameservers] => Array                         
                (                                          
                )                                          
                                                           
        )                                                  
                                                           
    [status:protected] => 1                                
    [errorMessage:protected] =>                            
    [isDomain:protected] => 1                              
    [isIp:protected] =>                                    
    [domainScheme:protected] => https                      
    [domainHost:protected] => subdomain.domain.exp         
    [domainPort:protected] => 9090                         
    [domainUser:protected] => user                         
    [domainPass:protected] => pass                         
    [domainPath:protected] => /path/to/file.html           
    [domainQuery:protected] => query=queryt                
    [domainFragment:protected] => hash                     
    [domainNameservers:protected] => Array                 
        (                                                  
        )                                                  
                                                           
)
```

Array sonuç almak için

```
$parser->toArray();
```


### Unit Tests

```bash
composer install
vendor/bin/phpunit tests
```
