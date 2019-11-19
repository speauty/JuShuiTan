#### 聚水潭-PHP类库

该类库主要用于PHP对接聚水潭开放平台, 之前在提交packagist时, 系统提示有类似类库. 我跟过去看了一下, 其中一个, 提到有奇门之类的词汇. 过后又仔细翻了一下, 好像没有相关接口, 就没有做. 只是简单的一个参数封装和请求的操作, 其中没有日志记录, 一切从简.

##### 参考用法
```php
require "vendor/autoload.php";
use \JuShuiTan\Conf;
use \JuShuiTan\Tools;

$arr = [
    'partnerid' => 'ywv5jGT8ge6Pvlq3FZSPol345asd',
    'partnerkey' => 'ywv5jGT8ge6Pvlq3FZSPol2323',
    'token' => '181ee8952a88f5a57db52587472c3798',
    'method' => 'logisticscompany.query',
    'sign' => ''
];
$conf = new Conf($arr, true);
$jushuitan = new Tools($conf);
var_dump($jushuitan->exec(["modified_begin"=>"2016-08-30 10:51:40","modified_end"=>"2016-09-04 15:49:21"]));
```

下一步, 可以考虑将`method`也封装一下, 只需要传个查询参数进来即可, 不过具体采用哪种模式, 还是要认真考虑一下.