<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-10-19
 * Time: 15:44
 */

namespace App\Extensions;

use GuzzleHttp;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

/**
 * 请求工具类
 */
class GLib
{
    protected $client;

    public function __construct(GuzzleHttp\Client $Client)
    {
        $this->client = $Client;
    }

    public function GetObj(string $str, bool $isArray = false)
    {
        //dd($str);
        $encode = mb_detect_encoding($str, array(
            "ASCII",
            "UTF-8",
            "GB2312",
            "GBK",
            "BIG5"
        ));
        $json = iconv($encode, "UTF-8", $str);
        $jsonArr = json_decode($json, $isArray);
        if (json_last_error() == 4) {
            $_json = htmlspecialchars_decode($json);
            $_json = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $_json);
            $jsonArr = json_decode($_json, $isArray);
        }
        return $jsonArr;
    }

    /**
     * @throws GuzzleException
     */
    public function GetDate($url, $body, $method = "get", $headers = array('User-Agent' => 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:23.0)'), $type = "query", $timeout = 10): ResponseInterface
    {

        $option = [
            'verify' => false,
            $type => $body,
            'timeout' => $timeout
        ];
        if (!array_key_exists('User-Agent', $headers)) {
            $headers['User-Agent'] = "Mozilla/5.0 (iPhone; CPU iPhone OS 13_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148";
        }
        $option['headers'] = $headers;//dd($method,$url,$option);


        $res = $this->client->request($method, $url, $option);

        return $res;
    }

    public function GetJson($url, $body, $method = "get", $type = "query", $headers = array('User-Agent' => 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:23.0)'))
    {
        $res = $this->GetDate($url, $body, $method, $headers, $type)->getBody();
        return $this->GetObj($res);
    }

    /**
     * @param $url
     * @param $body
     * @param string $method
     * @param string $type 'query'|'form_params'|'json'
     * @param array $headers
     * @param int $timeout
     * @return mixed|null
     * @throws GuzzleException
     */
    public function GetJsonArray($url, $body, string $method = "get", string $type = "query", array $headers = array('User-Agent' => 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:23.0)'), int $timeout = 10)
    {
        $res = $this->GetDate($url, $body, $method, $headers, $type, $timeout)->getBody();
        return $this->GetObj($res, true);
    }
}
