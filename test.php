<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    test.php
 * Created: 2019/11/25 下午8:49
 */

use Exp\BasicApi;
use Exp\GoodsApi;

require_once './vendor/autoload.php';

$basic = new BasicApi();
//var_dump($basic->shopQuery(['微合伙人1']));
//var_dump($basic->logisticsCompanyQuery());
//var_dump($basic->wmsPartnerQuery());
//var_dump($basic->authShopGenerateQuery());
//var_dump($basic->refreshToken());

$goods = new GoodsApi();
//var_dump($goods->itemUpload());
//var_dump($goods->mallItemUpload());
//var_dump($goods->skuQuery(['310089000Y']));
//var_dump($goods->skuMapQuery());
//var_dump($goods->categoryQuery());