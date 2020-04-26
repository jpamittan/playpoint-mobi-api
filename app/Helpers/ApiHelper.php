<?php
namespace App\Helpers;

class ApiHelper
{
    static public function call($url, $methode_type, $data = [])
    {
        $url = env("DEFAULT_API_URL") . $url;
        $ch = curl_init();
        $arr = array();
        $headers = array();
        $headers[] = 'Accept: application/json';
        $headers[] = 'Authorization: ' . env("DEFAULT_API_KEY");
        $headers[] = 'Secret: ' . env("DEFAULT_API_SECRET");
        if (env('FAKE_IP')!=null){
            $headers[] = 'userIp: ' . env('FAKE_IP');

        }else{
            $headers[] = 'userIp: ' . $_SERVER['REMOTE_ADDR'];

        }
        //$headers[] = 'userIp: ' . '83.161.132.4'; //$_SERVER['REMOTE_ADDR'];
        if (Session()->has('Bearer')){
            $headers[] = 'Bearer: ' . Session()->get('Bearer');
        }
        switch (strtolower($methode_type)) {
            case 'c' :
            case 'post' :
                $data = (is_array($data)) ? json_encode($data) : $data;
                $data = (is_object($data)) ? json_encode($data) : $data;
                curl_setopt($ch, CURLOPT_POST, true);
                $headers[] = 'Content-Length: ' . strlen($data);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                break;
            case 'r' :
            case 'get' :
                $data = (is_array($data)) ? http_build_query($data, '', '&') : $data;
                $data = (is_object($data)) ? http_build_query($data, '', '&') : $data;
                //die();
                $data = str_replace('%40', '@', $data); /* stupid mediamath.com rest server is not interpreting all encodings */
                $url = $url . '?' . $data;
                break;
            case 'u' :
            case 'put' :
                $data = (is_array($data)) ? json_encode($data) : $data;
                $data = (is_object($data)) ? json_encode($data) : $data;
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
                $headers[] = 'Content-Length: ' . strlen($data);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                break;
            case 'd' :
            case 'delete' :
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
                $url = $url . '?' . $data;
                break;
            default:/* get */
                $url = $url . '?' . $data;
        }

        curl_setopt($ch, CURLOPT_URL, $url);
        if (count($headers) > 0) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        curl_setopt($ch, CURLOPT_HEADER, false /* TRUE to include the header in the output */);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        curl_setopt($ch, CURLOPT_TIMEOUT_MS, 2500);
        $content = curl_exec($ch);
        $response = curl_getinfo($ch);
        curl_close($ch);
        return array(
            'request_headers' =>$headers,
            'http_code' => (string) $response['http_code'],
            'response' =>$response,
            'content' => json_decode($content),
            'content_raw' => $content,
        );


    }

    static private function getKey()
    {
        $server = $_SERVER['SERVER_NAME'];
        $server = "carrush.playpoint.mobi";
        $host = explode(".",$server);
        $lp = strtoupper($host[0]);
        return env("{$lp}_API_KEY",env("DEFAULT_API_KEY"));
    }

    static private function getSecret()
    {
        $server = $_SERVER['SERVER_NAME'];
        $server = "carrush.playpoint.mobi";
        $host = explode(".",$server);
        $lp = strtoupper($host[0]);
        return env("{$lp}_API_SECRET",env("DEFAULT_API_SECRET"));
    }
}