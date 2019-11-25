<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    BasicApi.php
 * Created: 2019/11/25 下午8:26
 */

namespace Exp;

class BasicApi
{
    use TraitTools;

    /**
     * 店铺查询
     * @param array $shopNicks
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Exception
     */
    public function shopQuery(array $shopNicks):?array
    {
        $method = 'shops.query';
        $tools = $this->sabre($method);
        return $tools->exec(['nicks' => array_values($shopNicks)]);
    }


    /**
     * 物流公司查询
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Exception
     */
    public function logisticsCompanyQuery():?array
    {
        $method = 'logisticscompany.query';
        $tools = $this->sabre($method);
        return $tools->exec();
    }

    /**
     * 分仓查询
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Exception
     */
    public function wmsPartnerQuery():?array
    {
        $method = 'wms.partner.query';
        $tools = $this->sabre($method);
        return $tools->exec();
    }

    /**
     * 获取淘宝授权地址
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Exception
     */
    public function authShopGenerateQuery():?array
    {
        $method = 'auth.shop.generate.query';
        $tools = $this->sabre($method);
        return $tools->exec();
    }

    /**
     * 刷新TOKEN
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Exception
     */
    public function refreshToken():?array
    {
        $method = 'refresh.token';
        $tools = $this->sabre($method);
        return $tools->exec();
    }
}