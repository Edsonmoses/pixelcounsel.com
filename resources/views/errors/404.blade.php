<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
      /*  @import url("https://fonts.googleapis.com/css?family=Fira+Sans");
    /*Variables*
    .left-section .inner-content {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
    }
    
    * {
      box-sizing: border-box;
    }
    
    html, body {
      margin: 0;
      padding: 0;
    }
    
    body {
      font-family: "Fira Sans", sans-serif;
      color: #f5f6fa;
    }
    
    .background {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(#0C0E10, #446182);
    }
    .background .ground {
      position: absolute;
      bottom: 0;
      width: 100%;
      height: 25vh;
      background: #0C0E10;
    }
    @media (max-width: 770px) {
      .background .ground {
        height: 0vh;
      }
    }
    
    .container {
      position: relative;
      margin: 0 auto;
      width: 85%;
      height: 100vh;
      padding-bottom: 25vh;
      display: flex;
      flex-direction: row;
      justify-content: space-around;
    }
    @media (max-width: 770px) {
      .container {
        flex-direction: column;
        padding-bottom: 0vh;
      }
    }
    
    .left-section, .right-section {
      position: relative;
    }
    
    .left-section {
      width: 40%;
    }
    @media (max-width: 770px) {
      .left-section {
        width: 100%;
        height: 40%;
        position: absolute;
        top: 0;
      }
    }
    @media (max-width: 770px) {
      .left-section .inner-content {
        position: relative;
        padding: 1rem 0;
      }
    }
    
    .heading {
      text-align: center;
      font-size: 9em;
      line-height: 1.3em;
      margin: 2rem 0 0.5rem 0;
      padding: 0;
      text-shadow: 0 0 1rem #fefefe;
    }
    @media (max-width: 770px) {
      .heading {
        font-size: 7em;
        line-height: 1.15;
        margin: 0;
      }
    }
    
    .subheading {
      text-align: center;
      max-width: 480px;
      font-size: 1.5em;
      line-height: 1.15em;
      padding: 0 1rem;
      margin: 0 auto;
    }
    @media (max-width: 770px) {
      .subheading {
        font-size: 1.3em;
        line-height: 1.15;
        max-width: 100%;
      }
    }
    
    .right-section {
      width: 50%;
    }
    @media (max-width: 770px) {
      .right-section {
        width: 100%;
        height: 60%;
        position: absolute;
        bottom: 0;
      }
    }
    
    .svgimg {
      position: absolute;
      bottom: 0;
      padding-top: 10vh;
      padding-left: 1vh;
      max-width: 100%;
      max-height: 100%;
    }
    @media (max-width: 770px) {
      .svgimg {
        padding: 0;
      }
    }
    .svgimg .bench-legs {
      fill: #0C0E10;
    }
    .svgimg .top-bench, .svgimg .bottom-bench {
      stroke: #0C0E10;
      stroke-width: 1px;
      fill: #5B3E2B;
    }
    .svgimg .bottom-bench path:nth-child(1) {
      fill: #432d20;
    }
    .svgimg .lamp-details {
      fill: #202425;
    }
    .svgimg .lamp-accent {
      fill: #2c3133;
    }
    .svgimg .lamp-bottom {
      fill: linear-gradient(#202425, #0C0E10);
    }
    .svgimg .lamp-light {
      fill: #EFEFEF;
    }
    
    @keyframes glow {
      0% {
        text-shadow: 0 0 1rem #fefefe;
      }
      50% {
        text-shadow: 0 0 1.85rem #ededed;
      }
      100% {
        text-shadow: 0 0 1rem #fefefe;
      }
    }*/
    @import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300);

body {
	background-color: #335B67;
	background: -ms-radial-gradient(ellipse at center,  #335B67 0%, #2C3E50 100%) fixed no-repeat;
	background: -moz-radial-gradient(ellipse at center,  #335B67 0%, #2C3E50 100%) fixed no-repeat;
	background: -o-radial-gradient(ellipse at center, #335B67 0%, #2C3E50 100%) fixed no-repeat;
	background: -webkit-gradient(radial, center center, 0, center center, 497, color-stop(0, #335B67), color-stop(1, #2C3E50));
	background: -webkit-radial-gradient(ellipse at center,  #335B67 0%, #2C3E50 100%) fixed no-repeat;
	background: radial-gradient(ellipse at center, #335B67 0%, #2C3E50 100%) fixed no-repeat;
	font-family: 'Source Sans Pro', sans-serif;
	-webkit-font-smoothing: antialiased;
	margin: 0px;
}

::selection {
	background-color: rgba(0,0,0,0.2);
}

::-moz-selection {
	background-color: rgba(0,0,0,0.2);
}
	

a {
	color: white;
	text-decoration: none;
	border-bottom: 1px solid rgba(255,255,255,0.5);
	transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	-webkit-transition: all 0.5s ease;
	margin-right: 10px;
}

a:last-child { margin-right: 0px; }

a:hover {
	text-shadow: 0px 0px 1px rgba(255,255,255,.5);
	border-bottom: 1px solid rgba(255,255,255,1);
}

#noscript-warning {
	width: 100%;
	text-align: center;
	background-color: rgba(0,0,0,0.2);
	font-weight: 300;
	color: white;
	padding-top: 10px;
	padding-bottom: 10px;
}



/* === WRAP === */

#wrap {
	width: 80%;
	max-width: 1400px;
	margin:0 auto;
	height: auto;
	position: relative;
	margin-top: 8%;
}



/* === MAIN TEXT CONTENT === */

#main-content {
	float: right;
	max-width: 45%;
	color: white;
	font-weight: 300;
	font-size: 18px;
	padding-bottom: 40px;
	line-height: 28px;
}

#main-content h1 {
	margin: 0px;
	font-weight: 400;
	font-size: 42px;
	margin-bottom: 40px;
	line-height: normal;
}



/* === NAVIGATION BUTTONS === */

#navigation { margin-top: 2%; }

#navigation a.navigation {
	display: block;
	float: left;
	background-color: rgba(0,0,0,0.2);
	padding-left: 15px;
	padding-right: 15px;
	color: white;
	height: 41px;
	line-height: 41px;
	text-decoration: none;
	font-size: 16px;
	transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	-webkit-transition: all 0.5s ease;
	margin-right: 2%;
	margin-bottom: 2%;
	border-bottom: none;
}

#navigation a.navigation i { line-height: 41px; }

#navigation a.navigation:hover {
	background-color: rgba(255,241,0,0.7);
	border-bottom: none;
}



/* === WORDSEARCH === */

#wordsearch {
	width: 45%;
	float: left;
}

#wordsearch ul {
	margin: 0px;
	padding: 0px;
}

#wordsearch ul li {
	float: left;
	width: 12%;
	background-color: rgba(0,0,0,.2);
	list-style: none;
	margin-right: 0.5%;
	margin-bottom: 0.5%;
    padding: 0;
    display: block;
    text-align: center;
    color: rgba(255,255,255,0.7);
    text-transform: uppercase;
    overflow: hidden;
    font-size: 24px;
    font-size: 1.6vw;
    font-weight: 300;
    transition: background-color 0.75s ease;
    -moz-transition: background-color 0.75s ease;
    -webkit-transition: background-color 0.75s ease;
    -o-transition: background-color 0.75s ease;
}

#wordsearch ul li.selected {
	background-color: rgba(255,241,0,0.7);
	color: rgba(255,255,255,1);
	font-weight: 400;
}



/* === SEARCH FORM === */

#search { margin-top: 30px; }

#search input[type='text'] {
	width: 88%;
	height: 41px;
	padding-left: 15px;
	padding-rigt: 15px;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
	background-color: rgba(0,0,0,0.2);
	border: none;
	outline: none;
	-webkit-appearance: none;
	font-size: 16px;
	font-weight: 300;
	color: white;
	font-family: 'Source Sans Pro', sans-serif;
	transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	-webkit-transition: all 0.5s ease;
	border-radius: 0px;
}

#search .input-search {
	width: 10%;
	float: right;
	height: 41px;
	background-color: rgba(0,0,0,0.2);
	outline: none;
	border: none;
	-webkit-appearance: none;
	font-family: 'Source Sans Pro', sans-serif;
	color: white;
	font-weight: 300;
	font-size: 16px;
	cursor: pointer;
	transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	-webkit-transition: all 0.5s ease;
	text-align: center;
}

#search .input-search:hover {
	background-color: rgba(26,188,156,0.7);
}



/* === RESPONSIVE CSS === */

@media all and (max-width: 899px) {
	#wrap { width: 90%; }
}

@media all and (max-width: 799px) {
	#wrap { width: 90%; height: auto; margin-top: 40px; top: 0%; }
	#wordsearch { width: 90%; float: none; margin:0 auto; }
	#wordsearch ul li { font-size: 4vw; }
	#main-content { float: none; width: 90%; max-width: 90%; margin:0 auto; margin-top: 30px; text-align: justify; }
	#main-content h1 { text-align: left; }
	#search input[type='text'] { width: 84%; }
	#search .input-search { width: 15%; }
}

@media all and (max-width: 499px) {
	#main-content h1 { font-size: 28px; }
}
    </style>
</head>
<body>
 
   <!-- <div class="background">
        <div class="ground"></div>
    </div>
    <div class="container">
        <div class="left-section">
            <div class="inner-content">
                <h1 class="heading">404</h1>
                <p class="subheading">Looks like the page you were looking for is no longer here.</p>
            </div>
        </div>
        <div class="right-section">
            <svg class="svgimg" xmlns="http://www.w3.org/2000/svg" viewBox="51.5 -15.288 385 505.565">
            <g class="bench-legs">
              <path d="M202.778,391.666h11.111v98.611h-11.111V391.666z M370.833,390.277h11.111v100h-11.111V390.277z M183.333,456.944h11.111
              v33.333h-11.111V456.944z M393.056,456.944h11.111v33.333h-11.111V456.944z" />
            </g>
            <g class="top-bench">
              <path d="M396.527,397.917c0,1.534-1.243,2.777-2.777,2.777H190.972c-1.534,0-2.778-1.243-2.778-2.777v-8.333
              c0-1.535,1.244-2.778,2.778-2.778H393.75c1.534,0,2.777,1.243,2.777,2.778V397.917z M400.694,414.583
              c0,1.534-1.243,2.778-2.777,2.778H188.194c-1.534,0-2.778-1.244-2.778-2.778v-8.333c0-1.534,1.244-2.777,2.778-2.777h209.723
              c1.534,0,2.777,1.243,2.777,2.777V414.583z M403.473,431.25c0,1.534-1.244,2.777-2.778,2.777H184.028
              c-1.534,0-2.778-1.243-2.778-2.777v-8.333c0-1.534,1.244-2.778,2.778-2.778h216.667c1.534,0,2.778,1.244,2.778,2.778V431.25z"
              />
            </g>
            <g class="bottom-bench">
              <path d="M417.361,459.027c0,0.769-1.244,1.39-2.778,1.39H170.139c-1.533,0-2.777-0.621-2.777-1.39v-4.86
              c0-0.769,1.244-0.694,2.777-0.694h244.444c1.534,0,2.778-0.074,2.778,0.694V459.027z" />
              <path d="M185.417,443.75H400c0,0,18.143,9.721,17.361,10.417l-250-0.696C167.303,451.65,185.417,443.75,185.417,443.75z" />
            </g>
            <g id="lamp">
              <path class="lamp-details" d="M125.694,421.997c0,1.257-0.73,3.697-1.633,3.697H113.44c-0.903,0-1.633-2.44-1.633-3.697V84.917
              c0-1.257,0.73-2.278,1.633-2.278h10.621c0.903,0,1.633,1.02,1.633,2.278V421.997z"
              />
              <path class="lamp-accent" d="M128.472,93.75c0,1.534-1.244,2.778-2.778,2.778h-13.889c-1.534,0-2.778-1.244-2.778-2.778V79.861
              c0-1.534,1.244-2.778,2.778-2.778h13.889c1.534,0,2.778,1.244,2.778,2.778V93.75z" />
              
              <circle class="lamp-light" cx="119.676" cy="44.22" r="40.51" />
              <path class="lamp-details" d="M149.306,71.528c0,3.242-13.37,13.889-29.861,13.889S89.583,75.232,89.583,71.528c0-4.166,13.369-13.889,29.861-13.889
              S149.306,67.362,149.306,71.528z"/>
              <radialGradient class="light-gradient" id="SVGID_1_" cx="119.676" cy="44.22" r="65" gradientUnits="userSpaceOnUse">
                <stop  offset="0%" style="stop-color:#FFFFFF; stop-opacity: 1"/>
                <stop  offset="50%" style="stop-color:#EDEDED; stop-opacity: 0.5">
                  <animate attributeName="stop-opacity" values="0.0; 0.5; 0.0" dur="5000ms" repeatCount="indefinite"></animate>
                </stop>
                <stop  offset="100%" style="stop-color:#EDEDED; stop-opacity: 0"/>
              </radialGradient>
              <circle class="lamp-light__glow" fill="url(#SVGID_1_)" cx="119.676" cy="44.22" r="65"/>
              <path class="lamp-bottom" d="M135.417,487.781c0,1.378-1.244,2.496-2.778,2.496H106.25c-1.534,0-2.778-1.118-2.778-2.496v-74.869
              c0-1.378,1.244-2.495,2.778-2.495h26.389c1.534,0,2.778,1.117,2.778,2.495V487.781z" />
            </g>
          </svg>
        </div>
    </div>-->
    <div id="wrap">
        <div id="wordsearch">
          <ul>
            <li>k</li>
    
            <li>v</li>
    
            <li>n</li>
    
            <li>z</li>
    
            <li>i</li>
    
            <li>x</li>
    
            <li>m</li>
    
            <li>e</li>
    
            <li>t</li>
    
            <li>a</li>
    
            <li>x</li>
    
            <li>l</li>
    
            <li class="one">4</li>
    
            <li class="two">0</li>
    
            <li class="three">4</li>
    
            <li>y</li>
    
            <li>y</li>
    
            <li>w</li>
    
            <li>v</li>
    
            <li>b</li>
    
            <li>o</li>
    
            <li>q</li>
    
            <li>d</li>
    
            <li>y</li>
    
            <li>p</li>
    
            <li>a</li>
    
            <li class="four">p</li>
    
            <li class="five">a</li>
    
            <li class="six">g</li>
    
            <li class="seven">e</li>
    
            <li>v</li>
    
            <li>j</li>
    
            <li>a</li>
    
            <li class="eight">n</li>
    
            <li class="nine">o</li>
    
            <li class="ten">t</li>
    
            <li>s</li>
    
            <li>c</li>
    
            <li>e</li>
    
            <li>w</li>
    
            <li>v</li>
    
            <li>x</li>
    
            <li>e</li>
    
            <li>p</li>
    
            <li>c</li>
    
            <li>f</li>
    
            <li>h</li>
    
            <li>q</li>
    
            <li>e</li>
    
            <li class="eleven">f</li>
    
            <li class="twelve">o</li>
    
            <li class="thirteen">u</li>
    
            <li class="fourteen">n</li>
    
            <li class="fifteen">d</li>
    
            <li>s</li>
    
            <li>w</li>
    
            <li>q</li>
    
            <li>v</li>
    
            <li>o</li>
    
            <li>s</li>
    
            <li>m</li>
    
            <li>v</li>
    
            <li>f</li>
    
            <li>u</li>
          </ul>
        </div>
    
        <div id="main-content">
          <h1>We couldn't find what you were looking for.</h1>
    
          <p>Unfortunately the page you were looking for could not be found. It may be
          temporarily unavailable, moved or no longer exist.</p>
    
          <p>Check the URL you entered for any mistakes and try again. Alternatively, search
          for whatever is missing or take a look around the rest of our site.</p>
    
          <div id="navigation">
            <a class="navigation" href="/">Home</a><a class="navigation" href="/vector">Vector Logos</a>
            <a class="navigation" href="/hookup">Hookup</a>
            <a class="navigation" href=
            "/jargon">Jargon Buster</a>
          </div>
        </div>
      </div>
</body>
</html>
<script>
    $(function () {
    var liWidth = $("li").css("width");
    $("li").css("height", liWidth);
    $("li").css("lineHeight", liWidth);
    var totalHeight = $("#wordsearch").css("width");
    $("#wordsearch").css("height", totalHeight);
});
causeRepaintsOn = $("h1, h2, h3, p");
$(window).resize(function () {
    causeRepaintsOn.css("z-index", 1);
});
$(window).on('resize', function () {
    var liWidth = $(".one").css("width");
    $("li").css("height", liWidth);
    $("li").css("lineHeight", liWidth);
    var totalHeight = $("#wordsearch").css("width");
    $("#wordsearch").css("height", totalHeight);
});



$(function () {
    /* 4 */
    $(this).delay(1500).queue(function () {
        $(".one").addClass("selected");
        $(this).dequeue();
    })
    /* 0 */
    .delay(500).queue(function () {
        $(".two").addClass("selected");
        $(this).dequeue();
    })
    /* 4 */
    .delay(500).queue(function () {
        $(".three").addClass("selected");
        $(this).dequeue();
    })
    /* P */
    .delay(500).queue(function () {
        $(".four").addClass("selected");
        $(this).dequeue();
    })
    /* A */
    .delay(500).queue(function () {
        $(".five").addClass("selected");
        $(this).dequeue();
    })
    /* G */
    .delay(500).queue(function () {
        $(".six").addClass("selected");
        $(this).dequeue();
    })
    /* E */
    .delay(500).queue(function () {
        $(".seven").addClass("selected");
        $(this).dequeue();
    })
    /* N */
    .delay(500).queue(function () {
        $(".eight").addClass("selected");
        $(this).dequeue();
    })
    /* O */
    .delay(500).queue(function () {
        $(".nine").addClass("selected");
        $(this).dequeue();
    })
    /* T */
    .delay(500).queue(function () {
        $(".ten").addClass("selected");
        $(this).dequeue();
    })
    /* F */
    .delay(500).queue(function () {
        $(".eleven").addClass("selected");
        $(this).dequeue();
    })
    /* O */
    .delay(500).queue(function () {
        $(".twelve").addClass("selected");
        $(this).dequeue();
    })
    /* U */
    .delay(500).queue(function () {
        $(".thirteen").addClass("selected");
        $(this).dequeue();
    })
    /* N */
    .delay(500).queue(function () {
        $(".fourteen").addClass("selected");
        $(this).dequeue();
    })
    /* D */
    .delay(500).queue(function () {
        $(".fifteen").addClass("selected");
        $(this).dequeue()
    });
});


</script>