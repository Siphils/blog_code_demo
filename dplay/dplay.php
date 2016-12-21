<?php 
$id=$_GET['id'];
$type=$_GET['t'];
if($type=='mp3'){
	$con=curl('http://music.163.com/api/song/detail/?id='.$id.'&ids=['.$id.']'); 
	$json=json_decode($con,true);
	$audio=$json['songs']['0']['mp3Url'];
	header('Content-Type:application/force-download');
	header("Location:".$audio);
}elseif($type=='lrc'){
	echo curl('http://music.163.com/api/song/lyric?os=pc&id='.$id.'&lv=-1&kv=-1&tv=-1');
}else{
	echo '请求的参数不正确！';
}
function curl($url){
	$curl = curl_init();
	curl_setopt($curl,CURLOPT_URL,$url);
	curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($curl,CURLOPT_CONNECTTIMEOUT,10);
	curl_setopt ($curl, CURLOPT_REFERER, "http://music.163.com/");
	curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_0 like Mac OS X; en-us) AppleWebKit/532.9 (KHTML, like Gecko) Version/4.0.5 Mobile/8A293 Safari/6531.22.7");
	$src = curl_exec($curl);
	curl_close($curl);    
	return $src;
}
?>