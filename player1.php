<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
include 'xv/url/website_parser.php';
include 'simple_html_dom.php';
function paras()
	{
		if(!empty($_SERVER['REQUEST_URI'])) {
		$url2 = 'https://www.youporn.com'.$_SERVER['REQUEST_URI'];
		}else {
	$url2 = 'https://www.youporn.com/watch/13962811/amateur-anal-orgasm-for-a-first-timer-jenny-manson/';
		}
$parser = new WebsiteParser($url2);


//$parser = new WebsiteParser('https://www.youporn.com/watch/14328229/pussy-play/');

//Get all hyper links
$links = $parser->getHrefLinks();

//Get all image sources
$images = $parser->getImageSources();

$videos = $parser->getvideoo();
$mettg = $parser->getMetaTags();
$tit = $parser->getTitle();
/*echo "<pre>";
print_r($videos);
echo "</pre>";
echo "<br />";
echo "<pre>";
print_r($links);
echo "</pre>";
echo "<br />";
echo "<pre>";
print_r($images);
echo "</pre>";
echo "<br />";
echo "<pre>";
$videosx = json_encode($videos);
echo "</pre>";*/
}
//$urlv = (!empty($_GET["$urlx"])) ? $_GET["$urlx"] :  'https://www.youporn.com/watch/13182697/dagfs-solo-strip-from-nikki-the-witch-for-halloween/';//'https://www.youporn.com/watch/14028023/wetandpuffy-double-penetration-toying-for-gorgeous-brunette-ann-o-fee/';
if (strpos($_SERVER['REQUEST_URI'],'watch')) {
//if(!empty($_GET["urlx"])) {
	$urlv = 'https://www.youporn.com'.$_SERVER['REQUEST_URI'];
		}else {
		$urlv = 'https://www.youporn.com/watch/13182697/dagfs-solo-strip-from-nikki-the-witch-for-halloween/';//'https://www.youporn.com/watch/14028023/wetandpuffy-double-penetration-toying-for-gorgeous-brunette-ann-o-fee/';
		}
$opts = array('http' =>
    array(
        'header'  => 'User-agent: Mozilla/5.0 (iPhone; U; CPU like Mac OS X; en) AppleWebKit/420.1 (KHTML, like Gecko) Version/3.0 Mobile/3B48b Safari/419.3',
    )
);

$context  = stream_context_create($opts);
$sousv = array();
$result = file_get_contents($urlv, false, $context);

$pattern = "/((\"|')(http|www).+?(\.mp4\?(.*?)\w+|\.mp4.+)('|\"))/i";//Padrão a ser encontrado na string $value
function get_html_title($html){
    preg_match("/\<title.*\>(.*)\<\/title\>/isU", $html, $matches);
    return $matches[1];
}
function get_html_img($html){
    preg_match('/og:image.*\"(.*)\/\>/isU', $html, $matches);
    return $matches[1];
}
if (preg_match_all($pattern, $result, $matches)) {
//echo "<pre id='outv' style='word-wrap: break-word; white-space: pre-wrap;'>";  
  foreach ($matches[0] as $matche) {
  $matche = stripslashes($matche);
     if (strpos($matche,'240p') || strpos($matche,'/videos/3gp/7/2/')) {				
     $sousv["240p"] = $matche;
	} else if (strpos($matche,'480p') && !strpos($matche,'\/')|| strpos($matche,'/videos/mp4/7/2/')) {				
	  $sousv["480p"] = $matche;
	} else if (strpos($matche,'720p')) {				
 $sousv["720p"] = $matche;
	} 
	
   // echo '<br>$matches[0] '. $matche . '<br>';
  }
 
/*echo "</pre><pre id='outx' style='word-wrap: break-word; white-space: pre-wrap;'>";  
echo 'start=$sousv$sousv$sousv$sousv$sousv$sousv$sousv$sousv$sousv$sousv';
print_r($sousv);
echo 'end=$sousv$sousv$sousv$sousv$sousv$sousv$sousv$sousv$sousv$sousv </pre>';*/
}
	libxml_use_internal_errors(true);
$page_content = file_get_contents($urlv);

$dom_obj = new DOMDocument();
$dom_obj->loadHTML($page_content);
$meta_val = null;

foreach($dom_obj->getElementsByTagName('meta') as $meta) {

if($meta->getAttribute('property')=='og:image'){ 

    $meta_val = $meta->getAttribute('content');
	//echo $meta_val;
}
}

$titlex1 =get_html_title($result);
$img1 =get_html_img($result);
// echo '$titlex['.$titlex.']$titlex1['.$titlex1.']';
 /*foreach($result->find('div.article') as $article) {
    $item['title']     = $article->find('div.title', 0)->plaintext;
    $item['intro']    = $article->find('div.intro', 0)->plaintext;
    $item['details'] = $article->find('div.details', 0)->plaintext;
    $articles[] = $item;
}*/
//Instance of WebsiteParser
/*
$parser1 = new WebsiteParser('https://www.youporn.com/watch/14328229/pussy-play/');

//Get all hyper links
$links1 = $parser1->getHrefLinks();

//Get all image sources
$images1 = $parser1->getImageSources();

$videos1 = $parser1->getvideoo();
echo "</pre>";
print_r($videos1);
echo "<br />";
echo "<pre>";
print_r($links1);
echo "<br />";
print_r($images1);
echo "</pre>";
$videosx1 = json_encode($videos1);
echo "</pre>";* /
echo "<H1>XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</H1>";
paras();
echo "<H1>XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</H1>";*/
//echo "<br />";
?>
<?PHP

function getMetaTags($str)
{
  $pattern = '
  ~<\s*meta\s

  # using lookahead to capture type to $1
    (?=[^>]*?
    \b(?:name|property|http-equiv)\s*=\s*
    (?|"\s*([^"]*?)\s*"|\'\s*([^\']*?)\s*\'|
    ([^"\'>]*?)(?=\s*/?\s*>|\s\w+\s*=))
  )

  # capture content to $2
  [^>]*?\bcontent\s*=\s*
    (?|"\s*([^"]*?)\s*"|\'\s*([^\']*?)\s*\'|
    ([^"\'>]*?)(?=\s*/?\s*>|\s\w+\s*=))
  [^>]*>

  ~ix';
  
  if(preg_match_all($pattern, $str, $out))
    return array_combine($out[1], $out[2]);
  return array();
}

// usage
$meta_tags = getMetaTags($result);
//echo "<pre>".print_r($meta_tags)."</pre></br>";
function getUrlData($url, $raw=false) // $raw - enable for raw display
{
    $result = false;
   
    $contents = getUrlContents($url);

    if (isset($contents) && is_string($contents))
    {
        $title = null;
        $metaTags = null;
        $metaProperties = null;
       
        preg_match('/<title>([^>]*)<\/title>/si', $contents, $match );

        if (isset($match) && is_array($match) && count($match) > 0)
        {
            $title = strip_tags($match[1]);
        }
       
        preg_match_all('/<[\s]*meta[\s]*(name|property)="?' . '([^>"]*)"?[\s]*' . 'content="?([^>"]*)"?[\s]*[\/]?[\s]*>/si', $contents, $match);
       
        if (isset($match) && is_array($match) && count($match) == 4)
        {
            $originals = $match[0];
            $names = $match[2];
            $values = $match[3];
           
            if (count($originals) == count($names) && count($names) == count($values))
            {
                $metaTags = array();
                $metaProperties = $metaTags;
                if ($raw) {
                    if (version_compare(PHP_VERSION, '5.4.0') == -1)
                         $flags = ENT_COMPAT;
                    else
                         $flags = ENT_COMPAT | ENT_HTML401;
                }
               
                for ($i=0, $limiti=count($names); $i < $limiti; $i++)
                {
                    if ($match[1][$i] == 'name')
                         $meta_type = 'metaTags';
                    else
                         $meta_type = 'metaProperties';
                    if ($raw)
                        ${$meta_type}[$names[$i]] = array (
                            'html' => htmlentities($originals[$i], $flags, 'UTF-8'),
                            'value' => $values[$i]
                        );
                    else
                        ${$meta_type}[$names[$i]] = array (
                            'html' => $originals[$i],
                            'value' => $values[$i]
                        );
                }
            }
        }
       
        $result = array (
            'title' => $title,
            'metaTags' => $metaTags,
            'metaProperties' => $metaProperties,
        );
    }
   
    return $result;
}

function getUrlContents($url, $maximumRedirections = null, $currentRedirection = 0)
{
    $result = false;
   
    $contents = @file_get_contents($url);
   
    // Check if we need to go somewhere else
   
    if (isset($contents) && is_string($contents))
    {
        preg_match_all('/<[\s]*meta[\s]*http-equiv="?REFRESH"?' . '[\s]*content="?[0-9]*;[\s]*URL[\s]*=[\s]*([^>"]*)"?' . '[\s]*[\/]?[\s]*>/si', $contents, $match);
       
        if (isset($match) && is_array($match) && count($match) == 2 && count($match[1]) == 1)
        {
            if (!isset($maximumRedirections) || $currentRedirection < $maximumRedirections)
            {
                return getUrlContents($match[1][0], $maximumRedirections, ++$currentRedirection);
            }
           
            $result = false;
        }
        else
        {
            $result = $contents;
        }
    }
   
    return $contents;
}
?>

<?php
$result = getUrlData(urlv, true);

//echo '<script>console.log( ' .print_r($result, true). ' )</script>';

?>
<head>
	  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TheBesTuBes</title>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <script src="//code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>  

  
  <meta property="og:url"           content="<?php echo 'https://bitube.cf/'.$_SERVER['REQUEST_URI']; ?>" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="<?php echo $titlex1; ?>" />
  <meta property="og:description"   content="<?php echo $titlex1; ?>" />
  <meta property="og:image"         content="<?php echo $meta_val; ?>" />
  <meta property="og:image:height"    content="250px" />
  <meta property="og:image:width"    content="auto" />
  <meta property="fb:app_id"          content="1987914104557011" />


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {
    box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
    float: left;
    width: 30%;
    padding: 10px;
}

/* Clear floats after the columns */
.row:after {
   /* content: "";*/
    display: table;
    clear: both;
}
/* Style the buttons */
.btn {
    border: none;
    outline: none;
    padding: 12px 16px;
    background-color: #f1f1f1;
    cursor: pointer;
}

.btn:hover {
    background-color: #ddd;
}

.btn.active {
    background-color: #666;
    color: white;
}

<!--style-->
	body {
    background-color: black;
    width: 97%;
    margin: 1%;
    height: 97%;
}
	#idrelated {
	display: block;
     font-size: small; 
    text-align: center;
    -webkit-margin-before-collapse: collapse;
    font-weight: 600;
    color: red;	
	}
	li.licl {
    float: left;
    width: 23%;
    height: 310px;
}
img.js_lazy.js-videoThumbFlip {
    width: 70%;
	    height: auto;
}
.video-box-infos {
    display: -webkit-inline-box;
	white-space: nowrap;
    overflow: hidden;
}
.video-box-title {
    white-space: nowrap;
    overflow: hidden;
}
div#pop {
            position: relative;
            width: 100%;
            height: 100%;
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
       #pop { text-align:center;}
</style>
 <link rel="stylesheet" href="https://bitube.cf/vpop/example/css/jquery.popVideo.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://bitube.cf/base.js"></script>
<script src="https://bitube.cf/base64js.min.js"></script>
<script>
var jsonss,sousv240p,sousv480p,loacat,new_url,stri,strix;
</script>

 <div class="info" style="display: none;">
 
  <pre id="infop" style="word-wrap: break-word; white-space: pre-wrap;display: none;"> <!--? php echo $result; ? -->
</pre> </div>
 <script>
 var ul3;
 $(window).on('load', function() {
 delay();
 console.log('All assets are loaded-$(".video-box").length--'+$('.video-box').length);
})
 function loabox() {
 
 setTimeout(function() { delay() ;}, 4000);
 var urrx= "https://cccco.herokuapp.com/https://www.youporn.com"+location.pathname;
$('#infop').load(urrx +' .video-box');
/*$('#infop').load(function() {
	delay() ;
  // Handler for .load() called.
});*/
 }
 function delay() {
if ($('.video-box') &&  $('.video-box').length >2)
{
	if ($('.video-box').length ==13) {
	if($('.video-box a')[12].pathname == location.pathname) console.log( $('.video-box a')[12].href);
	
	//$('.video-box')[12].remove();
	}
	for (i=0;i<(Math.floor(($('.video-box').length-1)/3))&& $('.video-box a')[i].pathname != location.pathname ;i++)
	{
//if (!$("#idrelated"+i)) { 
		$("body").append('<div id="idrelated'+i+'" class="row" style="text-align: center;"></div>');
  //   }	
	}
	setTimeout(function() { delay1() ;}, 2000);
}

 }
 /*
 ll2=getindex(1,$('.video-box-image')[4].href.substring($('.video-box-image')[4].href.indexOf('/watch/')+'/watch/'.length))
 myObj = {[ll1]:$('.video-box-image')[2].href,[ll2]:$('.video-box-image')[3].href};
myJSON = JSON.stringify(myObj);
localStorage.setItem("testJSON", myJSON);
###############
//Retrieving data:
text = localStorage.getItem("testJSON");
obj = JSON.parse(text);
document.getElementById("demo").innerHTML = obj.name;
*/
function delay1() {
	
	//var ul1 = document.createElement('ul');
	 //ul1.style.display = "inline-block";
	 //ul1.id = 'idrelated';
	 // $("body").append(ul1);
	
/*if ($('.video-box a')[0].href.indexOf('youporn') <1){*/
$('div.is-hidden').remove();
$('.js_add-to-option-wrapper').remove()

$('.video-box').each(function(x,i) { 
	
	 //var relU = document.getElementById('idrelated');
	 // var boxU = document.getElementsByClassName('video-box');
	 
	$('.video-box a').find('img')[x].src=$('.video-box a').find('img')[x].dataset.thumbnail;
	$('.video-box-image')[x].append($('.video-box-infos')[x]);
	if ($('.video-box a')[x].pathname != location.pathname)	{
if (!$('.video-box')[x].classList.contains('column'))	{$('.video-box')[x].className += ' column';}
	$('#idrelated'+Math.floor(x/3)).append($('.video-box')[x].outerHTML);
	 } else { document.title = $('.video-box-title')[x].innerText;  }
		//if (x+1==$('.video-box').length) { document.getElementById('infop').innerHTML = ''; return;}
	}

);
//}
/*
$('.video-box').each(function(x,i) {
//	jQuery('.video-box-image')[x].insertBefore(jQuery('.video-box-title')[x],jQuery('img.js_lazy')[x]);
	//$('.video-box .undo-removed-title')[x].textContent = $('.video-box .video-box-title')[x].textContent;
$("#idrelated").append("<li class='licl licl"+x+"'>"+$('.video-box')[x].outerHTML);
});*/
}
// $("#infop").innerText = '< ? php echo $result; ?>';
// jsonss =jsonss[2][0].substring(1,jsonss[02][0].length-1).replace(/\\/g,'')
 sousv240p = <?php echo $sousv['240p']; ?>;
 sousv480p = <?php echo $sousv['480p']; ?>;
 </script>
  </head>
  <body>
 <video 
      id="videox"
      class="video-js vjs-fluid"
	  max-height: "400px"
      width="100%"
	  height="60%"
	  ondblclick=" $('button.vjs-fullscreen-control').click();"
      controls
	  muted
	  preload="none">
      <source src=<?php echo $sousv['480p']; ?> type="video/mp4">
      <source src=<?php echo $sousv['240p']; ?> type="video/mp4">
	  <source src=<?php echo $sousv['720p']; ?> type="video/mp4">
	      <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
    </video>
	<br>
	<div id="btnContainer">
<button class="btn" onclick="listView()"><i class="fa fa-bars"></i> List</button> 
<button class="btn active" onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>
</div>
<br>

	<script>
	new_url = new Array();
	function getindex(x,y) { var intt=0;
	for(var i=y.length-1; i>=0;i--){
    if(y[i]=='/'){if (intt==x){
       return  y.substring(0,i);}intt++;
    }
}
	} //eg :: ll=getindex(1,location.href.substring(location.href.indexOf('/watch/')+'/watch/'.length));
	function yh(xi) {
   var xmlhttp;
  
  loacat = !(loacat) ? 'related' : loacat;
strix = location.href.substring(location.href.indexOf('watch/')+'watch/'.length);
stri = strix.substring(0,strix.indexOf('/'));
  // location.href.substring(location.href.indexOf('/watch/')+'/watch/'.length,location.href.substring(0,location.href.length-1).lastIndexOf('/'));
   if (new_url[stri]) 
   {
	   	var liii = '<li class="licl licl'+document.getElementsByClassName('licl').length+'"><div class="video-box four-column video_block_wrapper" data-video-id="'+getindex(1,new_url[stri][loacat][parseInt(xi)][4].substring(new_url[stri][loacat][parseInt(xi)][4].indexOf('/watch/')+'/watch/'.length))+'" ><a href="'+new_url[stri][loacat][parseInt(xi)][4]+'" class="video-box-image"><img src="'+new_url[stri][loacat][parseInt(xi)][0]+'" class="js_lazy js-videoThumbFlip " alt="'+new_url[stri][loacat][parseInt(xi)][1]+'" data-thumbnail="https://fi1.ypncdn.com/m=e8KSKgaaaa/200906/17/311470/original/8/pummeled-by-cock-8.jpg" data-original="https://fi1.ypncdn.com/m=e8KSKgaaaa/200906/17/311470/original/8/pummeled-by-cock-8.jpg" ><div class="video-box-title">'+new_url[stri][loacat][parseInt(xi)][1]+'</div></a><div class="video-box-infos"><div class="video-box-rating"><span class="video-box-percentage up">'+new_url[stri][loacat][parseInt(xi)][3]+'%</span></div><div class="video-duration">'+new_url[stri][loacat][parseInt(xi)][2]+'</div></div></div></li>'
 //$("#idrelated").append("<li class='licl licl"+xi+"'><a class='containerx' href='?urlx=https://www.youporn.com"+new_url[stri][loacat][parseInt(xi)][4]+"' poster='"+new_url[stri][loacat][parseInt(xi)][0]+"'><p class='hover-text' id='bloc1'>"  +new_url[stri][loacat][parseInt(xi)][1]+  "</p><img class='manImg' id='bloc2' src='"+new_url[stri][loacat][parseInt(xi)][0]+"' > </a>");	
 $("#idrelated").append(liii);	
	  // $("#idrelated").append("<a class='containerx' href='?urlx=https://www.youporn.com"+new_url[stri][loacat][parseInt(xi)][4]+"' poster='"+new_url[stri][loacat][parseInt(xi)][0]+"'><p class='hover-text' id='bloc1'>"  +new_url[stri][loacat][parseInt(xi)][1]+  "</p><img class='manImg' id='bloc2' src='"+new_url[stri][loacat][parseInt(xi)][0]+"' > </a>");	
 //console.log(' \n\nnew_url\n</br><a href="?urlx=https://www.youporn.com'+new_url[stri][loacat][parseInt(xi)][4]+">"+new_url[stri][loacat][parseInt(xi)][1]+"<img class='manImg' id='bloc2' src='"+new_url[stri][loacat][parseInt(xi)][0]+"' ></a>");
	   
   } else {
   //yh(encodeURIComponent('https://www.youporn.com/api/webmasters/search/?search=anal&category=dp&page=1&thumbsize=small'));
if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp = new XMLHttpRequest();
}
else { // code for IE6, IE5
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function() {
if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
	new_url[stri] = JSON.parse(xmlhttp.responseText);
	/*$.each(new_url, function (i, f) { f.duration = hmsToSecondsOnly(f.duration); }) ;
	//my_addtoany_onshare(new_url);
	player.playlist(new_url,0);
	player.playlistUi();
	player.playlist.currentItem(0);*/
	var ul1 = document.createElement('ul');
	 ul1.style.display = "inline-block";
	 ul1.id = 'idrelated';
	 $("body").append(ul1);
	var liii = '<li class="licl licl'+document.getElementsByClassName('licl').length+'"><div class="video-box four-column video_block_wrapper" data-video-id="'+getindex(1,new_url[stri][loacat][parseInt(xi)][4].substring(new_url[stri][loacat][parseInt(xi)][4].indexOf('/watch/')+'/watch/'.length))+'" ><a href="'+new_url[stri][loacat][parseInt(xi)][4]+'" class="video-box-image"><img src="'+new_url[stri][loacat][parseInt(xi)][0]+'" class="js_lazy js-videoThumbFlip " alt="'+new_url[stri][loacat][parseInt(xi)][1]+'" data-thumbnail="https://fi1.ypncdn.com/m=e8KSKgaaaa/200906/17/311470/original/8/pummeled-by-cock-8.jpg" data-original="https://fi1.ypncdn.com/m=e8KSKgaaaa/200906/17/311470/original/8/pummeled-by-cock-8.jpg" ><div class="video-box-title">'+new_url[stri][loacat][parseInt(xi)][1]+'</div></a><div class="video-box-infos"><div class="video-box-rating"><span class="video-box-percentage up">'+new_url[stri][loacat][parseInt(xi)][3]+'%</span></div><div class="video-duration">'+new_url[stri][loacat][parseInt(xi)][2]+'</div></div></div></li>'
 //$("#idrelated").append("<li class='licl licl"+xi+"'><a class='containerx' href='?urlx=https://www.youporn.com"+new_url[stri][loacat][parseInt(xi)][4]+"' poster='"+new_url[stri][loacat][parseInt(xi)][0]+"'><p class='hover-text' id='bloc1'>"  +new_url[stri][loacat][parseInt(xi)][1]+  "</p><img class='manImg' id='bloc2' src='"+new_url[stri][loacat][parseInt(xi)][0]+"' > </a>");	
 $("#idrelated").append(liii);	
 console.log(xmlhttp.responseText);// + ' \n\nnew_url\n</br><a href="?urlx=https://www.youporn.com'+new_url[stri][loacat][parseInt(xi)][4]+">"+new_url[stri][loacat][parseInt(xi)][1]+"<img class='manImg' id='bloc2' src='"+new_url[stri][loacat][parseInt(xi)][0]+"' ></a>");
	return xmlhttp.responseText;
 //alert(xmlhttp.responseText);
} 
}
xmlhttp.open("POST", "https://cccco.herokuapp.com/https://www.youporn.com/watch_postroll/"+stri+"/?nplayer=1&num=16");
xmlhttp.send();
}
	}
</script>
<script>
	player = $('video');
	player.ready(function() { 
		if (location.pathname && location.href.indexOf('watch') > 0)
		{  
		//	var ul1 = document.createElement('div');
	// ul1.style.display = "inhe";
	// ul1.id = 'idrelated';
	// ul1.className = 'row';
	// $("body").append(ul1);
			}
		//yh(0);
		loabox();
		});
	
	</script>
	<script>
// Get the elements with class="column"
var elements = document.getElementsByClassName("column");

// Declare a loop variable
var i;

// List View
function listView() {
    for (i = 0; i < elements.length; i++) {
        elements[i].style.width = "100%";
    }
}

// Grid View
function gridView() {
    for (i = 0; i < elements.length; i++) {
        elements[i].style.width = "30%";
    }
}

/* Optional: Add active class to the current button (highlight it) */
var container = document.getElementById("btnContainer");
var btns = container.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>
<video src="https://www.w3schools.com/html/movie.mp4" webkit-playsinline playsinline data-video=<?php echo $sousv['240p']; ?>  muted id="video" class="video" style="width: 300px">
 <source src=<?php echo $sousv['240p']; ?> type="video/mp4">
 </video>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://bitube.cf/vpop/example/js/jquery.popVideo.js"></script>
<script>
  $('#video').click(function () {
        $('#video').popVideo({
            playOnOpen: false,
            title: document.title,
          closeOnEnd: false,
            pauseOnClose: true,
        }).open()
    });
</script>
	</body>
	