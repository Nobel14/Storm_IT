<?php

if (!defined('ABSPATH')) {
    exit;
}

function oxi_footer_info_style_2_shortcode($styledata = false, $listdata = false, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $icon = $addressone = $addresstwo = $addresssection = '';
     if ($stylefiles[2] != '') {
        $icon = '<div class="oxi_addons_FI_2_icon">'.oxi_addons_font_awesome('' . OxiAddonsTextConvert($stylefiles[2]) . '').'</div>';
    }
    if ($stylefiles[4] != '') {
        $addressone = '<div class="oxi_addons_FI_2_C_A">' . OxiAddonsTextConvert($stylefiles[4]) . '</div>';
    }
    if ($stylefiles[6] != '') {
        $addresstwo = '<div class="oxi_addons_FI_2_C_A2">' . OxiAddonsTextConvert($stylefiles[6]) . '</div>';
    }
    if ($addressone != '' || $addresstwo != '') {
        $addresssection = '<div class="oxi_addons_FI_2_content">
                    '.$addressone.'
                    '.$addresstwo.'
                </div>';
    }
    
    echo '<div class="oxi-addons-container">
        <div class="oxi_addons_FI_2_' . $oxiid . '">
            <div class="oxi_addons_FI_2_row" ' . OxiAddonsAnimation($styledata, 51) . '>
                '.$icon.'
                '.$addresssection.'
            </div>
        </div>
    </div>';

    $css = '.oxi_addons_FI_2_' . $oxiid . '{
        width: 100%;
        float: left;
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 29) . ';
    }
    .oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_row{
        width: 100%;
        max-width: ' . $styledata[3] . 'px;
        margin: auto;
        border: ' . $styledata[7] .'px ' . $styledata[8] .'  ' . $styledata[11] .';
        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 13) . ';
        ' . OxiAddonsBoxShadowSanitize($styledata, 45) . ';
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 205) . ';
        ' . OxiAddonsBGImage($styledata, 55) . ';
        overflow: auto;
    }
    .oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_icon{
        width: 100%;
        float: left;
        text-align:' . $styledata[59] . ';
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 61) . ';
    }
    .oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_icon .oxi-icons{
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: ' . $styledata[81] . ';
        background: ' . $styledata[83] . ';
        width: ' . $styledata[85] . 'px;
        height: ' . $styledata[89] . 'px;
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 109) . ';
        border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 93) . ';
        font-size: ' . $styledata[77] . 'px;

    }
    .oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_content{
        width: 100%;
        float: left;
        text-align:' . $styledata[131] . ';
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 133) . ';
        border-top: ' . $styledata[125] .'px ' . $styledata[126] .'  ' . $styledata[129] .';
        border-bottom: ' . $styledata[125] .'px ' . $styledata[126] .'  ' . $styledata[129] .';
    }
    .oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_C_A{
        width: 100%;
        float: left;
        font-size: ' . $styledata[149] . 'px;
        color: ' . $styledata[153] . ';
        ' . OxiAddonsFontSettings($styledata, 155) . '
        padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 161) . ';
    }
    .oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_C_A2{
        width: 100%;
        float: left;
        font-size: ' . $styledata[177] . 'px;
        color: ' . $styledata[181] . ';
        ' . OxiAddonsFontSettings($styledata, 183) . '
        padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 189) . ';
    }
    @media only screen and (min-width : 669px) and (max-width : 993px){
            .oxi_addons_FI_2_' . $oxiid . '{
                  padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 30) . ';
              }
              .oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_row{
                  max-width: ' . $styledata[4] . 'px;
                  border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 14) . ';
                  padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 206) . ';
              }
              .oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_icon{
                  padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 62) . ';
              }
              .oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_icon .oxi-icons{
                  width: ' . $styledata[86] . 'px;
                  height: ' . $styledata[90] . 'px;
                  padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 110) . ';
                  border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 94) . ';
                  font-size: ' . $styledata[78] . 'px;

              }
              .oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_content{
                  padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 134) . ';
              }
              .oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_C_A{
                  font-size: ' . $styledata[150] . 'px;
                  padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 162) . ';
              }
              .oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_C_A2{
                  font-size: ' . $styledata[178] . 'px;
                  padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 190) . ';
              }
                }

                @media only screen and (max-width : 668px){
                    .oxi_addons_FI_2_' . $oxiid . '{
                        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 31) . ';
                    }
                    .oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_row{
                        max-width: ' . $styledata[5] . 'px;
                        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 15) . ';
                        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 207) . ';
                    }
                    .oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_icon{
                        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 63) . ';
                    }
                    .oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_icon .oxi-icons{
                        width: ' . $styledata[87] . 'px;
                        height: ' . $styledata[91] . 'px;
                        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 111) . ';
                        border-radius:' . OxiAddonsPaddingMarginSanitize($styledata, 95) . ';
                        font-size: ' . $styledata[79] . 'px;

                    }
                    .oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_content{
                        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 135) . ';
                    }
                    .oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_C_A{
                        font-size: ' . $styledata[151] . 'px;
                        padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 163) . ';
                    }
                    .oxi_addons_FI_2_' . $oxiid . ' .oxi_addons_FI_2_C_A2{
                        font-size: ' . $styledata[179] . 'px;
                        padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 191) . ';
                    }
                }';
   echo OxiAddonsInlineCSSData($css);
}
