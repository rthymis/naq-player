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

$my_Text_Color = get_option('naqPlayerTextColor');
$myplugin_checkbox_transparent_background_volume = get_option('naqPlayerCheckboxTransparentBackgroundVolume');
$my_Checkbox_Volume = get_option('naqPlayerCheckboxVolume');
$my_Checkbox_EQ = get_option ('naqPlayerCheckboxEQ');

if ($myplugin_checkbox_transparent_background_volume == 1) {
  $volume_Background_Color = "transparent";
} else {
  $volume_Background_Color = $naqPlayerColor;
}

?>

<div id="naqPlayerWrapper">
  <div id="naqPlayerMain">
    <div id="naqPlayerPlay" onclick="playOrPauseStream()">
      <!-- change underneath the size of the FIRST play button -->
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

<?php if ( $my_Checkbox_Volume == 0 ) { ?>
    <div id="naqVolumeControls">
      <div id="decrease" style="background-color:<?php echo $volume_Background_Color ?>; color: <?php echo $my_Text_Color ?>; " onclick="decreaseVolume()">-</div>
      <div id="naqPlayerMute" onclick="muteOrUnmuteVolume()">
        <svg  xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 0 24 24" width="40px" fill="<?php echo $naqPlayerColor ?>"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M3 9v6h4l5 5V4L7 9H3zm7-.17v6.34L7.83 13H5v-2h2.83L10 8.83zM16.5 12c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77 0-4.28-2.99-7.86-7-8.77z"/></svg>
      </div>
      <div id="increase" style="background-color:<?php echo $volume_Background_Color ?>; color: <?php echo $my_Text_Color ?>; " onclick="increaseVolume()">+</div>
      <div style="color: <?php echo $naqPlayerColor ?>; white-space: pre;" id="showVolume">  80%</div>
    </div>

<?php } ?>

<?php if ( $my_Checkbox_EQ == 0 ) { ?>
    <div id="animation">
      <!-- change underneath the size of the INACTIVE EQ -->
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="60px" height="60px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
      
      <g transform="rotate(180 50 50)"><rect style="fill:<?php echo $naqPlayerColor ?>" class="naqEqSvg" x="0" y="0" width="10" height="10" ></rect><rect style="fill:<?php echo $naqPlayerColor ?>" class="naqEqSvg" x="11.1" y="0" width="10" height="10" ></rect><rect style="fill:<?php echo $naqPlayerColor ?>" class="naqEqSvg" x="22.2" y="0" width="10" height="10" ></rect><rect style="fill:<?php echo $naqPlayerColor ?>" class="naqEqSvg" x="33.3" y="0" width="10" height="10" ></rect><rect style="fill:<?php echo $naqPlayerColor ?>" class="naqEqSvg" x="44.4" y="0" width="10" height="10" ></rect><rect style="fill:<?php echo $naqPlayerColor ?>" class="naqEqSvg" x="55.5" y="0" width="10" height="10" ></rect><rect style="fill:<?php echo $naqPlayerColor ?>" class="naqEqSvg" x="66.6" y="0" width="10" height="10" ></rect><rect style="fill:<?php echo $naqPlayerColor ?>" class="naqEqSvg" x="77.7" y="0" width="10" height="10" ></rect><rect style="fill:<?php echo $naqPlayerColor ?>" class="naqEqSvg" x="88.8" y="0" width="10" height="10" ></rect></g></svg>
    </div>
<?php } ?>
  </div>
</div>


