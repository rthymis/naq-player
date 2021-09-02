<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://naquema.com
 * @since      1.0.0
 *
 * @package    Naq_Player
 * @subpackage Naq_Player/public/partials
 */

 $naqPlayerColor = get_option('naqPlayerColor');

?>
<div id="naqPlayerWrapper">
  <div id="naqPlayerMain">

    <!-- <div id="naqPlayerPlay" onclick="playOrPauseStream()"><img class="playImage" src="wp-content/plugins/naq-player/public/partials/images/play-button-1.png" ></div> -->
    <div id="naqPlayerPlay" onclick="playOrPauseStream()">
    <svg  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="60" height="60" viewBox="0 0 600 600">
      <defs>
        <style>
          .cls-1 {
            fill: <?php echo $naqPlayerColor ?>;
            fill-rule: evenodd;
          }
        </style>
      </defs>
      <path d="M600.000,300.000 L-0.000,600.003 L-0.000,-0.003 L600.000,300.000 Z" class="cls-1"/>
    </svg>
    </div>


    <div id="naqVolumeControls">
    <div id="decrease" onclick="decreaseVolume()">-</div>
    <div id="naqPlayerMute" onclick="muteOrUnmuteVolume()">
    <svg  xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 0 24 24" width="40px" fill="<?php echo $naqPlayerColor ?>"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M3 9v6h4l5 5V4L7 9H3zm7-.17v6.34L7.83 13H5v-2h2.83L10 8.83zM16.5 12c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77 0-4.28-2.99-7.86-7-8.77z"/></svg>
    </div>
    <!-- <img id="naqPlayerMute" onclick="muteOrUnmuteVolume()" src="wp-content/plugins/naq-player/public/partials/images/unmute-button.png"/> -->
    <!-- <div id="increase" onclick="increaseVolume()">+</div> -->
    <div id="increase" onclick="increaseVolume()">+</div>
    <div id="showVolume"></div>
    </div>


    <div id="animation">
      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
      	 width="60px" height="60px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">

      <g>
      	<rect class="naqEqSvg" x="83.9" y="79.7"  width="10" height="7.8"/>
      	<line class="st0" x1="83.9" y1="79.7" x2="93.9" y2="79.7"/>
      	<rect class="naqEqSvg" x="72.8" y="79.7"  width="10" height="7.8"/>
      	<line class="st0" x1="72.8" y1="79.7" x2="82.8" y2="79.7"/>
      	<rect class="naqEqSvg" x="61.7" y="79.7"  width="10" height="7.8"/>
      	<line class="st0" x1="61.7" y1="79.7" x2="71.7" y2="79.7"/>
      	<rect class="naqEqSvg" x="50.6" y="79.7"  width="10" height="7.8"/>
      	<line class="st0" x1="50.6" y1="79.7" x2="60.6" y2="79.7"/>
      	<rect class="naqEqSvg" x="39.4" y="79.7"  width="10" height="7.8"/>
      	<line class="st0" x1="39.4" y1="79.7" x2="49.4" y2="79.7"/>
      	<rect class="naqEqSvg" x="28.3" y="79.7"  width="10" height="7.8"/>
      	<line class="st0" x1="28.3" y1="79.7" x2="38.3" y2="79.7"/>
      	<line class="st0" x1="17.2" y1="79.7" x2="27.2" y2="79.7"/>
      	<rect class="naqEqSvg" x="17.2" y="79.7"  width="10" height="7.8"/>
      	<line class="st0" x1="6.1" y1="79.7" x2="16.1" y2="79.7"/>
      	<rect class="naqEqSvg" x="6.1" y="79.7"  width="10" height="7.8"/>
      </g>
      </svg>
    </div>

  </div>
</div>
