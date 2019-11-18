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
        if (!$conf instanceof Conf) $this->conf = $conf;
        $this->conf->checkConf();
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
        $requestArgs = [$method, $path, ['body'=>$params]];
        if ($method === 'GET') {
            $path .= '?'.http_build_query($params);
            $requestArgs[1] = $path;
            unset($requestArgs[2]);
        }
        $response = $client->request(...$requestArgs);
        return $response->getBody();
    }
}