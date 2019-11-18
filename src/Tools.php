<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    Tools.php
 * Created: 2019/11/18 下午4:57
 */

namespace JuShuiTan;
use GuzzleHttp\Client as HttpClient;


/**
 * Class Tools
 * @package JuShuiTan
 */
class Tools
{
    private $conf = null;

    /**
     * Tools constructor.
     * @param Conf $conf
     * @throws \Exception
     */
    public function __construct(Conf $conf)
    {
        if (!$this->conf instanceof Conf) $this->conf = $conf;
    }

    /**
     * 执行请求
     * @param array|null $params
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function exec(?array $params = null):?array
    {
        $confArr = $this->conf->get('confArr');
        unset($confArr['partnerkey']);
        $headers = $confArr;
        $headers['Content-Type'] = 'application/x-www-form-urlencoded';
        $client = new HttpClient([
            'base_uri' => $this->conf->get('baseUri'),
            'headers' => $headers
        ]);
        $path = $this->conf->get('path');
        $path .= '?'.http_build_query($confArr);
        $requestArgs = ['POST', $path, ['body'=>json_encode($params)]];
        $response = $client->request(...$requestArgs);
        return json_decode($response->getBody()->getContents(), true);
    }
}