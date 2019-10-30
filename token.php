<?php
class Token{
    // 生成token的key ->很关键，只能自己知道哦
    private static $key = 'www.w3hmoob.top';

    // 生成token
    function getToken($userId, $userName){
        $userInfo['Id'] = $userId;
        $userInfo['name'] = $userName;
        return md5(sha1(self::$key.$userId)).'.'. base64_encode(json_encode($userInfo));
    }

    // 验证token
    function verifyToken($token){
        $userInfo = json_decode(base64_decode(explode('.', $token)[1]),true);
        if(md5(sha1(self::$key.$userInfo['Id']))===explode('.',$token)[0]){
            return true;
        }
        return false;
    }

    // 从token中获取用户信息，token中用户信息是透明的，不要保存敏感信息哦！
    function getUserInfoByToken($token){
        return json_decode(base64_decode(explode('.', $token)[1]), true);
    }

}
?>