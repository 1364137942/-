<?php
/**
 * Created by PhpStorm.
 * User: 子健
 * Date: 2016-6-2
 * Time: 15:39
 */
class Gdufs {
    private $num;
    private $name;
    private $cookie;
    private $content;
    public function __construct($username){
        $dir = dirname(__FILE__).'/cookies';
        if(!is_dir($dir)){
            mkdir($dir);
        }
        $this->cookie = dirname(__FILE__).'/cookies/'.$username.'.txt';
    }

    /**
     * 从返回的内容中提取出cookie
     * @param String $responseHeader
     */
    public function parseHost($url){
        $parttern = '~^(([^:/?#]+):)?(//([^/?#]*))?([^?#]*)(\?([^#]*))?(#(.*))?~i';
        $url = trim($url);
        preg_match($parttern, $url, $match);
        return $match[4];
    }

    /**
     * 验证登录,获取登录状态
     * @param String $url
     * @param Array $field
     */
    public function login($url,$field){
        $param = $this->getParams($field);
        $host = $this->parseHost($url);
        $origin='http://'.$host;
        $this->num = $field['USERNAME'];
        $header = array(
            'POST http://jxgl.gdufs.edu.cn/jsxsd/xk/LoginToXkLdap HTTP/1.1',
            'Host: '.$host,
            'Connection: keep-alive',
            'Content-Length: '.strlen($param),
            'Cache-Control: max-age=0',
            'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
            'Origin: '.$origin,
            'Upgrade-Insecure-Requests: 1',
            'User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.12 Safari/537.31',
            'Content-Type: application/x-www-form-urlencoded',
            'Referer: http://jxgl.gdufs.edu.cn/jsxsd/',
            'Accept-Encoding: gzip,deflate',
            'Accept-Language: zh-CN,zh;q=0.8',
            'Accept-Charset: GBK,utf-8;q=0.7,*;q=0.3'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $this->cookie);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);

        $content = curl_exec($ch);
        curl_close($ch);
        $pattern = '#<div id="Top1_divLoginName" class="Nsb_top_menu_nc" style=".+?">(.+?)</div>#';
        if(preg_match($pattern, $content ,$match)){
            $this->name = explode('(',$match[1])[0];
            return true;
        }
        return false;
    }

    /**
     * 返回登录后获取的用户名及学号
     */
    public function loginResult(){
        $res = Array();
        $res['name'] = $this->name;
        $res['num'] = $this->num;
        return $res;
    }

    function getParams($field){
        $param = '';
        foreach ($field as $key => $value){
            $param .= $key."=".urlencode($value)."&";
        }
        return substr($param, 0,-1);
    }
}
