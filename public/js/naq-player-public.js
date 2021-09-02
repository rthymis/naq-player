



      // Get all the variables from the plugin's settings page
      var streammbr = myURL;
      var naqColor = myColor;
      var naqTextColor = myTextColor;
      var naqCheckboxVolume = myCheckboxVolume;
      var naqCheckboxEQ = myCheckboxEQ;



        var stream = new Audio();


        stream.src = streammbr;

        // set the default volume
        stream.volume = 0.8;


        // play or pause the stream
        function playOrPauseStream(){

            if(stream.paused){
                stream.load(); // re-load stream or else after pause and play again it will start from where it was paused
                stream.play();
                $("#naqPlayerPlay").html('<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="60px" height="60px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><circle id="naqLoadingSvg" cx="50" cy="50" r="32" stroke-width="8" stroke="#000000" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round"><animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform></circle></svg>');
                document.getElementById("naqLoadingSvg").style.stroke = naqColor;
            }
            else{
                stream.pause();
                $("#naqPlayerPlay").html('<svg id="naqPlaySvg" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" preserveAspectRatio=\"xMidYMid\" width=\"60\" height=\"60\" viewBox=\"0 0 600 600\"><defs></defs><path d=\"M600.000,300.000 L-0.000,600.003 L-0.000,-0.003 L600.000,300.000 Z\" class=\"cls-1\"/></svg>');
                document.getElementById("naqPlaySvg").style.fill = naqColor;
                $("#animation").html('<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"width="60px" height="60px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve"><g><rect class="naqEqSvg" x="83.9" y="79.7"  width="10" height="7.8"/><line class="st0" x1="83.9" y1="79.7" x2="93.9" y2="79.7"/><rect class="naqEqSvg" x="72.8" y="79.7"  width="10" height="7.8"/><line class="st0" x1="72.8" y1="79.7" x2="82.8" y2="79.7"/><rect class="naqEqSvg" x="61.7" y="79.7"  width="10" height="7.8"/><line class="st0" x1="61.7" y1="79.7" x2="71.7" y2="79.7"/><rect class="naqEqSvg" x="50.6" y="79.7"  width="10" height="7.8"/><line class="st0" x1="50.6" y1="79.7" x2="60.6" y2="79.7"/><rect class="naqEqSvg" x="39.4" y="79.7"  width="10" height="7.8"/><line class="st0" x1="39.4" y1="79.7" x2="49.4" y2="79.7"/><rect class="naqEqSvg" x="28.3" y="79.7"  width="10" height="7.8"/><line class="st0" x1="28.3" y1="79.7" x2="38.3" y2="79.7"/><line class="st0" x1="17.2" y1="79.7" x2="27.2" y2="79.7"/><rect class="naqEqSvg" x="17.2" y="79.7"  width="10" height="7.8"/><line class="st0" x1="6.1" y1="79.7" x2="16.1" y2="79.7"/><rect class="naqEqSvg" x="6.1" y="79.7"  width="10" height="7.8"/></g></svg>');
                var all = document.getElementsByClassName('naqEqSvg');
                for (var i = 0; i < all.length; i++) {
                  all[i].style.fill = naqColor;
                }
            }

        }

        // show the volume
        function getVolume() {
          afterVolume = stream.volume * 100;
          afterVolume = Math.round(afterVolume);
          if (afterVolume < 100 && afterVolume > 0) {     // keeps empty space for volume
             afterVolume = "&nbsp;&nbsp;" + afterVolume;  // keeps empty space for volume < 100
           }
         if (afterVolume == 0) {  // keeps empty space for volume = 0
            afterVolume = "&nbsp;&nbsp;&nbsp;&nbsp;" + afterVolume;
          }
         afterVolume += "%";
          return(afterVolume);
        }

        // decrease volume
        function decreaseVolume(){
          stream.volume -= 0.1;
          document.getElementById("showVolume").innerHTML = getVolume();
          // if (stream.volume < 0.1) {
          // $("#animation").html('<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"width="60px" height="60px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve"><g><rect class="naqEqSvg" x="83.9" y="79.7"  width="10" height="7.8"/><line class="st0" x1="83.9" y1="79.7" x2="93.9" y2="79.7"/><rect class="naqEqSvg" x="72.8" y="79.7"  width="10" height="7.8"/><line class="st0" x1="72.8" y1="79.7" x2="82.8" y2="79.7"/><rect class="naqEqSvg" x="61.7" y="79.7"  width="10" height="7.8"/><line class="st0" x1="61.7" y1="79.7" x2="71.7" y2="79.7"/><rect class="naqEqSvg" x="50.6" y="79.7"  width="10" height="7.8"/><line class="st0" x1="50.6" y1="79.7" x2="60.6" y2="79.7"/><rect class="naqEqSvg" x="39.4" y="79.7"  width="10" height="7.8"/><line class="st0" x1="39.4" y1="79.7" x2="49.4" y2="79.7"/><rect class="naqEqSvg" x="28.3" y="79.7"  width="10" height="7.8"/><line class="st0" x1="28.3" y1="79.7" x2="38.3" y2="79.7"/><line class="st0" x1="17.2" y1="79.7" x2="27.2" y2="79.7"/><rect class="naqEqSvg" x="17.2" y="79.7"  width="10" height="7.8"/><line class="st0" x1="6.1" y1="79.7" x2="16.1" y2="79.7"/><rect class="naqEqSvg" x="6.1" y="79.7"  width="10" height="7.8"/></g></svg>');
          // var all = document.getElementsByClassName('naqEqSvg');
          // for (var i = 0; i < all.length; i++) {
          //   all[i].style.fill = naqColor;
          // }
          // }

        }

        // increase Volume
        function increaseVolume(){
          stream.volume += 0.1;
          document.getElementById("showVolume").innerHTML = getVolume();

        //   if (!stream.paused && stream.volume < 0.2 && ! stream.muted) {
        //   $("#animation").html('<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="60px" height="60px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><g><circle cx="60" cy="50" r="4" fill="#e15b64"><animate attributeName="cx" repeatCount="indefinite" dur="1s" values="95;35" keyTimes="0;1" begin="-0.67s"></animate><animate attributeName="fill-opacity" repeatCount="indefinite" dur="1s" values="0;1;1" keyTimes="0;0.2;1" begin="-0.67s"></animate></circle><circle cx="60" cy="50" r="4" fill="#e15b64"><animate attributeName="cx" repeatCount="indefinite" dur="1s" values="95;35" keyTimes="0;1" begin="-0.33s"></animate><animate attributeName="fill-opacity" repeatCount="indefinite" dur="1s" values="0;1;1" keyTimes="0;0.2;1" begin="-0.33s"></animate></circle><circle cx="60" cy="50" r="4" fill="#e15b64"><animate attributeName="cx" repeatCount="indefinite" dur="1s" values="95;35" keyTimes="0;1" begin="0s"></animate><animate attributeName="fill-opacity" repeatCount="indefinite" dur="1s" values="0;1;1" keyTimes="0;0.2;1" begin="0s"></animate></circle></g><g transform="translate(-15 0)"><path d="M50 50L20 50A30 30 0 0 0 80 50Z" fill="#f8b26a" transform="rotate(90 50 50)"></path><path d="M50 50L20 50A30 30 0 0 0 80 50Z" fill="#f8b26a"><animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;45 50 50;0 50 50" keyTimes="0;0.5;1"></animateTransform></path><path d="M50 50L20 50A30 30 0 0 1 80 50Z" fill="#f8b26a"><animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;-45 50 50;0 50 50" keyTimes="0;0.5;1"></animateTransform></path></g></svg>');
        // }
          }

        // mute or unmute the audio
        function muteOrUnmuteVolume(){

          if ( stream.muted == false ) {

            stream.muted = true;
            $("#naqPlayerMute").html('<svg id="naqMuteSvg" xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 0 24 24" style="width:40px; " ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M4.34 2.93L2.93 4.34 7.29 8.7 7 9H3v6h4l5 5v-6.59l4.18 4.18c-.65.49-1.38.88-2.18 1.11v2.06c1.34-.3 2.57-.92 3.61-1.75l2.05 2.05 1.41-1.41L4.34 2.93zM10 15.17L7.83 13H5v-2h2.83l.88-.88L10 11.41v3.76zM19 12c0 .82-.15 1.61-.41 2.34l1.53 1.53c.56-1.17.88-2.48.88-3.87 0-4.28-2.99-7.86-7-8.77v2.06c2.89.86 5 3.54 5 6.71zm-7-8l-1.88 1.88L12 7.76zm4.5 8c0-1.77-1.02-3.29-2.5-4.03v1.79l2.48 2.48c.01-.08.02-.16.02-.24z"/></svg>');
            document.getElementById("naqMuteSvg").style.fill = naqColor;
            //$("#animation").html('<img src="wp-content/plugins/naq-player/public/partials/images/eater-static.png" >');

          } else {

            stream.muted = false;
            $("#naqPlayerMute").html('<svg  id="naqUnmuteSvg" xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 0 24 24" style="width:40px; "><path d="M0 0h24v24H0V0z" fill="none"/><path d="M3 9v6h4l5 5V4L7 9H3zm7-.17v6.34L7.83 13H5v-2h2.83L10 8.83zM16.5 12c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77 0-4.28-2.99-7.86-7-8.77z"/></svg>');
            document.getElementById("naqUnmuteSvg").style.fill = naqColor;
            // if (!stream.paused) {
            // $("#animation").html('<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="60px" height="60px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><g><circle cx="60" cy="50" r="4" fill="#e15b64"><animate attributeName="cx" repeatCount="indefinite" dur="1s" values="95;35" keyTimes="0;1" begin="-0.67s"></animate><animate attributeName="fill-opacity" repeatCount="indefinite" dur="1s" values="0;1;1" keyTimes="0;0.2;1" begin="-0.67s"></animate></circle><circle cx="60" cy="50" r="4" fill="#e15b64"><animate attributeName="cx" repeatCount="indefinite" dur="1s" values="95;35" keyTimes="0;1" begin="-0.33s"></animate><animate attributeName="fill-opacity" repeatCount="indefinite" dur="1s" values="0;1;1" keyTimes="0;0.2;1" begin="-0.33s"></animate></circle><circle cx="60" cy="50" r="4" fill="#e15b64"><animate attributeName="cx" repeatCount="indefinite" dur="1s" values="95;35" keyTimes="0;1" begin="0s"></animate><animate attributeName="fill-opacity" repeatCount="indefinite" dur="1s" values="0;1;1" keyTimes="0;0.2;1" begin="0s"></animate></circle></g><g transform="translate(-15 0)"><path d="M50 50L20 50A30 30 0 0 0 80 50Z" fill="#f8b26a" transform="rotate(90 50 50)"></path><path d="M50 50L20 50A30 30 0 0 0 80 50Z" fill="#f8b26a"><animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;45 50 50;0 50 50" keyTimes="0;0.5;1"></animateTransform></path><path d="M50 50L20 50A30 30 0 0 1 80 50Z" fill="#f8b26a"><animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;-45 50 50;0 50 50" keyTimes="0;0.5;1"></animateTransform></path></g></svg>');
            // }


          }

          document.getElementById("showVolume").innerHTML = getVolume();



        }

        window.onload = function showVolume() {

          // Apply dynamic color to the EQ gif icon
          var all = document.getElementsByClassName('naqEqSvg');
          for (var i = 0; i < all.length; i++) {
            all[i].style.fill = naqColor;
          }

          // Hide volume controls on mobile devices #1
          // var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
          // if (isMobile) {
          //   document.getElementById("naqVolumeControls").style.display = 'none';
          // }

          // Hide volume controls on mobile devices #2
          var touchDevice = ('ontouchstart' in document.documentElement);
          if (touchDevice) {
             document.getElementById("naqVolumeControls").style.display = 'none';
          }




        // Hide Volume Controls if checkbox on plugin settings page is checked
        // function naqCheckboxVolumeFunction() {
        if ( naqCheckboxVolume == 1 ) {
          document.getElementById("naqVolumeControls").style.display = 'none';
        }
        // }
        // naqCheckboxVolumeFunction()

        // Hide EQ gif icon if checkbox on plugin settings page is checked
        // function naqCheckboxEQFunction() {
        if ( naqCheckboxEQ == 1 ) {
          document.getElementById("animation").style.display = 'none';
        }
        // }
        // naqCheckboxEQFunction()

        // Apply dynamic colors to the Volume Controls
        document.getElementById("increase").style.backgroundColor = naqColor;
        document.getElementById("decrease").style.backgroundColor = naqColor;
        document.getElementById("increase").style.color = naqTextColor;
        document.getElementById("decrease").style.color = naqTextColor;
        document.getElementById("showVolume").style.color = naqColor;
        document.getElementById("showVolume").innerHTML = getVolume();

        // Hide the highlighting of the player's button when double clicking on them
        let creaseElements =  [ document.getElementById("decrease"), document.getElementById("increase"), document.getElementById("showVolume"), document.getElementById("naqPlayerMute"), document.getElementById("naqPlayerPlay") ];

        creaseElements.forEach(function(elem) {
          elem.addEventListener('mousedown', function(e){ e.preventDefault(); }, false);
        })

        }

        // Events that occur when the audio playing starts: Play Button turns to Pause Button and static EQ icon turns to animated EQ gif icon
        stream.addEventListener('playing', (event) => {

          $("#naqPlayerPlay").html('<svg id="naqPauseSvg" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" preserveAspectRatio=\"xMidYMid\" width=\"60\" height=\"60\" viewBox=\"0 0 600 600\"><defs></defs><g><rect width=\"230\" height=\"600\" class=\"cls-1\"/><rect x=\"370\" width=\"230\" height=\"600\" class=\"cls-1\"/></g></svg>');
          document.getElementById("naqPauseSvg").style.fill = naqColor;
          // $("#naqPlayerPlay img").attr("src","wp-content/plugins/naq-player/public/partials/images/pause-button-1.png");
          //$("#naqPlayerLoading").fadeOut();
          // $("#animation img").attr("src","wp-content/plugins/naq-player/public/partials/images/eq.gif");
          $("#animation").html('<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="60px" height="60px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><g transform="rotate(180 50 50)"><rect class="naqEqSvg" x="6.111111111111111" y="12.5" width="10" height="40" ><animate attributeName="height" calcMode="spline" values="50;75;10;50" times="0;0.33;0.66;1" dur="1.25s" keySplines="0.5 0 0.5 1;0.5 0 0.5 1;0.5 0 0.5 1" repeatCount="indefinite" begin="-0.46875s"></animate></rect><rect class="naqEqSvg" x="17.22222222222222" y="12.5" width="10" height="40" ><animate attributeName="height" calcMode="spline" values="50;75;10;50" times="0;0.33;0.66;1" dur="1.25s" keySplines="0.5 0 0.5 1;0.5 0 0.5 1;0.5 0 0.5 1" repeatCount="indefinite" begin="-0.78125s"></animate></rect><rect class="naqEqSvg" x="28.333333333333336" y="12.5" width="10" height="40" ><animate attributeName="height" calcMode="spline" values="50;75;10;50" times="0;0.33;0.66;1" dur="1.25s" keySplines="0.5 0 0.5 1;0.5 0 0.5 1;0.5 0 0.5 1" repeatCount="indefinite" begin="-0.9375s"></animate></rect><rect class="naqEqSvg" x="39.44444444444444" y="12.5" width="10" height="40" ><animate attributeName="height" calcMode="spline" values="50;75;10;50" times="0;0.33;0.66;1" dur="1.25s" keySplines="0.5 0 0.5 1;0.5 0 0.5 1;0.5 0 0.5 1" repeatCount="indefinite" begin="0s"></animate></rect><rect class="naqEqSvg" x="50.55555555555556" y="12.5" width="10" height="40" ><animate attributeName="height" calcMode="spline" values="50;75;10;50" times="0;0.33;0.66;1" dur="1.25s" keySplines="0.5 0 0.5 1;0.5 0 0.5 1;0.5 0 0.5 1" repeatCount="indefinite" begin="-1.09375s"></animate></rect><rect class="naqEqSvg" x="61.66666666666667" y="12.5" width="10" height="40" ><animate attributeName="height" calcMode="spline" values="50;75;10;50" times="0;0.33;0.66;1" dur="1.25s" keySplines="0.5 0 0.5 1;0.5 0 0.5 1;0.5 0 0.5 1" repeatCount="indefinite" begin="-0.625s"></animate></rect><rect class="naqEqSvg" x="72.77777777777777" y="12.5" width="10" height="40" ><animate attributeName="height" calcMode="spline" values="50;75;10;50" times="0;0.33;0.66;1" dur="1.25s" keySplines="0.5 0 0.5 1;0.5 0 0.5 1;0.5 0 0.5 1" repeatCount="indefinite" begin="-0.15625s"></animate></rect><rect class="naqEqSvg" x="83.88888888888889" y="12.5" width="10" height="40" ><animate attributeName="height" calcMode="spline" values="50;75;10;50" times="0;0.33;0.66;1" dur="1.25s" keySplines="0.5 0 0.5 1;0.5 0 0.5 1;0.5 0 0.5 1" repeatCount="indefinite" begin="-0.3125s"></animate></rect></g></svg>');

          var all = document.getElementsByClassName('naqEqSvg');
          for (var i = 0; i < all.length; i++) {
            all[i].style.fill = naqColor;
          }



        });



        // jQuery("#naqPlayerMain").bind('playing', function() {
        //   $("#naqPlayerLoading").hide();
        //
        // });

        // document.getElementById("showVolume").innerHTML = getVolume();

// }
