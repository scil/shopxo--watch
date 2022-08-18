<?php
// +----------------------------------------------------------------------
// | ShopXO 国内领先企业级B2C免费开源电商系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011~2099 http://shopxo.net All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( https://opensource.org/licenses/mit-license.php )
// +----------------------------------------------------------------------
// | Author: Devil
// +----------------------------------------------------------------------
namespace app\admin\controller;

use app\admin\controller\Base;
use app\service\ApiService;
use app\service\ExpressService;
use app\service\ResourcesService;

/**
 * 快递管理
 * @author   Devil
 * @blog     http://gong.gg/
 * @version  0.0.1
 * @datetime 2016-12-01T21:51:08+0800
 */
class Express extends Base
{
	/**
     * 列表
     * @author   Devil
     * @blog     http://gong.gg/
     * @version  0.0.1
     * @datetime 2016-12-06T21:31:53+0800
     */
	public function Index()
	{
		// 模板数据
		$assign = [
			// 静态数据
			'common_is_enable_list'	=> MyConst('common_is_enable_list'),

	        // 编辑器文件存放地址
			'editor_path_type' 		=> ResourcesService::EditorPathTypeValue('express'),
		];
		MyViewAssign($assign);
		return MyView();
	}

	/**
	 * 获取节点子列表
	 * @author   Devil
	 * @blog     http://gong.gg/
	 * @version  0.0.1
	 * @datetime 2016-12-25T15:19:45+0800
	 */
	public function GetNodeSon()
	{
		// 是否ajax请求
		if(!IS_AJAX)
		{
			return $this->error('非法访问');
		}

		// 开始操作
		return ApiService::ApiDataReturn(ExpressService::ExpressNodeSon($this->data_request));
	}

	/**
	 * 保存
	 * @author   Devil
	 * @blog     http://gong.gg/
	 * @version  0.0.1
	 * @datetime 2016-12-25T22:36:12+0800
	 */
	public function Save()
	{
		// 是否ajax请求
		if(!IS_AJAX)
		{
			return $this->error('非法访问');
		}

		// 开始操作
		return ApiService::ApiDataReturn(ExpressService::ExpressSave($this->data_request));
	}

	/**
	 * 删除
	 * @author   Devil
	 * @blog     http://gong.gg/
	 * @version  0.0.1
	 * @datetime 2016-12-25T22:36:12+0800
	 */
	public function Delete()
	{
		// 是否ajax
		if(!IS_AJAX)
		{
			return $this->error('非法访问');
		}

		// 开始操作
		$params = $this->data_post;
		$params['admin'] = $this->admin;
		return ApiService::ApiDataReturn(ExpressService::ExpressDelete($params));
	}
}
?>