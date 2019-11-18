<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    Conf.php
 * Created: 2019/11/18 下午10:56
 */

namespace JuShuiTan;


class Conf
{
    private $isDebug = true;
    private $baseUri = 'http://open.erp321.com';
    private $debugBaseUri = 'http://c.jushuitan.com';
    private $path = '/api/open/query.aspx';
    private $confArr = [
        'partnerId' => '',
        'partnerKey' => '',
        'token' => '',
        'method' => '',
        'ts' => 0,
        'sign' => ''
    ];

    private $makeSignWithoutIdx = [
        'partnerId' => '',
        'partnerKey' => '',
        'sign' => '',
        'method' => ''
    ];

    private $debugConf = [
        'partnerId' => 'ywv5jGT8ge6Pvlq3FZSPol345asd',
        'partnerKey' => 'ywv5jGT8ge6Pvlq3FZSPol2323',
        'token' => '181ee8952a88f5a57db52587472c3798',
    ];


    /**
     * Conf constructor.
     * @param array $confArr
     * @param bool $isDebug
     */
    public function __construct(array $confArr, bool $isDebug)
    {
        $this->isDebug = $isDebug;
        if ($this->isDebug) {
            $this->setConf($this->debugConf);
            $this->baseUri = $this->debugBaseUri;
        } else {
            $this->setConf($confArr);
        }
    }

    /**
     * 批量设置参数
     * @param array $confArr
     */
    public function setConf(array $confArr):void
    {
        foreach ($confArr as $k => $v) {
            if (isset($this->confArr[$k])) $this->confArr[$k] = $v;
        }
        $this->confArr['ts'] = time();
    }

    /**
     * 获取参数
     * @param string $name
     * @return string
     */
    public function get(string $name):string
    {
        return $this->$name ?? '';
    }

    /**
     * 检测参数有效性
     * @throws \Exception
     */
    public function checkConf():void
    {
        foreach ($this->confArr as $k => $v) {
            if (!$v) throw new \Exception('无效参数: '.$k);
        }
    }

    /**
     * 生成签名
     */
    public function makeSign():void
    {
        $str = '';
        foreach ($this->confArr as $k => $v) {
            if (!in_array($k, $this->makeSignWithoutIdx)) {
                $str .= strtolower($k).$v;
            }
        }
        $this->confArr['sign'] = MD5($this->confArr['method'].$this->confArr['partnerId'].$str.$this->confArr['partnerKey']);
    }
}