# base62
base62加密解密

## 安装

添加到你的composer.json文件

```
"chenkby/base62": "*"
```

## 使用

##### 加密
```php
$code = Base62::encode('待解密文字')
```

###### 解密
```php
$string = Base62::decode($code);
```
