一个简单的生成token和验证token的类

// 引入token类文件
chdir(__DIR__);
require_once('./token.php');

// 实例化token类
$t = new Token();

// 生成token
echo $t->getToken(11,'zhangsan');

// 验证token
$isLogin = $t->verifyToken('e267ad89a21d1c4ad8cc95f2784d5388.eyJJZCI6MTEsIm5hbWUiOiJ6aGFuZ3NhbiJ9');
if ($isLogin) {
    echo 'YES';
} else {
    echo 'NO';
}

// 从token中获取用户相关的信息
$userInfo = $t->getUserInfoByToken('e267ad89a21d1c4ad8cc95f2784d5388.eyJJZCI6MTEsIm5hbWUiOiJ6aGFuZ3NhbiJ9');
print_r($userInfo);