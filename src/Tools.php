<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    Tools.php
 * Created: 2019/11/18 下午4:57
 */

namespace JuShuiTan;


use GuzzleHttp\Client as HttpClient;

class Tools
{
    private $conf = null;

    public function __construct(Conf $conf)
    {
        if (!$conf instanceof Conf) $this->conf = $conf;
    }

    /**
     * 执行请求
     * @param array|null $params
     * @param string $method
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function exec(?array $params = null, string $method = 'POST')
    {
        $client = new HttpClient([
            'base_uri' => $this->conf->get('baseUri'),
            'headers' => $this->conf->get('confArr')
        ]);
        $path = $this->conf->get('path');
        if ($method === 'GET') {
            $path .= '?'.http_build_query($params);
            $params = null;
        }
        return $client->request($method, $path, ['body' => $params]);
    }
}