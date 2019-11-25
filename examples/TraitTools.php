<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    TraitTools.php
 * Created: 2019/11/25 下午8:25
 */

namespace Exp;
use JuShuiTan\Conf;
use JuShuiTan\Tools;

trait TraitTools
{
    /**
     * @param string $method
     * @return Tools|null
     * @throws \Exception
     */
    protected function sabre(string $method):?Tools
    {
        return new Tools(new Conf(['method'=>$method], true));
    }
}