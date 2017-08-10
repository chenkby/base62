<?php
/**
 * @link https://github.com/chenkby/base62
 * @copyright Copyright (c) 2017 Chen GuanQun
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace chenkby;

/**
 * Base62 加密/解密
 * Base62::encode('string');
 * Base62::decode('string');
 *
 * @author Chen GuanQun <99912250@qq.com>
 */
class Base62
{
    const KEY = "vPh7zZwA2LyU4bGq5tcVfIMxJi6XaSoK9CNp0OWljYTHQ8REnmu31BrdgeDkFs";

    /**
     * 安全码
     */
    const SECRET = 'Hw';

    /**
     * Base62加密
     * @param $string
     * @return string
     */
    public static function encode($string)
    {
        $string .= self::SECRET;
        $out = '';
        for ($t = floor(log10($string) / log10(62)); $t >= 0; $t--) {
            $a = floor($string / pow(62, $t));
            $out = $out . substr(self::KEY, $a, 1);
            $string = $string - ($a * pow(62, $t));
        }
        return $out;
    }

    /**
     * Base62 解密
     * @param $string
     * @return string
     */
    public static function decode($string)
    {
        $out = 0;
        $len = strlen($string) - 1;
        for ($t = 0; $t <= $len; $t++) {
            $out = $out + strpos(self::KEY, substr($string, $t, 1)) * pow(62, $len - $t);
        }
        return str_replace(self::SECRET, '', substr(sprintf("%f", $out), 0, -7));
    }
}