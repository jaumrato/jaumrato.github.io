<!--?php
	if (
    !isset($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW'])
    || $_SERVER['PHP_AUTH_USER'] !== 'login'
    || $_SERVER['PHP_AUTH_PW'] !== 'pass'
) {
        header('WWW-Authenticate: Basic realm="Enter username and password."');
		header('Proxy-Authenticate: Basic realm="Enter username and password."');
        header('Content-Type: text/plain; charset=utf-8');
        echo 'Restricted Area'; 
		exit;
}
-->
<?php
//header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Headers: Content-Type");
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

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Access-Control-Allow-Origin" content="*">
  <title></title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<style type="text/css">
  
p {
  white-space: nowrap;
  width: 100%;                   
  overflow: hidden;
  text-overflow:    ellipsis;
}
	@media (min-width: 100%)
.modal-content {
	width: 100%; 
    -webkit-box-shadow: 0 5px 15px rgba(0,0,0,.5);
    box-shadow: 0 5px 15px rgba(0,0,0,.5);
}
</style>
<link href="/css/font-awesome.min.css" rel="stylesheet">
<!--link href="/web-fonts-with-css/css/fontawesome-all.min.css" rel="stylesheet"-->
	<style class="vjs-styles-defaults">
	body {	
    color: red;
    background-color: black;
    border-color: red;
	}
	.hiden {display: none; }
	.video-js {
	width: 300px;
	height: 150px;
	}
	
	.vjs-fluid {
	padding-top: 56.25%
	}
    </style><!--style class="vjs-styles-dimensions">
      .video-dimensions {
        width: 600px;
        height: 250px;
      }

      .video-dimensions.vjs-fluid {
        padding-top: 41.66666666666667%;
      }
	  </style--><style class="vjs-styles-dimensions">
	.video-dimensions {
	width: 600px;
	height: 300px;
	}
	
	.video-dimensions.vjs-fluid {
	padding-top: 41.66666666666667%;
	}
	#video {
	width: 100%;
	 height: 550px; 
	}
	input {
	
    color: red;
    background-color: black;
    border-color: red;
	}
	#url {
	
    color: red;
    background-color: black;
    border-color: red;
  /*  float: left;
    font-size: x-small;
    height: 15px;*/
    width: 120px;
    overflow: visible; 
	}
	[class^="icon-"]:before,
[class*=" icon-"]:before {
  font-family: FontAwesome;
  font-weight: normal;
  font-style: normal;
  display: inline-block;
  text-decoration: inherit;
}
.icon-fa-backward:before {
    content: "\f04a";
}
.icon-fa-forward:before {
    content: "\f04e";
}
	.vjs-playlist-horizontal , .vjs-playlist, .player-container, body {
    scrollbar-face-color: #367CD2;
    scrollbar-shadow-color: #FFFFFF;
    scrollbar-highlight-color: #FFFFFF;
    scrollbar-3dlight-color: #FFFFFF;
    scrollbar-darkshadow-color: #FFFFFF;
    scrollbar-track-color: #FFFFFF;
    scrollbar-arrow-color: #FFFFFF;
}
.jumbotron {
 color: red;
    background-color: black;
    border-color: red;
}
@media (min-width: 100%)
.modal-content {
    -webkit-box-shadow: 0 5px 15px rgba(0,0,0,.5);
    box-shadow: 0 5px 15px rgba(0,0,0,.5);
}

</style>
<!--script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script-->

<link href="vjs/node_modules/video.js/dist/video-js.css" rel="stylesheet">
  <link href="vjs/dist/videojs-playlist-ui.css" rel="stylesheet">
  <link href="vjs/examples.css" rel="stylesheet">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <link rel="stylesheet" media="screen" href="//vjs.zencdn.net/5.4.6/video-js.min.css">
 <link rel="stylesheet" media="screen" href="vjs-skin-red/vsg-skin.css">
<!--link href="./Horizontal-full_files/video-js.css" rel="stylesheet">
<link href="./Horizontal-full_files/videojs-playlist-ui.css" rel="stylesheet">
<link href="./Horizontal-full_files/examples.css" rel="stylesheet"-->
<script>
	var player,new_url,surl,hurl,p,q,c,page,catego,search,lists1;
	var urlxph = 'https://www.pornhub.com/webmasters/search',urlxyp = 'https://www.youporn.com/api/webmasters/search/';
	
		page=(location.search && getParams(location.href).page) ? parseInt(getParams(location.href).page) : 1;
	     function hmsToSecondsOnly(str) {
    var p = str.split(':'),
        s = 0, m = 1;

    while (p.length > 0) {
        s += m * parseInt(p.pop(), 10);
        m *= 60;
    }

    return s;
}

function pagi() {
 page=(location.search && getParams(location.href).page) ? parseInt(getParams(location.href).page) : 1;
if (location.href.indexOf('&page=') < 0 ) history.pushState('getParam pageur','page getParam ur',location.href+'&page='+page);
    return parseInt(page);
}

	function getParams(ur){
	
		if (ur.indexOf('?') < 0) {
		page=1;
			ur = "?search="+itemSearch.value+"&tags[]=&page="+page;
			history.pushState('getParams pageur','page getParams ur',ur);
		}
		var nur = decodeURIComponent(ur);
	console.log('get ur= '+ur + ' nur=' + nur);
        var regex = /[?&]([^=#]+)=([^&#]*)/g,
		params = {},
		match;
        while(match = regex.exec(nur)) {
            params[match[1]] = match[2];
		}
		
        return params;
	} 
/*if (!location.search) {
		page=1;
			ur = "?search="+itemSearch.value+"&tags[]=";
			history.pushState('getParams pageur','page getParams ur',ur);
		} else {
		itemSearch.value = getParams(location.href)['search'];
		if (getParams(location.href)['tags[]']) itemSearch.value +=getParams(location.href)['tags[]'];
		}
		if (itemSearch.value != "") $('#btn-search')[0].click();*/
</script>

<script>
	sous = new Array();
	lists1=new Array();
	function remclass(){ /*sous = new Array();lists=new Array();
	lists1=new Array();*/$('.thid').toggleClass('hiden'); $('.thid.vjs-button').toggleClass('vjs-hidden');}
function getInfo1(urr){
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var myObj = JSON.parse(this.responseText);
		var srcc = (myObj.info.formats) ? lisx0(myObj.info.formats) : lisx0(myObj.info.entries[0].formats);
		lists1.push({ name: myObj.info.title,
      description: myObj.info.description,
      duration: hmsToSecondsOnly(retorna.video[1].duration),sources: srcc, thumbnail: [{  srcset: myObj.info.thumbnail, type: 'image/jpeg',  media: '(max-width: 28%;)'  }, {src: myObj.info.thumbnail  }  ], poster: myObj.info.thumbnail });
		//if (retorna.video.length-2 <= lists1.length) console.log('retorna.video.length == lists1.length' + retorna.video.length +'=='+ lists1.length);
		if (retorna.video.length  <= lists1.length) {/*lis2();remclass();*/return sous = myObj.info;}
        //return sous = myObj.info;
    }
	
};
xmlhttp.open("GET", "https://secret-falls-85795.herokuapp.com/api/info?url="+urr, true);
xmlhttp.send();
}
function getInfo(urr){
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var myObj = JSON.parse(this.responseText);
		lists1.push(myObj.info);
		if (retorna.video.length-2 <= lists1.length) console.log('retorna.video.length == lists1.length' + retorna.video.length +'=='+ lists1.length);
		if (retorna.video.length  <= lists1.length) {lis2();remclass();return sous = myObj.info;}
        //return sous = myObj.info;
    }
	
};
xmlhttp.open("GET", "https://secret-falls-85795.herokuapp.com/api/info?url="+urr, true);
xmlhttp.send();
}
</script>
 <link rel="stylesheet" href="https://swisnl.github.io/jQuery-contextMenu/css/screen.css" type="text/css"/>
    <!--link rel="stylesheet" href="https://swisnl.github.io/jQuery-contextMenu/css/theme.css" type="text/css"/>
    <link rel="stylesheet" href="https://swisnl.github.io/jQuery-contextMenu/css/theme-fixes.css" type="text/css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.4/styles/github.min.css"-->
    <link href="https://swisnl.github.io/jQuery-contextMenu/dist/jquery.contextMenu.css" rel="stylesheet" type="text/css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://swisnl.github.io/jQuery-contextMenu/dist/jquery.contextMenu.js" type="text/javascript"></script>

    <script src="https://swisnl.github.io/jQuery-contextMenu/dist/jquery.ui.position.min.js" type="text/javascript"></script>
</head>
<body style="background-color: black;">

<div class="container-fluid">
  
  <div class="jumbotron">
  <h1>Best Tubes</h1>
  <p>Zé da coca</p>
  
    <div class="input-group">
      <input id="itemSearch" type="text" class="form-control" placeholder="Search Tubes...">
      <span class="input-group-btn">
        <button id="btn-search" class="btn btn-default" type="button">Pesquisar</button>
		
      </span>
    </div><!-- /input-group -->
	  <button id="btn-next" onclick="pagee(1);" class="btn btn-default" type="button">Next Page</button>
	  	  <button id="btn-playlis" onclick="lis2();" class="btn btn-default hiden thid" type="button">Playlist</button>

  </div>

  <div class="progress" id="div-loading" style="display: none;">
  <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    <span class="sr-only">45% Complete</span>
  </div>

  </div>

  <div class="row" id="conteudo">
  </div>
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    	<style>
		@media (min-width: 100%)
.modal-content {
    -webkit-box-shadow: 0 5px 15px rgba(0,0,0,.5);
    box-shadow: 0 5px 15px rgba(0,0,0,.5);
}

</style>
      <!-- Modal content-->
      <div class="modal-content" style="width: 100%;@media (min-width: 100%)">
	  	<style>
		@media (min-width: 100%)
.modal-content {
    -webkit-box-shadow: 0 5px 15px rgba(0,0,0,.5);
    box-shadow: 0 5px 15px rgba(0,0,0,.5);
}

</style>
        <div class="modal-header">
          <button type="button" class="close" onclick="player.reset();" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
		  <link href="/css/font-awesome.min.css" rel="stylesheet">
		  <link href="/web-fonts-with-css/css/fontawesome-all.min.css" rel="stylesheet">
	<link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		  <link href="vjs/node_modules/video.js/dist/video-js.css" rel="stylesheet">
  <link href="vjs/dist/videojs-playlist-ui.css" rel="stylesheet">
  <link href="vjs/examples.css" rel="stylesheet">
	<!--script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script-->
 <link rel="stylesheet" media="screen" href="//vjs.zencdn.net/5.4.6/video-js.min.css">
 <link rel="stylesheet" media="screen" href="vjs-skin-red/vsg-skin.css">
        </div>
        <div class="modal-body" style="height: 500px">
		<div class="player-container" style="width: 100%;	height: 100%;">
    <video
      id="video"
      class="video-js"
      height="500"
      width="100%"
	  muted
      controls>
      <source src="//vjs.zencdn.net/v/oceans.mp4" type="video/mp4">
      <source src="//vjs.zencdn.net/v/oceans.webm" type="video/webm">
    </video>
			<!--div tabindex="-1" class="video-js vjs-paused video-dimensions vjs-controls-enabled vjs-workinghover vjs-v5 vjs-user-inactive" id="video" role="region" aria-label="video player"><video id="video_html5_api" class="vjs-tech" tabindex="-1">
				<source src="//vjs.zencdn.net/v/oceans.mp4" type="video/mp4">
				<source src="//vjs.zencdn.net/v/oceans.webm" type="video/webm">
			</video><div></div><div class="vjs-poster vjs-hidden" tabindex="-1" aria-disabled="false"></div><div class="vjs-text-track-display" aria-live="off" aria-atomic="true"></div><div class="vjs-loading-spinner" dir="ltr"></div><button class="vjs-big-play-button" type="button" aria-live="polite" title="Play Video" aria-disabled="false"><span class="vjs-control-text">Play Video</span></button><div class="vjs-control-bar" dir="ltr" role="group"><button class="vjs-play-control vjs-control vjs-button" type="button" aria-live="polite" title="Play" aria-disabled="false"><span class="vjs-control-text">Play</span></button><div class="vjs-volume-menu-button vjs-menu-button vjs-menu-button-inline vjs-control vjs-button vjs-volume-menu-button-horizontal vjs-vol-3" tabindex="0" role="button" aria-live="polite" title="Mute" aria-disabled="false"><div class="vjs-menu"><div class="vjs-menu-content"><div tabindex="0" class="vjs-volume-bar vjs-slider-bar vjs-slider vjs-slider-horizontal" role="slider" aria-valuenow="100.00" aria-valuemin="0" aria-valuemax="100" aria-label="volume level" aria-valuetext="100.00%"><div class="vjs-volume-level"><span class="vjs-control-text"></span></div></div></div></div><span class="vjs-control-text">Mute</span></div><div class="vjs-current-time vjs-time-control vjs-control"><div class="vjs-current-time-display" aria-live="off"><span class="vjs-control-text">Current Time </span>0:00</div></div><div class="vjs-time-control vjs-time-divider"><div><span>/</span></div></div><div class="vjs-duration vjs-time-control vjs-control"><div class="vjs-duration-display" aria-live="off"><span class="vjs-control-text">Duration Time</span> 0:46</div></div><div class="vjs-progress-control vjs-control"><div tabindex="0" class="vjs-progress-holder vjs-slider vjs-slider-horizontal" role="slider" aria-valuenow="NaN" aria-valuemin="0" aria-valuemax="100" aria-label="progress bar" aria-valuetext="0:00"><div class="vjs-load-progress" style="width: 26.1964%;"><span class="vjs-control-text"><span>Loaded</span>: 0%</span><div style="left: 0%; width: 100%;"></div></div><div class="vjs-mouse-display" data-current-time="0:00" style="left: 0px;"></div><div class="vjs-play-progress vjs-slider-bar" data-current-time="0:00"><span class="vjs-control-text"><span>Progress</span>: 0%</span></div></div></div><div class="vjs-live-control vjs-control vjs-hidden"><div class="vjs-live-display" aria-live="off"><span class="vjs-control-text">Stream Type</span>LIVE</div></div><div class="vjs-remaining-time vjs-time-control vjs-control"><div class="vjs-remaining-time-display" aria-live="off"><span class="vjs-control-text">Remaining Time</span> -0:46</div></div><div class="vjs-custom-control-spacer vjs-spacer ">&nbsp;</div><div class="vjs-playback-rate vjs-menu-button vjs-menu-button-popup vjs-control vjs-button vjs-hidden" tabindex="0" role="menuitem" aria-live="polite" title="Playback Rate" aria-disabled="false" aria-expanded="false" aria-haspopup="true"><div class="vjs-menu" role="presentation"><ul class="vjs-menu-content" role="menu"></ul></div><span class="vjs-control-text">Playback Rate</span><div class="vjs-playback-rate-value">1</div></div><div class="vjs-chapters-button vjs-menu-button vjs-menu-button-popup vjs-control vjs-button vjs-hidden" tabindex="0" role="menuitem" aria-live="polite" title="Chapters" aria-disabled="false" aria-expanded="false" aria-haspopup="true" aria-label="Chapters Menu"><div class="vjs-menu" role="presentation"><ul class="vjs-menu-content" role="menu"><li class="vjs-menu-title" tabindex="-1">Chapters</li></ul></div><span class="vjs-control-text">Chapters</span></div><div class="vjs-descriptions-button vjs-menu-button vjs-menu-button-popup vjs-control vjs-button vjs-hidden" tabindex="0" role="menuitem" aria-live="polite" title="Descriptions" aria-disabled="false" aria-expanded="false" aria-haspopup="true" aria-label="Descriptions Menu"><div class="vjs-menu" role="presentation"><ul class="vjs-menu-content" role="menu"><li class="vjs-menu-item vjs-selected" tabindex="-1" role="menuitemcheckbox" aria-live="polite" aria-disabled="false" aria-checked="true">descriptions off<span class="vjs-control-text">, selected</span></li></ul></div><span class="vjs-control-text">Descriptions</span></div><div class="vjs-subtitles-button vjs-menu-button vjs-menu-button-popup vjs-control vjs-button vjs-hidden" tabindex="0" role="menuitem" aria-live="polite" title="Subtitles" aria-disabled="false" aria-expanded="false" aria-haspopup="true" aria-label="Subtitles Menu"><div class="vjs-menu" role="presentation"><ul class="vjs-menu-content" role="menu"><li class="vjs-menu-item vjs-selected" tabindex="-1" role="menuitemcheckbox" aria-live="polite" aria-disabled="false" aria-checked="true">subtitles off<span class="vjs-control-text">, selected</span></li></ul></div><span class="vjs-control-text">Subtitles</span></div><div class="vjs-captions-button vjs-menu-button vjs-menu-button-popup vjs-control vjs-button vjs-hidden" tabindex="0" role="menuitem" aria-live="polite" title="Captions" aria-disabled="false" aria-expanded="false" aria-haspopup="true" aria-label="Captions Menu"><div class="vjs-menu" role="presentation"><ul class="vjs-menu-content" role="menu"><li class="vjs-menu-item vjs-texttrack-settings" tabindex="-1" role="menuitem" aria-live="polite" aria-disabled="false">captions settings<span class="vjs-control-text">, opens captions settings dialog</span></li><li class="vjs-menu-item vjs-selected" tabindex="-1" role="menuitemcheckbox" aria-live="polite" aria-disabled="false" aria-checked="true">captions off<span class="vjs-control-text">, selected</span></li></ul></div><span class="vjs-control-text">Captions</span></div><div class="vjs-audio-button vjs-menu-button vjs-menu-button-popup vjs-control vjs-button vjs-hidden" tabindex="0" role="menuitem" aria-live="polite" title="Audio Track" aria-disabled="false" aria-expanded="false" aria-haspopup="true" aria-label="Audio Menu"><div class="vjs-menu" role="presentation"><ul class="vjs-menu-content" role="menu"></ul></div><span class="vjs-control-text">Audio Track</span></div><button class="vjs-fullscreen-control vjs-control vjs-button" type="button" aria-live="polite" title="Fullscreen" aria-disabled="false"><span class="vjs-control-text">Fullscreen</span></button></div><div class="vjs-error-display vjs-modal-dialog vjs-hidden " tabindex="-1" aria-describedby="video_component_357_description" aria-hidden="true" aria-label="Modal Window" role="dialog"><p class="vjs-modal-dialog-description vjs-offscreen" id="video_component_357_description">This is a modal window.</p><div class="vjs-modal-dialog-content" role="document"></div></div><div class="vjs-caption-settings vjs-modal-overlay vjs-hidden" tabindex="-1" role="dialog" aria-labelledby="TTsettingsDialogLabel-video_component_362" aria-describedby="TTsettingsDialogDescription-video_component_362"><div role="document"><div class="vjs-control-text" id="TTsettingsDialogLabel-video_component_362" aria-level="1" role="heading">Caption Settings Dialog</div><div class="vjs-control-text" id="TTsettingsDialogDescription-video_component_362">Beginning of dialog window. Escape will cancel and close the window.</div><div class="vjs-tracksettings"><div class="vjs-tracksettings-colors"><fieldset class="vjs-fg-color vjs-tracksetting"><legend>Text</legend><label class="vjs-label" for="captions-foreground-color-video_component_362">Color</label><select id="captions-foreground-color-video_component_362"><option value="#FFF">White</option><option value="#000">Black</option><option value="#F00">Red</option><option value="#0F0">Green</option><option value="#00F">Blue</option><option value="#FF0">Yellow</option><option value="#F0F">Magenta</option><option value="#0FF">Cyan</option></select><span class="vjs-text-opacity vjs-opacity"><label class="vjs-label" for="captions-foreground-opacity-video_component_362">Transparency</label><select id="captions-foreground-opacity-video_component_362"><option value="1">Opaque</option><option value="0.5">Semi-Transparent</option></select></span></fieldset><fieldset class="vjs-bg-color vjs-tracksetting"><legend>Background</legend><label class="vjs-label" for="captions-background-color-video_component_362">Color</label><select id="captions-background-color-video_component_362"><option value="#000">Black</option><option value="#FFF">White</option><option value="#F00">Red</option><option value="#0F0">Green</option><option value="#00F">Blue</option><option value="#FF0">Yellow</option><option value="#F0F">Magenta</option><option value="#0FF">Cyan</option></select><span class="vjs-bg-opacity vjs-opacity"><label class="vjs-label" for="captions-background-opacity-video_component_362">Transparency</label><select id="captions-background-opacity-video_component_362"><option value="1">Opaque</option><option value="0.5">Semi-Transparent</option><option value="0">Transparent</option></select></span></fieldset><fieldset class="vjs-window-color vjs-tracksetting"><legend>Window</legend><label class="vjs-label" for="captions-window-color-video_component_362">Color</label><select id="captions-window-color-video_component_362"><option value="#000">Black</option><option value="#FFF">White</option><option value="#F00">Red</option><option value="#0F0">Green</option><option value="#00F">Blue</option><option value="#FF0">Yellow</option><option value="#F0F">Magenta</option><option value="#0FF">Cyan</option></select><span class="vjs-window-opacity vjs-opacity"><label class="vjs-label" for="captions-window-opacity-video_component_362">Transparency</label><select id="captions-window-opacity-video_component_362"><option value="0">Transparent</option><option value="0.5">Semi-Transparent</option><option value="1">Opaque</option></select></span></fieldset></div><div class="vjs-tracksettings-font"><div class="vjs-font-percent vjs-tracksetting"><label class="vjs-label" for="captions-font-size-video_component_362">Font Size</label><select id="captions-font-size-video_component_362"><option value="0.50">50%</option><option value="0.75">75%</option><option value="1.00">100%</option><option value="1.25">125%</option><option value="1.50">150%</option><option value="1.75">175%</option><option value="2.00">200%</option><option value="3.00">300%</option><option value="4.00">400%</option></select></div><div class="vjs-edge-style vjs-tracksetting"><label class="vjs-label" for="video_component_362">Text Edge Style</label><select id="video_component_362"><option value="none">None</option><option value="raised">Raised</option><option value="depressed">Depressed</option><option value="uniform">Uniform</option><option value="dropshadow">Dropshadow</option></select></div><div class="vjs-font-family vjs-tracksetting"><label class="vjs-label" for="captions-font-family-video_component_362">Font Family</label><select id="captions-font-family-video_component_362"><option value="proportionalSansSerif">Proportional Sans-Serif</option><option value="monospaceSansSerif">Monospace Sans-Serif</option><option value="proportionalSerif">Proportional Serif</option><option value="monospaceSerif">Monospace Serif</option><option value="casual">Casual</option><option value="script">Script</option><option value="small-caps">Small Caps</option></select></div></div><div class="vjs-tracksettings-controls"><button class="vjs-default-button">Defaults</button><button class="vjs-done-button">Done</button></div></div></div></div></div-->
			
			<div class="vjs-playlist vjs-playlist-horizontal" style="
			float: left;
			/* margin-left: 622px; */
			position: relative;
			margin-top: 15px;
			/* top: 00px; */
			overflow: scroll;
			width: 100%;
			height: 30%;
			">
				<!--
					The contents of this element will be filled based on the
					currently loaded playlist
				-->
			</div>
		</div>
		
		<script src="./full12_files/video.js"></script>
		<script src="./full12_files/videojs-playlist.js"></script>
		<script src="./full12_files/videojs-playlist-ui.js"></script>
		
		<script>
		
			var xmlhttp;
			var stri,cmq;
			player = videojs('video');
			player.ready(function() {
		/*	 $("video")[0].addEventListener("loadeddata", function () {
			//  document.title = retorna.video[0].title;
	// $(".modal-title").html(lists[player.playlist.currentIndex()].name);
			 });*/
	try {
      // try on ios
	
      player.volume(0);
    } catch (e) {}
	
	var Button = videojs.getComponent('Button');

// Extend default
var PrevButton = videojs.extend(Button, {
  //constructor: function(player, options) {
  constructor: function() {
    Button.apply(this, arguments);
  //  this.addClass('vjs-chapters-button');
 //   this.addClass('icon-angle-left');
	this.addClass('fa');
    this.addClass('fa-chevron-left');
	 this.addClass('vjs-hidden');
	  this.addClass('thid');
    this.controlText("Previous");
  },

  // constructor: function() {
  //   Button.apply(this, arguments);
  //   this.addClass('vjs-play-control vjs-control vjs-button vjs-paused');
  // },

  // createEl: function() {
  //   return Button.prototype.createEl('button', {
  //     //className: 'vjs-next-button vjs-control vjs-button',
  //     //innerHTML: 'Next >'
  //   });
  // },

  handleClick: function() {
   // console.log('click');
   
    player.playlist.previous();
  }
});

var ShuButton = videojs.extend(Button, {
  //constructor: function(player, options) {
  constructor: function() {
    Button.apply(this, arguments);
  //  this.addClass('vjs-chapters-button');
    this.addClass('fa');
	 this.addClass('fa-random');
	 this.addClass('vjs-hidden');
	  this.addClass('thid');
    this.controlText("Shuffle");
  },

  
  handleClick: function() {
   // console.log('click');
	player.playlist.shuffle();
  }
});

var SPrevButton = videojs.extend(Button, {
  //constructor: function(player, options) {
  constructor: function() {
    Button.apply(this, arguments);
  //  this.addClass('vjs-chapters-button');
  this.addClass('fas');
    this.addClass('fa-backward');
    this.controlText("--30 secs");
  },

  
  handleClick: function() {
    console.log('click');
	if (player.currentTime() - 30 < 0) {
		player.currentTime(0);
		} else {
	
    player.currentTime(player.currentTime() - 30);
	}
  }
});

var SNextButton = videojs.extend(Button, {
  //constructor: function(player, options) {
  constructor: function() {
    Button.apply(this, arguments);
  //  this.addClass('vjs-chapters-button');
    this.addClass('fas');
	 this.addClass('fa-forward');
    this.controlText("++30secs");
  },

  // constructor: function() {
  //   Button.apply(this, arguments);
  //   this.addClass('vjs-play-control vjs-control vjs-button vjs-paused');
  // },

  // createEl: function() {
  //   return Button.prototype.createEl('button', {
  //     //className: 'vjs-next-button vjs-control vjs-button',
  //     //innerHTML: 'Next >'
  //   });
  // },

  handleClick: function() {
    //console.log('click');
	if (player.currentTime() + 30 >= player.duration()) {
		player.currentTime(player.duration() - 10);
		} else {
	
    player.currentTime(player.currentTime() + 30);
	}
  }
});
/* ADD BUTTON */
//var Button = videojs.getComponent('Button');

// Extend default
var NextButton = videojs.extend(Button, {
  //constructor: function(player, options) {
  constructor: function() {
    Button.apply(this, arguments);
  //  this.addClass('vjs-chapters-button');
  this.addClass('fa');
  this.addClass('vjs-hidden');
   this.addClass('thid');
    this.addClass('fa-chevron-right');
    this.controlText("Next");
  },

  handleClick: function() {
 //   console.log('click');
    player.playlist.next();
  }
});
	videojs.registerComponent('SNextButton', SNextButton);
videojs.registerComponent('NextButton', NextButton);
videojs.registerComponent('PrevButton', PrevButton);
videojs.registerComponent('SPrevButton',SPrevButton);
videojs.registerComponent('ShuButton',ShuButton);
//player.getChild('controlBar').addChild('SharingButton', {});
player.getChild('controlBar').addChild('SPrevButton', {}, 40);
player.getChild('controlBar').addChild('PrevButton', {}, 41);
player.getChild('controlBar').addChild('NextButton', {}, 43);
player.getChild('controlBar').addChild('SNextButton', {}, 44);
player.getChild('controlBar').addChild('ShuButton', {}, 56);
	});
	</script>
	<script>
	$(function(){

    // embed the video
   // embedYouTubeVideo();

    // bind events to the arrow keys
	
    $(document).keydown(function(e) {
		
	/*if (!$("video").is(":focus")) {
		console.log('focus:' + !$("video").is(":focus"));
	return; 
	}*/
	
//	if (player.hasStarted_)
if (!$(".input-group").is(":focus") && !$('#itemSearch').is(":focus") && !$('input[name=context-menu-input-name]').is(":focus")&& !$('textarea').is(":focus"))	{
	e.preventDefault();
        switch(e.which) {
		
         case 39:
	 // if  (!$("#edsea").is(":focus")) {
	if (player.currentTime() + 30 >= player.duration()) {
		player.currentTime(player.duration() - 10);
		} else {
	
    player.currentTime(player.currentTime() + 30);
	}//}
      break; 
      case 37:
    //   if  (!$("#edsea").is(":focus"))  {
	if (player.currentTime() - 30 < 0) {
		player.currentTime(0);
		} else {
	
    player.currentTime(player.currentTime() - 30);
	}// }
      break;
	  case 32:
    //   if  (!$("#edsea").is(":focus")) 
		$("button.vjs-play-control")[0].click();
      break;
	  case 13:
	/* if ($("#edsea").is(":focus"))	 {
		  geet(document.getElementById("edsea").value);
		   document.getElementById("edsea").blur();
		  document.getElementById("video").focus();
		 // window.location.hash = '?q='+document.getElementById("edsea").value;
		 } else {*/
     $("button.vjs-fullscreen-control").click();
	 document.getElementById("video").focus();
	// }
      break;
	  case 40:
	 // if  (!$("#edsea").is(":focus")) 
		 player.playlist.next();
	   //console.log('40');
      break;
	  case 34:
   //  if  (!$("#edsea").is(":focus"))  
	  pagee(1) ;
	   console.log('&page:'+page);
      break;
	  case 33:
   // if  (!$("#edsea").is(":focus"))  delay1(qu,page-1); 
	//   console.log('query='+qu+'&page:'+page);
	 pagee(-1) ;
	   console.log('&page:'+page);
      break;
	  case 38:
  //if  (!$("#edsea").is(":focus"))  
	  player.playlist.previous();
      break;	
		
            default: return; // exit this handler for other keys
		  
		}
		
		}
		 else if ($('#itemSearch').is(":focus") || $('input[name=context-menu-input-name]').is(":focus") || $('textarea').is(":focus") ){
		switch(e.which) {
		case 38:
		localStorage.fav0 = JSON.stringify(new_url[player.playlist.currentIndex()]);
		  break;	
		default: return;
		}
		} else {  return;  }
	/* } else {
	
 //document.getElementById("msg1").innerHTML = "Trigger";

 var key=e.keyCode || e.which;
 //e.preventDefault();
  if (key==13){
    // document.getElementById("msg1").innerHTML = document.getElementById("edsea").value;
	//window.location.hash = '?q='+document.getElementById("edsea").value;
	 geet(document.getElementById("edsea").value);
	}*/
 
 // 

	 
	 // e.preventDefault();
		// prevent the default action (scroll / move caret)
		 });
	
});</script>
        <!--iframe id="embed-video1" width="100%" height="100%"> </iframe-->
        </div>
	
      </div>      
    </div>
  </div>

<script type="text-html" id="template">
  <div class="col-sm-6 col-md-3 video" style="height: 315px" data-titulo="${title}" data-embed_url="${url}" data-url="${url}">
    <div class="thumbnail">
      <img src="${default_thumb}" style="cursor: pointer; height: 200px; width: 100%; display: block;" class="thumb-video">
      <div class="caption">
        <h3></h3>
        <p>${title}</p>
      </div>
    </div>
  </div>

</script>

<!--script src="red/libs/jquery-3.1.1.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script type="text/javascript" src="//ajax.microsoft.com/ajax/jquery.templates/beta1/jquery.tmpl.min.js"></script>

<script type="text/javascript">
 
var retorna,retorna1,ret,lists;
var vurl;
//if (location.search) 
var pesquisarVideos = function () 
{
 // debugger;
  var search = $("#itemSearch").val();

  $.ajax(
{
//search == und
  url: 'https://cccco.herokuapp.com/https://www.youporn.com/api/webmasters/search/?search=' + search,//double-penetration,teens',
 //url: '//cccco.herokuapp.com///www.redtube.com/2075478',
  method: 'GET',
  beforeSend: function ()
  {
    $("#div-loading").show();
  },
  success: function (retorno) 
  {
  
  retorna = retorno;
 $(".video").remove();
    $("#template").tmpl(retorno.video).appendTo('#conteudo');
  },
  error: function() 
  {
    alert('DEU RUIM');
  },
  complete: function ()
  {
 
    $("#div-loading").hide();
	if (itemSearch.value != location.search.substring(location.search.indexOf('=')+1)) history.pushState('getParams pageur','page getParams ur','?search='+itemSearch.value);
	lis1();
  }
});

}
 
 var pesquisarVideos2 = function (burl) 
{
	lists=new Array();
 // debugger;
  //var search = $("#itemSearch").val();

  $.ajax(
{
//search == und
  url: 'https://cccco.herokuapp.com/' + burl,//double-penetration,teens',
 //url: '//cccco.herokuapp.com///www.redtube.com/2075478',
  method: 'GET',
  beforeSend: function ()
  {
    $("#div-loading").show();
  },
  success: function (retorno) 
  {
  retorna = retorno.match(/(("|')(http|www).+?(\.mp4\?(.*?)\w+|\.mp4)('|"))/g);
  retorna = retorna.reverse();
  for (i=0;i<retorna.length;i++) {retorna[i] = retorna[i].replace(/\\/g,'').substring(1,retorna[4].replace(/\\/g,'').length -1); }
  //==each retorna[i].replace(/\\/g,'').substring(1,retorna[4].replace(/\\/g,'').length -1)
 //$(".video").remove();
    //$("#template").tmpl(retorno.video).appendTo('#conteudo');
	console.log("retorna::"+retorna);
  },
  error: function() 
  {
    alert('DEU RUIM');
  },
  complete: function ()
  {
 
    $("#div-loading").hide();
	//console.log("#JSON.parse(retorna)::"+JSON.parse(retorna));
	//console.log("#SON.stringify(retorna)::"+JSON.stringify(retorna));
  }
});

} 
    
$("#btn-search").on('click', pesquisarVideos);

$("#conteudo").on('click', '.thumb-video', function () 
{
	/*console.log('index1$("#conteudo").index(this)'+$("#conteudo").index(this));
	console.log('index1$("#conteudo").index($(this))'+$("#conteudo").index($(this)));
	console.log('index2$(this).index()'+$(this).index() );
	console.log('index2$(".thumb-video") '+$(".thumb-video").index(this) );*/
	 var elemento = $(this);
  var embed_url = elemento.closest('.video').data('embed_url');
  var burl = elemento.closest('.video').data('url');
   var titulo = elemento.closest('.video').data('titulo');
  if (player.playlistMenu && player.playlistMenu.items.length >2)
	{
$("#div-loading").hide();
	$(".modal-title").html(titulo);
		console.log('index'+$(".thumb-video").index(this));
		player.playlist.currentItem($(".thumb-video").index(this));
		 $("#myModal").modal();
		} else {
 // var titulo = elemento.closest('.video').data('titulo');
	  $.ajax(
{
		corsDomain: true,
 // url: '//cccco.herokuapp.com///api.redtube.com/?data=redtube.Videos.searchVideos&output=json&search=' + search,
 url: 'https://secret-falls-85795.herokuapp.com/api/info?url='+burl,
  method: 'GET',
  beforeSend: function ()
  {
    $("#div-loading").show();
  },
  success: function (retorno1) 
  {
  retorna1 = retorno1;
  	//   ret=JSON.parse(document.body.textContent);
vurl=retorna1.info.formats[0].url;
//$(".video").remove();
   // $("#template").tmpl(retorno.videos).appendTo('#conteudo');
  },
  error: function() 
  {
    alert('DEU RUIM');
  },
  complete: function ()
  {
if (!vurl) vurl=retorna1.info.formats[0].url;
    $("#div-loading").hide();
	$(".modal-title").html(titulo);
	player.src(vurl);
  //$('#embed-video')[0].src=vurl;
 // $("#embed-video").attr('src', vurl);// "//cccco.herokuapp.com/" + embed_url);

  $("#myModal").modal();
  }
});
}
 //vid1[1].videoUrl

  
})

</script><script>
if (!location.search) {
		page=1;
		//?search=double&tags[]=young&page=1
			var que = "?search=&category=&tags[]=&page=1";
			history.pushState('getParams pageur','page getParams ur',que);
			itemSearch.value = que.substring(que.indexOf('=')+1);
		} else {
		//itemSearch.value = getParams(location.href)['search'];
		itemSearch.value = location.search.substring(location.search.indexOf('=')+1);
		}
		/*if (getParams(location.href)['tags[]']) itemSearch.value +='&tags[]='+getParams(location.href)['tags[]'];
		}*///location.href.replace(location.search.substring(location.search.indexOf('=')+1),itemSearch.value)
		if (itemSearch.value != "" && lists1.length < 1) $('#btn-search').click();
		//if (!(itemSearch.value == location.search.substring(location.search.indexOf('=')+1))) history.pushState('getParams pageur','page getParams ur',location.href.replace(location.search.substring(location.search.indexOf('=')+1),itemSearch.value));
</script><script>
var sourcex=new Array(),sous=new Array();
$('input[type=text].form-control').on('keydown', function(e){ if (e.keyCode == 13)  $('#btn-search').click(), e.preventDefault() });
function lis0(i){
	var sous1=new Array();sourcex=new Array();lists1[i].formats.map(function(elem){sous1={ src: elem.url, type: 'video/mp4' };
    sourcex.push(sous1);
}).join(",");
return sourcex;
}
function lisx0(s){
	var sous1=new Array();sourcex=new Array();s.map(function(elem){sous1={ src: elem.url, type: 'video/mp4' };
    sourcex.push(sous1);
}).join(",");
return sourcex;
}
function lis1(){
	lists=new Array();
	lists1=new Array();
	var lists0=new Array();
	lists1.splice(0);
	$.each(retorna.video, function (i, f) {
	//lists0=getInfo(f.url);
	
getInfo(f.url);/*
sources=new Array();sous=new Array();i=0;lists1[10].formats.map(function(elem){sous={ src: elem.url, type: 'video/mp4' };
    sources.push(sous);return JSON.stringify(sources[i]);
}).join(",");*/

	
}) ;
}
function lis2(){
	 $("#div-loading").show();
/*	 sourcex=new Array(),sous=new Array();
i=0*/
	 
	var viii;
	$.each(retorna.video, function (i, f) {
	viii= (lists1[i].formats) ? lis0(i) : ([{ src: lists1[i].entries[0].formats[0].url, type: 'video/mp4' }]);
	
	//lists0=getInfo(f.url);
arpl = { name: f.title,
      description: f.title,
      duration: hmsToSecondsOnly(f.duration),sources: viii, thumbnail: [{  srcset: f.thumb, type: 'image/jpeg',  media: '(max-width: 28%;)'  }, {src: f.default_thumb  }  ], poster: f.default_thumb };
	  lists.push(arpl);

	
}) ;
/*$.each(retorna.video, function (i, f) {
	//lists0=getInfo(f.url);
	
{ name: 'vtit[i]',
      description: "vtit[i]",
      duration: "hmsToSecondsOnly(vdura[i])",sources: sources, thumbnail: "[{  srcset: vimg[i], type: 'image/jpeg',  media: '(max-width: 28%;)'  }, {src: vimg[i]        }  ]",poster: "vimg[i]" }

	arpl = { name: f.title,
      description: f.title,
      duration: hmsToSecondsOnly(f.duration),sources: [{ src: "https://secret-falls-85795.herokuapp.com/api/play?url="+f.url, type: 'video/mp4'  }] , thumbnail: [{  srcset: f.thumb, type: 'image/jpeg',  media: '(max-width: 28%;)'  }, {src: f.default_thumb  }  ], poster: f.default_thumb };
	  lists.push(arpl);
}) ;*/
player.playlist(lists,0);
							//player.playlistUi();
							player.playlistUi({horizontal: true});
							player.playlist.currentItem(0);
							
	$(".modal-title").html(lists[0].name);
	 $("#div-loading").hide();
						//	$("#myModal").modal();
						 document.title = lists[0].name;
	 $(".modal-title").html(lists[0].name);
}
function pagee(ii){
	page=parseInt(getParams(location.href).page);
	history.pushState('getParams pageur','page getParams ur',location.href.replace('&page='+page,'&page='+(parseInt(page)+ii)));	 
	itemSearch.value = location.href.substring(location.href.indexOf('=')+1);
	$('#btn-search')[0].click();
	}
var lxx=[];
function lxxx(iii){
	lists.forEach(function(item, index) { if (lists[index]) {lists[index].introduce =function(method){getInfo(retorna.video[index].url);var srcc = (sous.formats) ? lisx0(sous.formats) : lisx0(lists1[index].entries[0].formats[0].url); 
	lxx.push({ name: this.name, description: this.description,
      duration: this.duration, introduce: this.introduce, sources: srcc, thumbnail: this.thumbnail, poster: this.poster }
  ); 
  lxx[index].introduce = lists[index].introduce;
    return lxx[index];console.log(item.name)}}})
	}
	</script>
<script type="text/javascript" src="/js/keyMcmenu.js"></script>	
<!-- START doctoc generated TOC please keep comment here to allow auto update -->
<!-- DON'T EDIT THIS SECTION, INSTEAD RE-RUN doctoc TO UPDATE >
<ul>
<li><a href="#example-code">Example code</a></li>
<li><a href="#example-html">Example HTML</a></li>
</ul>
<!-- END doctoc generated TOC please keep comment here to allow auto update >
<p><span class="context-menu-one btn btn-neutral">right click me</span></p>
<h2 id="example-code">Example code</h2>
<script type="text/javascript" class="showcase">

</script>
<!--script type="text/javascript" class="showcase">  AQUI FUNCIONA
$(function(){
    $.contextMenu({
        selector: '.video', 
        items: {
            // <input type="text">
            name: {
                name: "Text", 
                type: 'text',
				id: 'ctxm',
                value: "Hello World", 
                events: {
                    keyup: function(e) {
                        // add some fancy key handling here?
                        window.console && console.log('key: '+ e.keyCode); 
                    }
                }
            },
            sep1: "---------",
            // <input type="checkbox">
            yesno: {
                name: "Boolean", 
                type: 'checkbox', 
                selected: true
            },
            sep2: "---------",
            // <input type="radio">
            radio1: {
                name: "Radio1", 
                type: 'radio', 
                radio: 'radio', 
                value: '1'
            },
            radio2: {
                name: "Radio2", 
                type: 'radio', 
                radio: 'radio', 
                value: '2', 
                selected: true
            },
            radio3: {
                name: "Radio3", 
                type: 'radio', 
                radio: 'radio', 
                value: '3'
            },
            radio4: {
                name: "Radio3", 
                type: 'radio', 
                radio: 'radio', 
                value: '4', 
                disabled: true
            },
            sep3: "---------",
            // <select>
            select: {
                name: "Select", 
                type: 'select', 
                options: {1: 'one', 2: 'two', 3: 'three'}, 
                selected: 2
            },
            // <textarea>
            area1: {
                name: "Textarea with height", 
                type: 'textarea', 
                value: "Hello World", 
                height: 40
            },
            area2: {
                name: "Textarea", 
                type: 'textarea', 
                value: "Hello World"
            },
            sep4: "---------",
            key: {
                name: "Something Clickable", 
                callback: $.noop
            }
        }, 
        events: {
            show: function(opt) {
                // this is the trigger element
                var $this = this;
                // import states from data store 
                $.contextMenu.setInputValues(opt, $this.data());
                // this basically fills the input commands from an object
                // like {name: "foo", yesno: true, radio: "3", &hellip;}
            }, 
            hide: function(opt) {
                // this is the trigger element
                var $this = this;
                // export states to data store
                $.contextMenu.getInputValues(opt, $this.data());
                // this basically dumps the input commands' values to an object
                // like {name: "foo", yesno: true, radio: "3", &hellip;}
            }
        }
    });
});
</script-->
<!--h2 id="example-html">Example HTML</h2>
<div style="display:none;" class="showcase" data-showcase-import=".context-menu-one"></div>
                </div>

                <footer>
                    <hr/>
                                            <div role="contentinfo">
                            <p>
                                Find jQuery contextMenu on <a href="https://github.com/swisnl/jQuery-contextMenu">GitHub</a>.
                            </p>
                        </div>
                                    </footer>

            </div>
        </div>

    </section>

</div>

<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.4/highlight.min.js"></script>
<script src="https://swisnl.github.io/jQuery-contextMenu/js/theme.js"></script>
<script>
    $(function() {
        hljs.configure({
            tabReplace: '    ', // 4 spaces
        });
        hljs.initHighlightingOnLoad();
    });
</script-->
</body>
</html>