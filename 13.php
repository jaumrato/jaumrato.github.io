<!DOCTYPE html>
<html lang="en">
	<head>
	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
	<link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	 <link href="https://swisnl.github.io/jQuery-contextMenu/dist/jquery.contextMenu.css" rel="stylesheet" type="text/css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://swisnl.github.io/jQuery-contextMenu/dist/jquery.contextMenu.js" type="text/javascript"></script>

    <script src="https://swisnl.github.io/jQuery-contextMenu/dist/jquery.ui.position.min.js" type="text/javascript"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://swisnl.github.io/jQuery-contextMenu/js/main.js" type="text/javascript"></script>
	<style class="vjs-styles-defaults">
	body {
    color: red;
    background-color: black;
    border-color: red;
	}
	
button {
    color: red;
    background-color: black;
    border-color: red;
}
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
BODY {
scrollbar-face-color: black;
scrollbar-highlight-color: <b>000000</b>;
scrollbar-3dlight-color: <b>000000</b>;
scrollbar-darkshadow-color: <b>000000</b>;
scrollbar-shadow-color: red;
scrollbar-arrow-color: <b>000000</b>;
scrollbar-track-color: <b>000000</b>;
}
#menu {
  position: fixed;
  z-index: 9999; /* Most times is 2000 used as middle */
  visibility: hidden;
  opacity: 0;
  
  padding: 0px;
  font-family: sans-serif;
  font-size: 11px;
  background: #fff;
  color: #555;
  border: 1px solid #C6C6C6;
  
  -webkit-transition: opacity .5s ease-in-out;
  -moz-transition: opacity .5s ease-in-out;
  transition: opacity .5s ease-in-out;
  
  -webkit-box-shadow: 2px 2px 2px 0px rgba(143, 144, 145, 1);
  -moz-box-shadow: 2px 2px 2px 0px rgba(143, 144, 145, 1);
  box-shadow: 2px 2px 2px 0px rgba(143, 144, 145, 1);
}

#menu a {
  display: block;
  color: #555;
  text-decoration: none;
  padding: 6px 8px 6px 30px;
  width: 250px;
  position: relative;
}

#menu a img,
#menu a i.fa {
  height: 20px;
  font-size: 17px;
  width: 20px;
  position: absolute;
  left: 5px;
  top: 2px;
}

#menu a span {
  color: #BCB1B3;
  float: right;
}

#menu a:hover {
  color: #fff;
  background: #3879D9;
}

#menu hr {
  border: 1px solid #EBEBEB;
  border-bottom: 0;
}



</style>
<!--script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script-->

<title>Video.js Playlist UI - Horizontal Implementation</title>
 <meta property="og:url"           content="https://bitube.cf<?php echo $_SERVER["REQUEST_URI"]; ?>" />
  <meta property="og:title"         content="<?php echo $videos[0][title]; ?>" />
  <meta property="og:description"   content="<?php echo $videos[0][title]; ?>" />
  <meta property="og:image"         content="<?php echo $videos[0][thumb]; ?>" />
  <meta property="og:image:height"    content="240px" />
  <meta property="og:image:width"    content="320px" />
  <meta property="fb:app_id"          content="1987914104557011" />
<!--link href="./full12_files/video-js.css" rel="stylesheet">
  <link href="./full12_files/videojs-playlist-ui.css" rel="stylesheet">
  <link href="./full12_files/examples.css" rel="stylesheet">
	<script src="./full12_files/jquery-1.10.2.js"></script>
<script src="./full12_files/jquery.min.js"></script-->
<!--link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"-->

<link href="vjs/node_modules/video.js/dist/video-js.css" rel="stylesheet">
  <link href="vjs/dist/videojs-playlist-ui.css" rel="stylesheet">
  <link href="vjs/examples.css" rel="stylesheet">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<!--script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script-->
 <link rel="stylesheet" media="screen" href="//vjs.zencdn.net/5.4.6/video-js.min.css">
 <link rel="stylesheet" media="screen" href="vjs-skin-red/vsg-skin.css">
<!--link href="./Horizontal-full_files/video-js.css" rel="stylesheet">
<link href="./Horizontal-full_files/videojs-playlist-ui.css" rel="stylesheet">
<link href="./Horizontal-full_files/examples.css" rel="stylesheet"-->
<script>var player,new_url,surl,hurl,p,q,c,page,catego,search,este,este1;
	var urlxph = 'https://www.pornhub.com/webmasters/search',urlxyp = 'https://www.youporn.com/api/webmasters/search/';
	     function hmsToSecondsOnly(str) {
    var p = str.split(':'),
        s = 0, m = 1;

    while (p.length > 0) {
        s += m * parseInt(p.pop(), 10);
        m *= 60;
    }

    return s;
}
	function getParams(ur){
	
		if (ur.indexOf('?') < 0) {
		page=1;
			ur = "?uhx="+url.value+"&search=&tags[]=&page=1&thumbsize=small";
			history.pushState('getParams pageur','page getParams ur',ur);
		}
		var nur = decodeURIComponent(ur);
	console.log('get ur= '+ur + ' nur=' + nur)
        var regex = /[?&]([^=#]+)=([^&#]*)/g,
		params = {},
		match;
        while(match = regex.exec(nur)) {
            params[match[1]] = match[2];
		}
		
        return params;
	} 
	
	function setsearch(ur){
		var txt,txt1= "";
		var querysite;
		if (ur.indexOf('tube.cf') > 0) { 
			querysite = {search:document.getElementById('edsearch').value, 'tags[]':document.getElementById('idcat').value, page:page,thumbsize:'small'}; 
			} else {
		querysite = getParams(location.href); 
		}
		var x,i;
		txt = "?";i=0;
		for (x in querysite) {
			// txt += "x"+x+"="+person[x] + " ";
			if (i >0)txt+="&"; txt += x+'='+querysite[x];i++;
		}
	return ur+txt; 
	}
	
	
		function xcount (querysite1) {
		if (querysite1.length<2) { 
		querysite1 = {uhx:url.value,search:document.getElementById('edsearch').value, 'tags[]':[document.getElementById('idcat').value,document.getElementById('idcat').value], page:page,thumbsize:'small'};
		}
		var txt = "?",x='',i=0;
		for (x in querysite1) {
			// txt += "x"+x+"="+person[x] + " ";
			if (i >0)txt+="&"; txt += x+'='+querysite1[x];i++;
		} if (txt.length >2)return txt;
		
		}
	function xsel() {
	txt="";
	for (i=0;i<idcat.selectedOptions.length;i++){ txt+=idcat.selectedOptions[i].value; if (i<idcat.selectedOptions.length-1)txt+=','; }
		if (txt.length >1)return txt;
		}
	function setParams(ur){
		
		var txt,txt1= "";
		var person = getParams(location.href); 
		var x,i;
		txt = "?";i=0;
		for (x in obj) {
			// txt += "x"+x+"="+person[x] + " ";
			if (i >0)txt+="&"; txt += x+'='+person[x];i++;
		}
		//document.getElementById("demo").innerHTML = txt.substring(0,txt.length-1); // txt1;
		console.log(txt)
		console.log('set ur= '+ur)
		if (ur.startsWith('?') || ur.indexOf('&') > -1 ) {
			ur = "?search=&tags[]=&page=1&thumbsize=small&urls=yp";
			history.pushState('pageur setParams','page setParams ur',ur);
		}
        var regex = /[?&]([^=#]+)=([^&#]*)/g,
		params = {},
		match;
        while(match = regex.exec(ur)) {
            params[match[1]] = match[2];
		}
		
        return params;
	}
</script>


<!--style id="sty" type="text/css">

</style-->
<div id="myhead"> <pre id="inyh" style="display: none;word-wrap: break-word; white-space: pre-wrap;"><?php include 'yh.php';?> </pre></div>
	<script>
	function metass(pro,content) {
	meta = document.createElement('meta');
meta.setAttribute('property','og:'+pro.substring(4));
meta.content = content;
document.getElementsByTagName('head')[0].appendChild(meta);
                  }
				  
/*	 document.onloadedmetadata(function() { 			  
($('meta[property="og:image"]').attr("content")  == undefined) ? metass("metaimage",player.poster()) : $('meta[property="og:image"]').attr("content",player.poster());
($('meta[property="og:url"]').attr("content")  == undefined) ? metass("metaurl",location.href) : $('meta[property="og:url"]').attr("content",location.href);
	 });*/
	</script>
	 <link href="//swisnl.github.io/jQuery-contextMenu/dist/jquery.contextMenu.css" rel="stylesheet" type="text/css" />
	
    <script src="//swisnl.github.io/jQuery-contextMenu/dist/jquery.contextMenu.js" type="text/javascript"></script>

    <script src="//swisnl.github.io/jQuery-contextMenu/dist/jquery.ui.position.min.js" type="text/javascript"></script>
</head>
<body style="">
	<div class="info" style="display: none;">
	<pre id="outx" style="display: none;word-wrap: break-word; white-space: pre-wrap;"> <!--?php echo json_encode($relati); ?--> </pre>
		<h1>Video.js Playlist UI - Horizontal Implementation</h1>
		<p>
			You can see the Video.js Playlist UI plugin in action below. Look at the
			source of this page to see how to use it with your videos.
		</p>
		<p>
			In the default configuration, the plugin looks for the first element that
			has the class "vjs-playlist" and uses that as a container for the list.
		</p>
		<p>
			When using the `horizontal` option, you'll want to set a width on the
			"vjs-playlist" element (or the class that gets added,
			"vjs-playlist-horizontal").
		</p></div>
		
		
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
			margin-top: 20px;
			/* top: 00px; */
			overflow: scroll;
			width: 100%;
			height: 100%;
			">
			
				<!--<ol class="vjs-playlist-item-list" id="the-node"></ol>
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
			function yp() {
			
		//	cmq 
							if (!page) page=1;
			//stri = "?search="+q;
			urls = url.value;
			//urls = document.querySelector('[name=url]:checked').value;
			//catego =document.querySelector('#idcat').value;
			c=idcat.value;
			q =document.querySelector('[name=search]').value;
			if (q == undefined) q="";
			if (c == undefined) c="";
			cmq = q;
			if (c == "" || q == "") {
				
				cmq = cmq.replace('-','');
			
				} 
				
hurl="?uhx="+urls+"&search="+cmq+"&tags[]="+xsel()+"&page="+page+"&thumbsize=small";
if (hurl.indexOf('undefined')>-1 ) {
				
				hurl = hurl.replace(/undefined/g,'');
			
				} 
				/*var qtop= location.search.substring(0,location.search.indexOf('&urls')>-1?location.search.indexOf('&urls') : location.search.length);
				if (burl.startsWith('?')) {
					(location.search.length) ? (location.href.indexOf('urls=yp')>-1 ? console.log('boa1='+(stri=urlxyp+burl)) : console.log('boa='+(stri=urlxph+burl))) : (console.log('maus'));
					//   stri = urlxyp+burl;
				} else 
				{
					(location.search.length) ? (location.href.indexOf('urls=yp')>-1 ? console.log('boa2='+(stri=urlxyp+qtop)) : console.log('boa='+(stri=urlxph+qtop))) : (console.log('maus'));
					// stri = qtop
					
				}*/
				//yh(encodeURIComponent('//www.youporn.com/api/webmasters/search/?search=anal&tags[]=dp&page=1&thumbsize=small'));
				if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				}
				else { // code for IE6, IE5 
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
						new_url = JSON.parse(xmlhttp.responseText);
						if (JSON.parse(xmlhttp.responseText).length) {
							$.each(new_url, function (i, f) { f.duration = hmsToSecondsOnly(f.duration); }) ;
							//my_addtoany_onshare(new_url);
							player.playlist(new_url,0);
							//player.playlistUi();
							player.playlistUi({horizontal: true});
							player.playlist.currentItem(0);
							console.log(new_url[0].name);
							return xmlhttp.responseText;
							} else {
							alert('No videos found try others options');
							
						} 
						//alert(xmlhttp.responseText);
					} 
				}
				xmlhttp.open("POST", "../yh.php"+hurl);
				//?uhx="+urls+encodeURIComponent("&search="+cmq+"&page="+page+"&thumbsize=small"));//"?search="+search+"&page="+page+"&thumbsize=small");//encodeURIComponent(stri));
				xmlhttp.send();
			}
			
			function py(burl) {
				hurl=burl;
				/*var qtop= location.search.substring(0,location.search.indexOf('&urls')>-1?location.search.indexOf('&urls') : location.search.length);
				if (burl.startsWith('?')) {
					(location.search.length) ? (location.href.indexOf('urls=yp')>-1 ? console.log('boa1='+(stri=urlxyp+burl)) : console.log('boa='+(stri=urlxph+burl))) : (console.log('maus'));
					//   stri = urlxyp+burl;
				} else 
				{
					(location.search.length) ? (location.href.indexOf('urls=yp')>-1 ? console.log('boa2='+(stri=urlxyp+qtop)) : console.log('boa='+(stri=urlxph+qtop))) : (console.log('maus'));
					// stri = qtop
					
				}*/
				//yh(encodeURIComponent('//www.youporn.com/api/webmasters/search/?search=anal&tags[]=dp&page=1&thumbsize=small'));
				if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				}
				else { // code for IE6, IE5 
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
						new_url = JSON.parse(xmlhttp.responseText);
						if (JSON.parse(xmlhttp.responseText).length) {
							$.each(new_url, function (i, f) { f.duration = hmsToSecondsOnly(f.duration); }) ;
							//my_addtoany_onshare(new_url);
							player.playlist(new_url,0);
							//player.playlistUi();
							player.playlistUi({horizontal: true});
							player.playlist.currentItem(0);
							console.log(new_url[0].name);
							return xmlhttp.responseText;
							} else {
							alert('No videos found try others options');
							
						} 
						//alert(xmlhttp.responseText);
					} 
				}
				xmlhttp.open("POST", "/yh.php"+burl);
				xmlhttp.send();
			}
			
			function yh() {
								if (!page) page=1;
			//stri = "?search="+q;
			urls = url.value;
			//urls = document.querySelector('[name=url]:checked').value;
			catego =document.querySelector('#idcat').value;
			c=idcat.value;
			q =document.querySelector('[name=search]').value;
			if (q == undefined) q="";
			if (c == undefined) c="";
			cmq = q+'-'+c;
			if (c == "" || q == "") {
				
				cmq = cmq.replace('-','');
			
				} 
				
hurl="?uhx="+urls+"&search="+cmq+"&tags[]="+xsel()+"&page="+page+"&thumbsize=small";
if (hurl.indexOf('undefined')>-1 ) {
				
				hurl = hurl.replace(/undefined/g,'');
			
				} 
			/*	var qtop= location.search.substring(0,location.search.indexOf('&urls')>-1?location.search.indexOf('&urls') : location.search.length);
				if (burl.startsWith('?')) {
					(location.search.length) ? (location.href.indexOf('urls=yp')>-1 ? console.log('boa1='+(stri=urlxyp+burl)) : console.log('boa='+(stri=urlxph+burl))) : (console.log('maus'));
					//   stri = urlxyp+burl;
				} else 
				{
					(location.search.length) ? (location.href.indexOf('urls=yp')>-1 ? console.log('boa2='+(stri=urlxyp+qtop)) : console.log('boa='+(stri=urlxph+qtop))) : (console.log('maus'));
					// stri = qtop
					
				}*/
				//hurl="?url="+encodeURIComponent(stri);
				//yh(encodeURIComponent('//www.youporn.com/api/webmasters/search/?search=anal&tags[]=dp&page=1&thumbsize=small'));
				if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				}
				else { // code for IE6, IE5 
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
						new_url = JSON.parse(xmlhttp.responseText);
						if (JSON.parse(xmlhttp.responseText).length) {
							$.each(new_url, function (i, f) { f.duration = hmsToSecondsOnly(f.duration); }) ;
							//my_addtoany_onshare(new_url);
							player.playlist(new_url,0);
							//player.playlistUi();
							player.playlistUi({horizontal: true});
							player.playlist.currentItem(0);
							console.log(new_url[0].name);
							return xmlhttp.responseText;
							} else {
							alert('No videos found try others options');
							
						} 
						//alert(xmlhttp.responseText);
					} 
				}
				//xmlhttp.open("POST", "/yh.php?url="+encodeURIComponent(stri));
				xmlhttp.open("POST", "/yh.php+"+hurl);
				xmlhttp.send();
			}
		player.ready(function() {  
			
			 $("video")[0].addEventListener("loadeddata", function () {

var vid = document.getElementById("video");
vid.onplaying = function() {
    alert("The video is now playing");
};


			if (new_url) { document.title = new_url[player.playlist.currentIndex()].name;
			/* ($('meta[property="og:image"]').attr("content")  == undefined) ? metass("metaimage",player.poster()) : $('meta[property="og:image"]').attr("content",player.poster());
($('meta[property="og:url"]').attr("content")  == undefined) ? metass("metaurl",location.href) : $('meta[property="og:url"]').attr("content",location.href);*/
			}
			 // document.write('<script src="load_essentials.js">< /script>');
			});
			
			});
			
			function loadfav() {
			player = videojs('video');
			var y=0,x=0;
			var loa = new Array();
			new_url = loa;
			for (var i = 0; i < localStorage.length; i++) {
			// txt += "x"+x+"="+person[x] + " ";localStorage.length
			//if (i >0)txt+="&"; txt += x+'='+person[x];i++;
			lol=localStorage.key(i);if (lol.startsWith('fav') && lol.indexOf('fav') >-1  && lol.length > 3) {loa.push(JSON.parse(localStorage[lol])); x++; console.log('fav='+lol.substring(3)+' \ncount favs='+x+' \nindex:'+i);}
			new_url = loa;
			player.playlist(loa,0);
			player.playlistUi({horizontal: true});
			
		}
				//lol=localStorage.key(i++);if (lol.startsWith('fav') && lol.indexOf('fav') >-1  && lol.length > 3) {loa.push(JSON.parse(localStorage[lol])); x++; console.log('fav='+lol.substring(3)+' \ncount favs='+x+' \nindex:'+i);}
				
				}
		</script>
		<div>
		<form id="myform" action="javascript:py(process());" onsubmit="document.getElementById('edsearch').blur()">
			
 

 
<div style="float: left;color: red;
    background-color: black;"><select id="url" name="uhx">
	<option value="yp">Search from: Site1</option>
	<option value="ph">Site2</option>
    <!--option value="https://www.youporn.com/api/webmasters/search/">Search from: Site1</option>
	<option value="https://www.pornhub.com/webmasters/search">Site2</option-->
  </select>		<!--div id="uhost"><label><input type="radio" name="url" checked="" value="https://www.youporn.com/api/webmasters/search/">YOUPORN SEARCH</label><br>
<label><input type="radio" name="url" value="https://www.pornhub.com/webmasters/search">PORNHUB SEARCH</label></div--><input type="text" id="edsearch" name="search">
<select name="tags[]" id="idcat" multiple="true"  style="    width: 150px;    height: 45px;	color: red;    background-color: black;"><option value="">Tags:</option><option value="Amateur">Amateur</option><option value="Anal%20Masturbation">Anal Masturbation</option><option value="Anal%20Sex">Anal Sex</option><option value="Animated">Animated</option><option value="Asian">Asian</option><option value="Bareback">Bareback</option><option value="Bathroom">Bathroom</option><option value="BBW">BBW</option><option value="Behind%20the%20Scenes">Behind the Scenes</option><option value="Big%20Ass">Big Ass</option><option value="Big%20Cock">Big Cock</option><option value="Big%20Tits">Big Tits</option><option value="Bikini">Bikini</option><option value="Bisexual">Bisexual</option><option value="Black-haired">Black-haired</option><option value="Blonde">Blonde</option><option value="Blowjob">Blowjob</option><option value="Bondage">Bondage</option><option value="Boots">Boots</option><option value="Brunette">Brunette</option><option value="Bukkake">Bukkake</option><option value="Car">Car</option><option value="Cartoon">Cartoon</option><option value="Caucasian">Caucasian</option><option value="Celebrity">Celebrity</option><option value="CFNM">CFNM</option><option value="Chubby">Chubby</option><option value="Compilation">Compilation</option><option value="Couple">Couple</option><option value="Cream%20Pie">Cream Pie</option><option value="Cum%20Shot">Cum Shot</option><option value="Cum%20Swap">Cum Swap</option><option value="Deepthroat">Deepthroat</option><option value="Domination">Domination</option><option value="Double%20Penetration">Double Penetration</option><option value="Ebony">Ebony</option><option value="Facial">Facial</option><option value="Fat">Fat</option><option value="Female-Friendly">Female-Friendly</option><option value="Femdom">Femdom</option><option value="Fetish">Fetish</option><option value="Fisting">Fisting</option><option value="Footjob">Footjob</option><option value="Funny">Funny</option><option value="Gagging">Gagging</option><option value="Gangbang">Gangbang</option><option value="Gay">Gay</option><option value="Gay%20Couple">Gay Couple</option><option value="Gay%20Group%20Sex">Gay Group Sex</option><option value="German">German</option><option value="Glamour">Glamour</option><option value="Glasses">Glasses</option><option value="Glory%20Hole">Glory Hole</option><option value="Granny">Granny</option><option value="Group%20Sex">Group Sex</option><option value="Gym">Gym</option><option value="Hairy">Hairy</option><option value="Handjob">Handjob</option><option value="Hentai">Hentai</option><option value="High%20Heels">High Heels</option><option value="Hospital">Hospital</option><option value="Indian">Indian</option><option value="Interracial">Interracial</option><option value="Japanese">Japanese</option><option value="Kissing">Kissing</option><option value="Latex">Latex</option><option value="Latin">Latin</option><option value="Lesbian">Lesbian</option><option value="Licking%20Vagina">Licking Vagina</option><option value="Lingerie">Lingerie</option><option value="Maid">Maid</option><option value="Massage">Massage</option><option value="Masturbation">Masturbation</option><option value="Mature">Mature</option><option value="Midget">Midget</option><option value="MILF">MILF</option><option value="Muscular">Muscular</option><option value="Nurse">Nurse</option><option value="Office">Office</option><option value="Oral%20Sex">Oral Sex</option><option value="Oriental">Oriental</option><option value="Outdoor">Outdoor</option><option value="Pantyhose">Pantyhose</option><option value="Party">Party</option><option value="Peeing">Peeing</option><option value="Piercings">Piercings</option><option value="Police">Police</option><option value="Pool">Pool</option><option value="Pornstar">Pornstar</option><option value="Position%2069">Position 69</option><option value="POV">POV</option><option value="Pregnant">Pregnant</option><option value="Public">Public</option><option value="Redhead">Redhead</option><option value="Rimming">Rimming</option><option value="Romantic">Romantic</option><option value="Russian">Russian</option><option value="School">School</option><option value="Secretary">Secretary</option><option value="Shaved">Shaved</option><option value="Shemale">Shemale</option><option value="Skinny">Skinny</option><option value="Small%20Tits">Small Tits</option><option value="Solo%20Gay">Solo Gay</option><option value="Solo%20Girl">Solo Girl</option><option value="Solo%20Male">Solo Male</option><option value="Spanking">Spanking</option><option value="Spectacular">Spectacular</option><option value="Spycam">Spycam</option><option value="Squirting">Squirting</option><option value="Stockings">Stockings</option><option value="Strap-on">Strap-on</option><option value="Striptease">Striptease</option><option value="Swallow">Swallow</option><option value="Tattoos">Tattoos</option><option value="Teen">Teen</option><option value="Threesome">Threesome</option><option value="Titfuck">Titfuck</option><option value="Toilet">Toilet</option><option value="Toys">Toys</option><option value="Tribbing">Tribbing</option><option value="Uniform">Uniform</option><option value="Vaginal%20Masturbation">Vaginal Masturbation</option><option value="Vaginal%20Sex">Vaginal Sex</option><option value="Vintage">Vintage</option><option value="Wanking">Wanking</option><option value="Webcam">Webcam</option><option value="Young%20&%20Old">Young & Old</option></select>
<input type="submit">
  <input type="reset">
</div></form> <div align="center"style="float: left;color: red;
    background-color: black;">
<button class="previous_page" title="Previous page" onclick="pagee(-1); " ><i class="material-icons">navigate_before</i>Previous page</button><button class="next_page" title="Next page" onclick="pagee(1); " >Next page<i class="material-icons">navigate_next</i></button>
</div>
 <!--input type="file">
 <input type="submit"> 
  <input type="reset">
 
  <input type="hidden">
 window[document.getElementById('urlss').value]
  <input type="image">
  <input type="password">
  <input type="radio"-->
  
 
 
  
 


 
</div>
 
<script>
	function process() {
  var form = document.getElementById('myform');
  var elements = form.elements;
  var values = [];
var sear;
sear = '?';
  for (var i = 0; i < elements.length-2; i++)
    values.push(encodeURIComponent(elements[i].name) + '=' + encodeURIComponent(elements[i].value));

 // form.action
  sear += values.join('&');
  console.log(sear);
  return sear;
}
function pagee(np) {
	urls = url.value;
			//urls = document.querySelector('[name=url]:checked').value;
			catego =document.querySelector('#idcat').value;
			c=catego;
			q =document.querySelector('[name=search]').value;
			if (q == undefined) q="";
			if (c == undefined) c="";
			cmq = q;
			if (c == "" || q == "") {
				
				cmq = cmq.replace('-','');
			
				} 
		if (!location.search) {page=1;location.href = "?uhx="+urls+"&search="+cmq+"&tags[]=&page="+page+"&thumbsize=small"; }
	if (hurl.indexOf('page')<0) { page=1; }
else {	page=parseInt(getParams(hurl).page);}
	if (page >1 || np > -1){
	history.pushState('pageur','page ur',hurl=hurl.replace('page='+getParams(hurl).page,'page='+(page=parseInt(getParams(hurl).page)+np)));
	py(hurl);
	} else {
	alert("This is the first page") 
	
	}
	console.log(hurl);
}

	/*
	document.mainForm.onclick = function(){
    var radVal = document.mainForm.rads.value;
    result.innerHTML = 'You selected: '+radVal;
}
	
	/*
var input = $( "form input:checkbox" )
  .wrap( "<span></span>" )
  .parent()
  .css({
    background: "yellow",
    border: "3px red solid"
  });*/
 
<!-- $( "div" ) -->
  <!-- .text( "For this type jQuery found " + input.length + "." ) -->
  <!-- .css( "color", "red" ); -->
 
// Prevent the form from submitting
/*
$( "form" ).submit(function( event ) {
    event.preventDefault();
});*/
</script>
<!--div class="container">
  <form>
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
      </div>
    </div>
    <fieldset class="form-group row">
      <legend class="col-form-legend col-sm-2">Radios</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
            Option one is this and that&mdash;be sure to include why it's great
          </label>
        </div>
        <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
            Option two can be something else and selecting it will deselect option one
          </label>
        </div>
        <div class="form-check disabled">
          <label class="form-check-label">
            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>
            Option three is disabled
          </label>
        </div>
      </div>
    </fieldset>
    <div class="form-group row">
      <label class="col-sm-2">Checkbox</label>
      <div class="col-sm-10">
        <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox"> Check me out
          </label>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Sign in</button>
      </div>
    </div>
  </form>
</div-->
		<!--script src="//code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script-->
<!--script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script-->


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
if (!$("#myform").is(":focus") && !$('[name=search]').is(":focus"))	{
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
		 else if ($('[name=search]').is(":focus")){
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
	
});

/*	document.mainForm.onclick = function(){
    var radVal = document.mainForm.rads.value;
result.innerHTML = 'You selected: '+radVal;
}*/
function uhxLoad()
        {
		urls = url.value;
			//urls = document.querySelector('[name=url]:checked').value;
			catego =document.querySelector('#idcat').value;
			c=catego;
			q =document.querySelector('[name=search]').value;
			if (q == undefined) q="";
			if (c == undefined) c="";
			cmq = q;
			if (q == "") {
				
				cmq = cmq.replace('-','');
			
				} 
		if (!location.search) {page=1;location.href = "?uhx="+urls+"&search="+cmq+"&tags[]=&page="+page+"&thumbsize=small"; }
          if (location.href.indexOf('uhx') > -1) { 
			  url.value = getParams(location.href).uhx;
			  document.querySelector('[name=search]').value = getParams(location.href).search;
			  page=parseInt(getParams(location.href).page); 
			  var valuestags=getParams(location.href)['tags[]'];
			  if($('#idcat option:selected').length >0) $('#idcat option:selected').each(function(){ $(this)[0].selected = false; });
$.each(valuestags.split(","), function(i,e){
    $("#idcat option[value='" + encodeURI(e) + "']").prop("selected", true);
});
hurl=location.search;
			  py(hurl);
			  
			  }
         
        }
window.onload = uhxLoad;
</script>
<script>
	/*player = videojs(document.querySelector('#my-player'), {
      inactivityTimeout: 0
    });*/
//	$(document).ready(function() {
	player.ready(function() {
	try {
      // try on ios
      player.volume(0);
    } catch (e) {}
	
	var Button = videojs.getComponent('Button');
//$('ol')[0].id='the-node';
// Extend default
var PrevButton = videojs.extend(Button, {
  //constructor: function(player, options) {
  constructor: function() {
    Button.apply(this, arguments);
  //  this.addClass('vjs-chapters-button');
 //   this.addClass('icon-angle-left');
	this.addClass('fa');
    this.addClass('fa-chevron-left');
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
    this.addClass('icon-fa-backward');
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
    this.addClass('icon-fa-forward');
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
player.getChild('controlBar').addChild('SPrevButton', {}, 0);
player.getChild('controlBar').addChild('PrevButton', {}, 1);
player.getChild('controlBar').addChild('NextButton', {}, 3);
player.getChild('controlBar').addChild('SNextButton', {}, 4);
player.getChild('controlBar').addChild('ShuButton', {}, 56);


	});
	</script>
	 <!--script type="text/javascript">// class="showcase"
	var este;
	if ($('.vjs-playlist-item-list li').length > 0){
  $(function(){
    $('.vjs-playlist-item-list').contextMenu({
        selector: 'li', 
        callback: function(key, options) {
		este = $(this);
            var m = "clicked: " + key + " on " + $(this).text()+ " tag " + $(this)[0].tagName.toLowerCase();
            window.console && console.log(m); 
			if (este[0].firstChild.children[0].tagName.toLocaleLowerCase() == 'img')
			{  
				console.log(este.children().find('img')[0].src);
				switch(key) {
				 case 'cut':
				 
				 console.log(este.children().find('img')[0].alt);
				  break; 
				  case 'share':
				   window.open('https://api.whatsapp.com/send?text='+encodeURIComponent(document.location.href + '  ' + document.title+ ' https://kvdm8.app.goo.gl/?link='+document.location.href+'=org.val.html5webview&afl=https://x.bitube.cf/2oOH8d4'), '_blank');
//				 				'<a href="https://api.whatsapp.com/send?text='+encodeURIComponent(document.location.href + '  ' + document.title+ ' https://kvdm8.app.goo.gl/?link='+document.location.href+'=org.val.html5webview&afl=https://x.bitube.cf/2oOH8d4')+'" target="_blank">Assistir no app</a>
//window.open(
				 console.log(este.children().find('img')[0].alt);
				  break; 
				  default: return;
				}
				}
        },
        items: {
            "edit": {name: "Edit", icon: "edit"},
            "cut": {name: "Cut", icon: "cut"},
            "WhatsApp": {name: "WhatsApp", icon: "ico_whatsapp.png"},
            "paste": {name: "Paste", icon: "paste"},
            "delete": {name: "Delete", icon: "delete"},
            "sep1": "---------",
            "quit": {name: "Quit", icon: function($element, key, item){ return 'context-menu-icon context-menu-icon-quit'; }}
        }
    });
	});}
</script-->
<!--div id="menu">
  <a href="#">
    <img src="//puu.sh/nr60s/42df867bf3.png" /> AdBlock Plus <span>Ctrl + ?!</span>
  </a>
  <a href="#">
    <img src="//puu.sh/nr5Z6/4360098fc1.png" /> SNTX <span>Ctrl + ?!</span>
  </a>
  <hr />
  <a href="#">
    <i class="fa fa-fort-awesome"></i> Fort Awesome <span>Ctrl + ?!</span>
  </a>
  <a href="#" >
    <i class="fa fa-flag"></i> Font Awesome <span>Ctrl + ?!</span>
  </a>
   <a href="#" icon="ico_twitter.png" onclick="window.open('//twitter.com/intent/tweet?text=' + this.find('img')[0].src);">
    <i class="fa fa-twitter" icon="ico_twitter.png"></i> Twitter <span>Ctrl + ?!</span>
  </a>
   <a href="#" icon="ico_whatsapp.png" onclick="este=$(this);window.open('//api.whatsapp.com/send?text='+este[0].querySelectorAll('li img')[0].alt +'%20'+este[0].querySelectorAll('li img')[0].src +'%20' + encodeURIComponent(window.location.href));">
    <i class="fa fa-whatsapp" aria-hidden="true"></i> whatsapp <span>Ctrl + l</span>
  </a>
   <a href="#" label="Refresh" onclick="window.location.reload();" icon="ico_reload.png">
	    <i class="fa fa-refresh" aria-hidden="true"></i> Reload</a>
</div>
<script>
var i = document.getElementById("menu").style;

if (document.addEventListener) {
  document.addEventListener('contextmenu', function(e) {
    var posX = e.clientX;
    var posY = e.clientY;
    menu(posX, posY);
    e.preventDefault();
  }, false);
  document.addEventListener('click', function(e) {
    i.opacity = "0";
	este=$(this);este1=e;
    setTimeout(function() {
      i.visibility = "hidden";
    }, 501);
  }, false);
} else {
  document.attachEvent('oncontextmenu', function(e) {
    var posX = e.clientX;
    var posY = e.clientY;
    menu(posX, posY);
    e.preventDefault();
  });
  document.attachEvent('onclick', function(e) {
    i.opacity = "0";
    setTimeout(function() {
      i.visibility = "hidden";
    }, 501);
  });
}

function menu(x, y) {
  i.top = y + "px";
  i.left = x + "px";
  i.visibility = "visible";
  i.opacity = "1";
}*//*
$('#inyh').load('https://cccco.herokuapp.com/'+player.src().substring(player.src().indexOf('=')+1))
//sourcesM = JSON.parse($('#inyh')[0].textContent.substring($('#inyh')[0].textContent.indexOf('"mediaDefinitions":[')+'"mediaDefinitions":'.length,$('#inyh')[0].textContent.indexOf(',"video_unavailable_country":')))
sourcesM = JSON.parse($('#inyh')[0].textContent.match(/(("|')(http|www).+?(\.mp4\?(.*?)\w+|\.mp4)('|"))/g));
$('#inyh').html(' ');
player.playlistMenu.items[0].item.sources.push({ src: sourcesM[3].substring(1,sourcesM[3].length-1), type: 'video/mp4' })

*/
</script>
<!--link href="//vjs.zencdn.net/5.11.9/video-js.css" rel="stylesheet">
<script src="//vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
<div id="conteudo"></div-->
<!--?php $url="https://www.youporn.com/watch/14183645/sislovesme-2017-compilation-of-step-sisters-getting-young-pussies-fucked/";?>
<video id="my-video3" class="video-js" muted controls preload="auto" width="640" height="264"
poster="<?php  echo json_decode(getph($url))->image; ?>" data-setup="{}">
<source src="<?php echo json_decode(getph($url))->mp4high; ?>" type='video/mp4'>
<source src="https://theyouheroppa.herokuapp.com/api/play?url=https://pt.pornhub.com/view_video.php?viewkey=ph59a3dfbf87fb9" type='video/mp4'>
</video>


<title >< ?php echo json_decode(getph($url))->title; ?></title-->
	</body></html>