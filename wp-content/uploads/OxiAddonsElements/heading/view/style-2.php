<?php

if (!defined('ABSPATH'))
  exit;

function oxi_heading_style_2_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user')
{
  $stylename = $styledata['style_name'];
  $oxiid = $styledata['id'];
  $styledata = explode('||#||', $styledata['css']);
  $data = $styledata[1];
  $headingimage = $styledata[3];
  $styledata = explode('|', $styledata[4]);
  echo ' <div class="oxi-addons-container">
             <div class="oxi-addons-row"> 
                    <div class="oxi-addons-container-' .  $oxiid . ' " ' . OxiAddonsAnimation($styledata, 45) . '> 
                     <' . $styledata[23] . ' class="oxi-addons-heading-' . $oxiid . '">' . htmlspecialchars_decode($data) . '</' . $styledata[23] . '>
                    </div>
              </div>
         </div>';
  $css = '.oxi-addons-container-' . $oxiid . '{
                    text-align: ' . $styledata[1] . ';
                     width: 100%;
                }
                .oxi-addons-container-' . $oxiid . ' .oxi-addons-heading-' . $oxiid . '{                   
                    background: url(' . OxiAddonsUrlConvert($headingimage) . ');  
                    -moz-background-size: 100% 100%;
                    -o-background-size: 100% 100%; 
                    background-size: 100% 100%;
                    text-fill-color: transparent; /* not yet supported */
                    background-clip: text; /* not yet supported */
                    -webkit-text-fill-color: transparent;
                    -webkit-background-clip: text;
                    -moz-text-fill-color: transparent; /* not yet supported */
                    -moz-background-clip: text;
                    font-size: ' . $styledata[19] . 'px;
                    display: inline-block;
                    font-family:  ' . oxi_addons_font_familly($styledata[27]) . ';
                    font-weight: ' . $styledata[29] . ';
                    font-style:  ' . $styledata[31] . ';
                    margin-top: ' . $styledata[33] . 'px;
                    margin-bottom: ' . $styledata[37] . 'px;
                    border-bottom: ' . $styledata[41] . 'px ' . $styledata[42] . '  ' . $styledata[43] . ';
                    padding: ' . $styledata[3] . 'px ' . $styledata[15] . 'px ' . $styledata[7] . 'px ' . $styledata[11] . 'px;
                    line-height: 1;
                }
                @media only screen and (min-width : 669px) and (max-width : 993px){
                  .oxi-addons-container-' . $oxiid . '{
                     height:' . ($styledata[19] + $styledata[3] + $styledata[7] + $styledata[33] + $styledata[37] + $styledata[41]) . 'px;
                   }
                   .oxi-addons-container-' . $oxiid . ' .oxi-addons-heading-' . $oxiid . '{ 
                      font-size: ' . $styledata[20] . 'px;  
                      padding: ' . $styledata[4] . 'px ' . $styledata[16] . 'px ' . $styledata[8] . 'px ' . $styledata[12] . 'px;
                      margin-top: ' . $styledata[34] . 'px;
                      margin-bottom: ' . $styledata[38] . 'px;
                    } 
                 } 
                 @media only screen and (max-width : 668px){
                   .oxi-addons-container-' . $oxiid . ' .oxi-addons-heading-' . $oxiid . '{ 
                        font-size: ' . $styledata[21] . 'px;  
                        padding: ' . $styledata[5] . 'px ' . $styledata[17] . 'px ' . $styledata[9] . 'px ' . $styledata[13] . 'px;
                        margin-top: ' . $styledata[35] . 'px;
                        margin-bottom: ' . $styledata[39] . 'px;
                    }
                } 
                ';
  echo OxiAddonsInlineCSSData($css);
}
