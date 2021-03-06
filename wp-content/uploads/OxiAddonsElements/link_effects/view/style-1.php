<?php

if (!defined('ABSPATH'))
    exit;

function oxi_link_effects_style_1_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user')
{
    $stylename = $styledata['style_name'];
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);

    $styledata = explode('|', $stylefiles[0]);
    $href = '';
    $target = '';
    if ($stylefiles[7] != '') {
        $href = 'href="' . OxiAddonsUrlConvert($stylefiles[7]) . '"';
        if ($styledata[1] != '') {
            $target = 'target="' . $styledata[1] . '"';
        }
    }
    echo ' <div class="oxi-addons-container">
            <div class="oxi-addons-row">
                <div class="link-effect-main-' . $oxiid . '">
                    <a ' . $target . ' ' . $href . '  class="oxi-links-effects-' . $oxiid . '" ' . OxiAddonsAnimation($styledata, 35) . ' id="' . $stylefiles[5] . '">' . oxi_addons_html_decode($stylefiles[3]) . '</a>
                </div> 
            </div> 
           </div> 
    
    ';
    $css = '
           .oxi-addons-container .link-effect-main-' . $oxiid . '{
                width: 100%;
                float: left;
                display: flex;
                justify-content: center;
            }
           .oxi-addons-container .oxi-links-effects-' . $oxiid . '{  
                position: relative;
                display: inline-block;                    
                outline: none;
                cursor:pointer;
                color: ' . $styledata[7] . ';
                text-decoration: none;
                font-family:  ' . oxi_addons_font_familly($styledata[13]) . ';                    
                font-weight: ' . $styledata[15] . ';
                font-style:  ' . $styledata[17] . ';
                font-size: ' . $styledata[3] . 'px;
                padding: ' . $styledata[19] . 'px ' . $styledata[23] . 'px;
                margin: ' . $styledata[27] . 'px ' . $styledata[31] . 'px; 
            }
              .oxi-addons-container .oxi-links-effects-' . $oxiid . ':hover, 
              .oxi-addons-container .oxi-links-effects-' . $oxiid . ':focus {
                outline: none;
                color: ' . $styledata[9] . ';
                text-decoration: none;
               }
              .oxi-addons-container .oxi-links-effects-' . $oxiid . '::before, 
              .oxi-addons-container .oxi-links-effects-' . $oxiid . '::after {
                    display: inline-block;
                    opacity: 0;
                    color: ' . $styledata[11] . ';
                    vertical-align: top;    
                    -webkit-transition: -webkit-transform 0.3s, opacity 0.2s;
                    -moz-transition: -moz-transform 0.3s, opacity 0.2s;
                    transition: transform 0.3s, opacity 0.2s;
                }
               .oxi-addons-container .oxi-links-effects-' . $oxiid . '::before {
                    margin-right: ' . $styledata[23] . 'px;
                    content: "' . $stylefiles[9] . '";
                    -webkit-transform: translateX(20px);
                    -moz-transform: translateX(20px);
                    transform: translateX(20px);
                }
               .oxi-addons-container .oxi-links-effects-' . $oxiid . '::after {
                    margin-left: ' . $styledata[23] . 'px;
                    content: "' . $stylefiles[11] . '";
                    -webkit-transform: translateX(-20px);
                    -moz-transform: translateX(-20px);
                    transform: translateX(-20px);
                }
               .oxi-addons-container .oxi-links-effects-' . $oxiid . ':hover::before, 
               .oxi-addons-container .oxi-links-effects-' . $oxiid . ':hover::after,
               .oxi-addons-container .oxi-links-effects-' . $oxiid . ':focus::before,
               .oxi-addons-container .oxi-links-effects-' . $oxiid . ':focus::after {
                    opacity: 1;
                    -webkit-transform: translateX(0px);
                    -moz-transform: translateX(0px);
                    transform: translateX(0px);
                }
                @media screen and (max-width: 993px){
                   .oxi-addons-container .oxi-links-effects-' . $oxiid . '{                          
                        font-size: ' . $styledata[4] . 'px;
                        padding: ' . $styledata[20] . 'px ' . $styledata[24] . 'px;
                        margin: ' . $styledata[28] . 'px ' . $styledata[32] . 'px;
                    }
                   .oxi-addons-container .oxi-links-effects-' . $oxiid . '::before {
                        margin-right: ' . $styledata[24] . 'px;
                    }
                   .oxi-addons-container .oxi-links-effects-' . $oxiid . '::after {
                        margin-left: ' . $styledata[24] . 'px;
                    }
                }
                @media only screen and (max-width: 668px){
                   .oxi-addons-container .oxi-links-effects-' . $oxiid . '{                          
                        font-size: ' . $styledata[5] . 'px;
                        padding: ' . $styledata[21] . 'px ' . $styledata[25] . 'px;
                        margin: ' . $styledata[29] . 'px ' . $styledata[33] . 'px;
                    }
                   .oxi-addons-container .oxi-links-effects-' . $oxiid . '::before {
                        margin-right: ' . $styledata[25] . 'px;
                    }
                   .oxi-addons-container .oxi-links-effects-' . $oxiid . '::after {
                        margin-left: ' . $styledata[25] . 'px;
                    }
                } ';

    echo OxiAddonsInlineCSSData($css);
}
