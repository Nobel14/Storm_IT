<?php

if (!defined('ABSPATH'))
    exit;

function oxi_button_style_6_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $css = '';
    $styledata = explode('|', $stylefiles[0]);
    $href = '';
    $target = '';
    if ($stylefiles[7] != '') {
        $href = 'href="' . OxiAddonsUrlConvert($stylefiles[7]) . '"';
        if ($styledata[3] != '') {
            $target = 'target="' . $styledata[3] . '"';
        }
    }
    echo '<div class="oxi-addons-container">
            <div class="oxi-addons-row">
                <div class="oxi-addons-align-' . $oxiid . '">
                    <div class="oxi-addons-button-body" ' . OxiAddonsAnimation($styledata, 55) . '>
                        <div class="oxi-addons-button-align" >';
    echo                    '<a ' . $target . ' ' . $href . '   class=" oxi-button-' . $oxiid . '  buttonOxi" id="' .$stylefiles[5]. '" >'. OxiAddonsTextConvert($stylefiles[3]).'</a>';
    echo        '       </div>
                    </div>
                </div>
            </div>
          </div>';
   
    $textalign = explode(':', $styledata[21]);
    $css .= '.oxi-addons-align-' . $oxiid . ' {   
                    float: left;
                    width: 100%;
                cursor: pointer;
            }
            .oxi-addons-align-' . $oxiid . ' .oxi-addons-button-body{
                    text-align: '.$textalign[0].';
                    padding: '. OxiAddonsPaddingMarginSanitize($styledata, 39).';
                }

            .oxi-addons-align-' . $oxiid . ' .oxi-addons-button-align{
                display: inline-flex;
                align-items: center;
                justify-content: center;
                
                position: relative;
                cursor: pointer;
                color: '.$styledata[71].';
                background: '.$styledata[73].';
                border-width: '. OxiAddonsPaddingMarginSanitize($styledata, 75).';
                border-style: '.$styledata[91].';
                border-color: '.$styledata[92].';
                border-radius: '.$styledata[95].'px;
                background-image: url(\'' . OxiAddonsUrlConvert($stylefiles[9]) . '\');
                    ' . OxiAddonsBoxShadowSanitize($styledata, 59) . '; 
                background-size: 50px 50px;
                transition: all 0.3s ease;

                
            }
            
            .oxi-addons-align-' . $oxiid . ' .oxi-button-' . $oxiid . '{
                display: inline-block;
                text-decoration: none;
                font-size: '.$styledata[5].'px;
                '. OxiAddonsFontSettings($styledata, 17).';
                text-align: center;
                cursor: pointer;
                padding: '. OxiAddonsPaddingMarginSanitize($styledata, 23).';
                max-width: 100%;
                width: '.$styledata[125].'px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .oxi-addons-align-' . $oxiid . ' .oxi-addons-button-align:hover {
                 -webkit-animation: button-animation 1.5s linear infinite;
                        animation:  button-animation 1.5s linear infinite;
                        
                color: '.$styledata[97].';
                background: '.$styledata[99].';
                border-width: '. OxiAddonsPaddingMarginSanitize($styledata, 101).';
                background-image: url(\'' . OxiAddonsUrlConvert($stylefiles[9]) . '\');
                background-size: 50px 50px;
                border-style: '.$styledata[117].';
                border-color: '.$styledata[118].';
                border-radius: '.$styledata[121].'px;
                    ' . OxiAddonsBoxShadowSanitize($styledata, 65) . '; 
            }
            
            @keyframes button-animation {
                from {
                  background-position: 0 0;
                }
                to {
                  background-position: 50px 0;
                }
            }
            
            @media only screen and (min-width : 669px) and (width : 993px){
                .oxi-addons-align-' . $oxiid . ' .oxi-addons-button-body{
                        justify-content: center;
                        display: flex;
                        margin: '. OxiAddonsPaddingMarginSanitize($styledata, 40).';
                }
                .oxi-addons-align-' . $oxiid . ' .oxi-addons-button-align{
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    position: relative;
                    border-width: '. OxiAddonsPaddingMarginSanitize($styledata, 76).';
                    background-size: 50px 50px;
                    transition: all 0.3s ease;
                }

                .oxi-addons-align-' . $oxiid . ' .oxi-button-' . $oxiid . '{
                    display: inline-block;
                    text-decoration: none;
                    font-size: '.$styledata[6].'px;
                    cursor: pointer;
                    padding: '. OxiAddonsPaddingMarginSanitize($styledata, 24).';
                        max-width: 100%;
                    width: '.$styledata[126].'px;
                }
                .oxi-addons-align-' . $oxiid . ' .oxi-addons-button-align:hover {
                     -webkit-animation: button-animation 2s linear infinite;
                            animation:  button-animation 2s linear infinite;
                    border-width: '. OxiAddonsPaddingMarginSanitize($styledata, 102).';
                    background-size: 50px 50px;
                        ' . OxiAddonsBoxShadowSanitize($styledata, 66) . '; 
                }
            }
            @media only screen and (width : 668px){
                .oxi-addons-align-' . $oxiid . ' .oxi-addons-button-body{
                        justify-content: center;
                        display: flex;
                        margin: '. OxiAddonsPaddingMarginSanitize($styledata, 41).';
                }
                .oxi-addons-align-' . $oxiid . ' .oxi-addons-button-align{
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    position: relative;

                    border-width: '. OxiAddonsPaddingMarginSanitize($styledata, 77).';
                    background-size: 50px 50px;
                    transition: all 0.3s ease;
                }

                .oxi-addons-align-' . $oxiid . ' .oxi-button-' . $oxiid . '{
                    display: inline-block;
                    text-decoration: none;
                    font-size: '.$styledata[7].'px;
                    cursor: pointer;
                    padding: '. OxiAddonsPaddingMarginSanitize($styledata, 25).';
                    max-width: 100%;
                    width: '.$styledata[127].'px;
                }
                .oxi-addons-align-' . $oxiid . ' .oxi-addons-button-align:hover {
                     -webkit-animation: button-animation 2s linear infinite;
                            animation:  button-animation 2s linear infinite;
                    border-width: '. OxiAddonsPaddingMarginSanitize($styledata, 103).';
                    background-size: 50px 50px;
                        ' . OxiAddonsBoxShadowSanitize($styledata, 67) . '; 
                }
            }';
    
	echo OxiAddonsInlineCSSData($css);
}
