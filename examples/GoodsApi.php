<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    GoodsApi.php
 * Created: 2019/11/25 下午8:56
 */

namespace Exp;


/**
 * Class GoodsApi
 * 商品接口
 * @package Exp
 */
class GoodsApi
{
    use TraitTools;

    /**
     * 普通商品上传
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Exception
     */
    public function itemUpload():?array
    {
        $method = 'item.upload';
        $data = [[
            'shop_id' => '10156992',
            'i_id' => '3100890000',
            'shop_i_id' => '3100890000',
            'name' => 'XX测试美瞳品',
            'enabled' => 1,
            'brand_name' => 'XX系列',
            'skus' => [
                [
                    'sku_id' => '310089000X',
                    'shop_sku_id' => '310089000X',
                    'name' => '白木森',
                    'sku_code' => '310089000X001',
                    'item_type' => '成品',
                    'sale_price' => 43.5,
                    'cost_price' => 40,
                    'enabled' => 1
                ],
                [
                    'sku_id' => '310089000Y',
                    'shop_sku_id' => '310089000Y',
                    'name' => '黑爵士',
                    'sku_code' => '310089000Y001',
                    'item_type' => '成品',
                    'sale_price' => 43.5,
                    'cost_price' => 40,
                    'enabled' => 1
                ]
            ]
        ]];
        $tools = $this->sabre($method);
        return $tools->exec($data);
    }

    /**
     * 商品维护上传
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Exception
     */
    public function mallItemUpload():?array
    {
        $method = 'mall.item.upload';
        $data = [
            [
                'c_name' => '牛仔裤',
                'i_id' => '3100890000',
                'sku_id' => '310089000Y',
                'name' => '黑鬼',
                'properties_value' => '水青色;十片'
            ]
        ];
        $tools = $this->sabre($method);
        return $tools->exec($data);
    }

    /**
     * 普通商品查询
     * @param array $skuIdsArr
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Exception
     */
    public function skuQuery(array $skuIdsArr):?array
    {
        $method = 'sku.query';
        $tools = $this->sabre($method);
        return $tools->exec(['sku_ids'=>implode(',', $skuIdsArr)]);
    }

    /**
     * 商品映射查询
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Exception
     */
    public function skuMapQuery():?array
    {
        $method = 'skumap.query';
        $tools = $this->sabre($method);
        return $tools->exec();
    }

    /**
     * 商品类目查询
     * 注意: 好像必须要带个什么参数样, 否则会触发异常
     * @return array|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Exception
     */
    public function categoryQuery():?array
    {
        $method = 'category.query';
        $tools = $this->sabre($method);
        return $tools->exec([
            'modified_begin' => '2018-03-07 16:44:31.290',
            'modified_end' => '2018-03-09 16:48:32.610'
        ]);
    }
}