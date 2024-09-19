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
namespace app\common\enum\ApiEnum;

/**
 * 响应状态枚举类
 */
enum ShowType: int
{
    // 成功响应
    case SUCCESS_MESSAGE = 0;

    // 警告响应
    case WARN_MESSAGE = 1;

    // 错误响应
    case ERROR_MESSAGE = 2;

    // 成功通知
    case SUCCESS_NOTIFICATION = 3;

    // 警告通知
    case WARN_NOTIFICATION = 4;

    // 错误通知
    case ERROR_NOTIFICATION = 5;

    // 静默响应
    case SILENT = 99;
}
