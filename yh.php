<?php
//header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Headers: Content-Type");
//header('Content-Type: application/json');
set_time_limit(0);
error_reporting(0);
function fetch_value($str, $find_start = '', $find_end = '')
{
    if ($find_start == '')
    {
        return '';
    }
    $start = strpos($str, $find_start);
    if ($start === false)
    {
        return '';
    }
    $length = strlen($find_start);
    $substr = substr($str, $start + $length);
    if ($find_end == '')
    {
        return $substr;
    }
    $end = strpos($substr, $find_end);
    if ($end === false)
    {
        return $substr;
    }
    return substr($substr, 0, $end);
}

function getyp($url)
{ 
	
	
global $session; 
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL,$url); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array("REMOTE_ADDR: ".fakeip(),"X-Client-IP: ".fakeip(),"Client-IP: ".fakeip(),"HTTP_X_FORWARDED_FOR: ".fakeip(),"X-Forwarded-For: ".fakeip())); 
if($args) 
{ 
curl_setopt($ch, CURLOPT_POST, 1); 
curl_setopt($ch, CURLOPT_POSTFIELDS,$args); 
} 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
//curl_setopt($ch, CURLOPT_PROXY, "127.0.0.1:8888"); 
$xx = curl_exec ($ch); 
curl_close ($ch); 
	/*$url = urldecode($url);
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/5.0 (Linux; Android 4.4.2; en-us; SAMSUNG SM-G900T Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Version/1.6 Chrome/28.0.1500.94 Mobile Safari/537.36");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_URL, $url);
    $xx = curl_exec($ch);
    curl_close($ch);
    unset($ch);*/
$data = json_decode($xx,true);
if (strpos($url,'youporn')) {
	$videos			=	$data[video];
	//echo "yp".$count($videos);
} else if (strpos($url,'ornhub')) 
{
		$videos			=	$data[videos];
		//echo "ph".$count($videos);
}
$relatixx  = array();
foreach ((array)$videos as $video_obj)
              {
			  $tit = str_replace("'","-",$video_obj[title]);
			 
              $thumi["src"] = $video_obj[thumb];
			  $thumi["type"] = "image/jpg";
			  $thumi["alt"] = $tit;
			  $source["src"] = "https://theyouheroppa.herokuapp.com/api/play?url=$video_obj[url]";
			  $source["type"] = "video/mp4";
					$sources = array(
					"name" => $tit,
					"description" => $tit,
					"idx" => $video_obj[video_id],
					"duration" => $video_obj[duration],
					"poster" => $video_obj[thumb],
						"thumbnail" => array($thumi,),
						"sources" => array($source,)
					);
array_push($relatixx, $sources);

	}
$relat = json_encode($relatixx);
    /*if (fetch_value($xx,"html5player.setVideoUrlHigh('","');")!="") {*/
        $result['error'] = 0;
        $result['mp4low'] =  "https://theyouheroppa.herokuapp.com/api/play?url=$video_obj[url]";
        $result['mp4high'] = "https://theyouheroppa.herokuapp.com/api/play?url=$video_obj[url]";
        $result['image'] = $videos[0][thumb];
        $result['title'] = $videos[0][title];
  
    return json_encode($relatixx);
}

	function fakeip()  
{  
	//echo long2ip( mt_rand(0, 65537) * mt_rand(0, 65535) ).'</br>';
return long2ip( mt_rand(0, 65537) * mt_rand(0, 65535) );   
}  
function getrd($url,$args=false) 
{
	
global $session; 
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL,$url); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array("REMOTE_ADDR: ".fakeip(),"X-Client-IP: ".fakeip(),"Client-IP: ".fakeip(),"HTTP_X_FORWARDED_FOR: ".fakeip(),"X-Forwarded-For: ".fakeip())); 
if($args) 
{ 
curl_setopt($ch, CURLOPT_POST, 1); 
curl_setopt($ch, CURLOPT_POSTFIELDS,$args); 
} 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
//curl_setopt($ch, CURLOPT_PROXY, "127.0.0.1:8888"); 
$xx = curl_exec ($ch); 
curl_close ($ch); 
	/*$relatixx  = array();
	$url = urldecode($url);
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/5.0 (Linux; Android 4.4.2; en-us; SAMSUNG SM-G900T Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Version/1.6 Chrome/28.0.1500.94 Mobile Safari/537.36");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_URL, $url);
    $xx = curl_exec($ch);
    curl_close($ch);
    unset($ch);*/
$data = json_decode($xx,true);
	$videos =$data[videos];
	 $total=count($videos);
             $Str='<h1>Total : '.$total.'</h1>';
	/*
if (strpos($url,'youporn')) {
	$videos			=	$data[video];
	//echo "yp".$count($videos);
} else if (strpos($url,'ornhub')) 
{
		$videos			=	$data[videos];
		//echo "ph".$count($videos);
}*/
$relatixx  = array();
foreach ($videos as $video_obj)
              {
			  $tit = str_replace("'","-",$video_obj[video][title]);
			 
              $thumi["src"] = $video_obj[video][thumb];
			  $thumi["type"] = "image/jpg";
			  $thumi["alt"] = $tit;
			  $source["src"] = "https://theyouheroppa.herokuapp.com/api/play?url=".$video_obj[video][url];
			  $source["type"] = "video/mp4";
					$sources = array(
					"name" => $tit,
					"description" => $tit,
					"duration" => $video_obj[video][duration],
					"poster" => $video_obj[video][thumb],
						"thumbnail" => array($thumi,),
						"sources" => array($source,)
					);
array_push($relatixx, $sources);

	}
$relat = json_encode($relatixx);
    /*if (fetch_value($xx,"html5player.setVideoUrlHigh('","');")!="") {*/
        $result['error'] = 0;
        $result['mp4low'] =  "https://theyouheroppa.herokuapp.com/api/play?url=$video_obj[video][url]";
        $result['mp4high'] = "https://theyouheroppa.herokuapp.com/api/play?url=$video_obj[video][url]";
        $result['image'] = $videos[video][thumb];
        $result['title'] = $videos[video][title];
  
    return json_encode($relatixx);
}
function getph($url,$args=false) 
{
	
global $session; 
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL,$url); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array("REMOTE_ADDR: ".fakeip(),"X-Client-IP: ".fakeip(),"Client-IP: ".fakeip(),"HTTP_X_FORWARDED_FOR: ".fakeip(),"X-Forwarded-For: ".fakeip())); 
if($args) 
{ 
curl_setopt($ch, CURLOPT_POST, 1); 
curl_setopt($ch, CURLOPT_POSTFIELDS,$args); 
} 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
//curl_setopt($ch, CURLOPT_PROXY, "127.0.0.1:8888"); 
$xx = curl_exec ($ch); 
curl_close ($ch); 
	/*$relatixx  = array();
	$url = urldecode($url);
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/5.0 (Linux; Android 4.4.2; en-us; SAMSUNG SM-G900T Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Version/1.6 Chrome/28.0.1500.94 Mobile Safari/537.36");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_URL, $url);
    $xx = curl_exec($ch);
    curl_close($ch);
    unset($ch);*/
$data = json_decode($xx,true);
	$videos =$data[videos];
	 $total=count($videos);
             $Str='<h1>Total : '.$total.'</h1>';
	/*
if (strpos($url,'youporn')) {
	$videos			=	$data[video];
	//echo "yp".$count($videos);
} else if (strpos($url,'ornhub')) 
{
		$videos			=	$data[videos];
		//echo "ph".$count($videos);
}*/
$relatixx  = array();
foreach ((array)$videos as $video_obj)
              {
			  $tit = str_replace("'","-",$video_obj[title]);
			 
              $thumi["src"] = $video_obj[thumb];
			  $thumi["type"] = "image/jpg";
			  $thumi["alt"] = $tit;
			  $source["src"] = "https://theyouheroppa.herokuapp.com/api/play?url=$video_obj[url]";
			  $source["type"] = "video/mp4";
					$sources = array(
					"name" => $tit,
					"description" => $tit,
					"idx" => $video_obj[video_id],
					"duration" => $video_obj[duration],
					"poster" => $video_obj[thumb],
						"thumbnail" => array($thumi,),
						"sources" => array($source,)
					);
array_push($relatixx, $sources);

	}
$relat = json_encode($relatixx);
    /*if (fetch_value($xx,"html5player.setVideoUrlHigh('","');")!="") {*/
        $result['error'] = 0;
        $result['mp4low'] =  "https://theyouheroppa.herokuapp.com/api/play?url=$video_obj[url]";
        $result['mp4high'] = "https://theyouheroppa.herokuapp.com/api/play?url=$video_obj[url]";
        $result['image'] = $videos[0][thumb];
        $result['title'] = $videos[0][title];
  
    return $relatixx;
}
function getXvideo($url)
{
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/5.0 (Linux; Android 4.4.2; en-us; SAMSUNG SM-G900T Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Version/1.6 Chrome/28.0.1500.94 Mobile Safari/537.36");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_URL, $url);
    $xx = curl_exec($ch);
    curl_close($ch);
    unset($ch);



    if (fetch_value($xx,"html5player.setVideoUrlHigh('","');")!="") {
        $result['error'] = 0;
        $result['mp4low'] =  fetch_value($xx,"html5player.setVideoUrlLow('","');");
        $result['mp4high'] = fetch_value($xx,"html5player.setVideoUrlHigh('","');");
        $result['image'] = fetch_value($xx,"html5player.setThumbUrl('","');");
        $result['title'] = fetch_value($xx,"html5player.setVideoTitle('","');");
    } else {
        $result['error'] = 2;
        $result['msg']   = 'Có lỗi xảy ra !! Thử lại sau nhé !';
    }
    return json_encode($result);
}
if(isset($_GET['url'])&&strstr($_GET['url'],'xvideos.com')!=null)
{
    $url = $_GET['url'];
	
	
header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');

    echo getXvideo($url);
} else if(isset($_GET['url'])&&strstr($_GET['url'],'youporn')!=null)
{
	
    $url = $_GET['url'];
header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');
//echo $url;
    echo getyp($url);
}
else if(isset($_GET['uhx'])&&strstr($_GET['uhx'],'yp')!=null)
{
    $uhx = $_SERVER["REQUEST_URI"];
	 $url= str_replace("/yh.php?uhx=yp&", "https://www.youporn.com/api/webmasters/search/?", $uhx);
header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');

//echo $url;
    echo getyp($url);
	//echo $Str;
}
else if(isset($_GET['url'])&&strstr($_GET['url'],'pornhub')!=null)
{
    $url = $_GET['url'];
	
header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');


//echo $url.'<url>ulx'.$uhx.'$_SERVER["REQUEST_URI"]'.$_SERVER["REQUEST_URI"];
    echo json_encode(getph($url));
	//echo $Str;
}
else if(isset($_GET['uhx'])&&strstr($_GET['uhx'],'ph')!=null)
{
    $uhx = $_SERVER["REQUEST_URI"];//$_GET['uhx'];
	 $url= str_replace("/yh.php?uhx=ph&", "https://www.pornhub.com/webmasters/search?", $uhx);
	$string = $_SERVER["REQUEST_URI"];
	$substring ='?';
	$lastIndex = strripos($string, $substring);
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');


//echo $url.'<url>ulx'.$uhx.'$_SERVER["REQUEST_URI"]'.$_SERVER["REQUEST_URI"];
    echo json_encode(getph($url));
	//echo $Str;
}
else if(isset($_GET['url'])&&strstr($_GET['url'],'redtube')!=null)
{
    $url = $_GET['url'];
	
header("Access-Control-Allow-Origin: *");


    echo getrd($url);
	//echo $Str;
}
else if(isset($_GET['uhx'])&&strstr($_GET['uhx'],'rd')!=null)
{
	//$url = ;
   $uhx = $_SERVER["REQUEST_URI"];
 $url= str_replace("/yh.php?uhx=rd&", "https://api.redtube.com/?data=redtube.Videos.searchVideos&output=json&", $uhx);
	//$string = 'This is a string';
//$substring ='search';
//$firstIndex = stripos($string, $substring);
//$url = "https://api.redtube.com/?data=redtube.Videos.searchVideos&output=json&'.;
//$lastIndex = strripos($string, $substring);

header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');

//echo $url.'<url>ulx'.$uhx;
    echo getrd($url);
	//echo $Str;
}
/*
if (strpos($url,'youporn')) {
	$videos			=	$data[video];
	//echo "yp".$count($videos);
} else if (strpos($url,'ornhub')) 
{
		$videos			=	$data[videos];
		//echo "ph".$count($videos);
}*/
?>