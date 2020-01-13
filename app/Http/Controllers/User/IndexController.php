<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CommonModel;

class IndexController extends Controller
{
     // 注册
	 public function reg()
    {
        $reg_info = [
            'name'  => 'zhangsan2',         // 用户名
            'email' => 'zhangsan2@qq.com',
            'mobile'    => '13312344356221',
            'pass1'     => '1234567',
            'pass2'     => '1234567',
        ];
        //echo __METHOD__;die;
        //请求passport 注册接口
        $url = 'http://passport.1905.com/api/user/reg';
        
		$response = CommonModel::curlPost($url,$reg_info);
		
		echo '<pre>';print_r($response);echo '</pre>';
    }
	
	 public function login()
    {
        $reg_info = [
            'name'  => 'zhangsan',        // 用户名
            'pass' => '123456',
        ];

        //请求passport 登录接口
        $url = 'http://passport.1905.com/api/user/login';
        
		$response = CommonModel::curlPost($url,$reg_info);
		
		echo '<pre>';print_r($response);echo '</pre>';
    }
	
	public function getData()
	{
		$token = '6f08d8ef4d539d8fd054';
		$uid = 1;
		// 请求passport 获取数据接口
		$url = 'http://passport.1905.com/api/show/time';
		$header = [
			'token:'.$token,
			'uid:'.$uid
		];
		$response = CommonModel::curlGet($url,$header);
		
	}
}
