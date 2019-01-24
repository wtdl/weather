<?php
/**
 * 深圳网通动力网络技术有限公司
 * Site: www.30099.cn
 * User: pengjian(szpengjian@gmail.com)
 * Date: 19-1-24
 */

$data = require_once '../src/data.php';
if (in_array('安仁',$data)){
    $new = array_flip($data);
    $result = json_decode(file_get_contents('http://t.weather.sojson.com/api/weather/city/'.$new['安仁']),true);
    $arr = [];
    $arr[0]['date'] = $result['data']['yesterday']['date'];
    $arr[0]['sunrise'] = $result['data']['yesterday']['sunrise'];
    $arr[0]['high'] = $result['data']['yesterday']['high'];
    $arr[0]['low'] = $result['data']['yesterday']['low'];
    $arr[0]['aqi'] = $result['data']['yesterday']['aqi'];
    $arr[0]['ymd'] = $result['data']['yesterday']['ymd'];
    $arr[0]['week'] = $result['data']['yesterday']['week'];
    $arr[0]['fx'] = $result['data']['yesterday']['fx'];
    $arr[0]['fl'] = $result['data']['yesterday']['fl'];
    $arr[0]['type'] = $result['data']['yesterday']['type'];
    $arr[0]['notice'] = $result['data']['yesterday']['notice'];
    foreach ($result['data']['forecast'] as $key => $val){
        $key++;
        $arr[$key]['date'] = $val['date'];
        $arr[$key]['sunrise'] = $val['sunrise'];
        $arr[$key]['high'] = $val['high'];
        $arr[$key]['low'] = $val['low'];
        $arr[$key]['aqi'] = $val['aqi'];
        $arr[$key]['ymd'] = $val['ymd'];
        $arr[$key]['week'] = $val['week'];
        $arr[$key]['fx'] = $val['fx'];
        $arr[$key]['fl'] = $val['fl'];
        $arr[$key]['type'] = $val['type'];
        $arr[$key]['notice'] = $val['notice'];
    }
    $content = '';
    foreach ($arr as $key => $value){
        $content.=$value['ymd']."\n";
        $content.=$value['sunrise']."\n";
        $content.=$value['high']."\n";
        $content.=$value['low']."\n";
        $content.=$value['week']."\n";
        $content.=$value['fx']."\n";
        $content.=$value['fl']."\n";
        $content.=$value['type']."\n";
        $content.=$value['notice']."\n";
    }
    return $content;
}
