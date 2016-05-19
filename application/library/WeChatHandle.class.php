<?php

/**
 * MiniCMS 
 *
 * @package		MiniCMS 
 * @author		狂奔的蜗牛
 * @email		672308444@163.com
 * @copyright	        Copyright (c) 2013 - 2014, 狂奔的蜗牛, Inc.
 * @link		https://git.oschina.net/snail/microphp/
 * @since		Version 1.0
 * @createdtime         2014-4-6 16:52:06
 */

/**
 * Description of WeChatHandle
 *
 * @author pm
 */
interface WeChatHandle {
    /*     * weixin
     * 用户关注时触发，用于子类重写
     *
     * @return void
     */

    public function onSubscribe(Wechat $chat);

    /**
     * 用户取消关注时触发，用于子类重写
     *
     * @return void
     */
    public function onUnsubscribe(Wechat $chat);

    /**
     * 收到文本消息时触发
     *
     * @return void
     */
    public function onText(Wechat $chat);

    /**
     * 收到图片消息时触发
     *
     * @return void
     */
    public function onImage(Wechat $chat);

    /**
     * 收到地理位置消息时触发
     *
     * @return void
     */
    public function onLocation(Wechat $chat);

    /**
     * 收到链接消息时触发
     *
     * @return void
     */
    public function onLink(Wechat $chat);

    /**
     * 收到自定义菜单消息时触发
     *
     * @return void
     */
    public function onClick(Wechat $chat);

    /**
     * 收到地理位置事件消息时触发
     *
     * @return void
     */
    public function onEventLocation(Wechat $chat);

    /**
     * 收到语音消息时触发
     *
     * @return void
     */
    public function onVoice(Wechat $chat);

    /**
     * 扫描二维码时触发
     *
     * @return void
     */
    public function onScan(Wechat $chat);

    /**
     * 收到未知类型消息时触发
     *
     * @return void
     */
    public function onUnknown(Wechat $chat);
}
