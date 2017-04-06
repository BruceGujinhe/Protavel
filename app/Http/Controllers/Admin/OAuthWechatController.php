<?php

namespace App\Http\Controllers\Admin;

use EasyWeChat\Foundation\Application;
use App\Http\Controllers\Controller;

class OAuthWechatController extends Controller
{
    public function getIndex() {
        $options = [
            'debug'  => true,
            'app_id' => 'wx046689c0f28fb833',
            'secret' => 'b4bd5d95008b7503a34efaac3d2635a2',
            'token'  => 'protavel',
            'oauth'  => [
                'scopes'   => ['snsapi_userinfo'],
                'callback' => url('/admin/oauth/wechat/callback'),
            ],
        ];
        $app     = new Application($options);
        $oauth   = $app->oauth;

        $_SESSION['oauth_wechat_callback_target_url'] = 'example.com';

        return $oauth->redirect();
    }

    public function getCallback() {
        $options = [
            'debug'  => true,
            'app_id' => 'wx046689c0f28fb833',
            'secret' => 'b4bd5d95008b7503a34efaac3d2635a2',
            'token'  => 'protavel',
            'oauth'  => [
                'scopes'   => ['snsapi_userinfo'],
                'callback' => url('/admin/oauth/wechat/callback'),
            ],
        ];
        $app     = new Application($options);
        $oauth   = $app->oauth;
        // 获取 OAuth 授权结果用户信息
        $user = $oauth->user();

        // TODO 写表

        $target_url = $_SESSION['target_url'] || '/';
        $target_url .= '?token=exp_id';

        return redirect($target_url);
    }

    public function getValid() {
        $options  = [
            'debug'  => true,
            'app_id' => 'wx046689c0f28fb833',
            'secret' => 'b4bd5d95008b7503a34efaac3d2635a2',
            'token'  => 'protavel',
            'oauth'  => [
                'scopes'   => ['snsapi_userinfo'],
                'callback' => url('/admin/oauth/wechat/callback'),
            ],
        ];
        $app      = new Application($options);
        $response = $app->server->serve();

        return $response;
    }
}
