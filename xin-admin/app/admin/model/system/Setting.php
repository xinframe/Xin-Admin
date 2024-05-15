<?php
// +----------------------------------------------------------------------
// | XinAdmin [ A Full stack framework ]
// +----------------------------------------------------------------------
// | Copyright (c) 2023~2024 http://xinadmin.cn All rights reserved.
// +----------------------------------------------------------------------
// | Apache License ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小刘同学 <2302563948@qq.com>
// +----------------------------------------------------------------------
namespace app\admin\model\system;

use app\common\model\BaseModel;

class Setting extends BaseModel
{

    public function getOptionsAttr($value)
    {
        $data = [];
        $value = explode("\n",$value);
        foreach ($value as $item) {
            $item = explode('=',$item);
            if(count($item) < 2) {
                continue;
            }
            $data[] = [
                'label' => $item[0],
                'value' => $item[1]
            ];
        }
        return $data;
    }

    public function getPropsAttr($value)
    {
        $data = [];
        $value = explode("\n",$value);
        foreach ($value as $item) {
            $item = explode('=',$item);
            if(count($item) < 2) {
                continue;
            }
            if($item[1] === 'false') {
                $data[$item[0]] = false;
            }elseif ($item[1] === 'true') {
                $data[$item[0]] = true;
            }else {
                $data[$item[0]] = $item[1];
            }
        }
        return $data;
    }

    public function getDefaultDataAttr($value,$data)
    {
        return $data;
    }


}