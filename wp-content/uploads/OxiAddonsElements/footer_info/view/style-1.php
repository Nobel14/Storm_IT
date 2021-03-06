<?php

if (!defined('ABSPATH')) {
    exit;
}

function oxi_footer_info_style_1_shortcode($styledata = false, $listdata = false, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);

    $icon = $text = $headersection = $phone = $email = $contentsection = '';
     if ($stylefiles[2] != '') {
        $icon = '<div class="oxi_addons_FI_1_icon">'.oxi_addons_font_awesome('' . OxiAddonsTextConvert($stylefiles[2]) . '').'</div>';
    }
    if ($stylefiles[4] != '') {
        $text = '<div class="oxi_addons_FI_1_T">' . OxiAddonsTextConvert($stylefiles[4]) . '</div>';
    }
     if ($icon != '' || $text != '') {
        $headersection = '<div class="oxi_addons-FI_1_header_body">
                                    <div class="oxi_addons_FI_1_header">
                                        '.$icon.'
                                        '.$text.'
                                    </div>
                                </div>';
    }
    if ($stylefiles[6] != '') {
        $phone = '<div class="oxi_addons_FI_1_phone">' . OxiAddonsTextConvert($stylefiles[6]) . '</div>';
    }
     if ($stylefiles[8] != '') {
        $email = '<div class="oxi_addons_FI_1_email">' . OxiAddonsTextConvert($stylefiles[8]) . '</div>';
    }
     if ($phone != '' || $email != '') {
        $contentsection = '<div class="oxi_addons-FI_1_footer_body">
                            '.$phone.'
                            '.$email.'
                        </div>';
    }
    echo '<div class="oxi-addons-container">
        <div class="oxi_addons_FI_1_' .$oxiid. '">
            <div class="oxi_addons_FI_1_row" ' . OxiAddonsAnimation($styledata, 35) . '>
                '.$headersection.'
                '.$contentsection.' 
            </div>
        </div>
    </div>';  
 $css = '.oxi_addons_FI_1_' .$oxiid. '{
        width: 100%;
        float: left;
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 13) . ';
    }
    .oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_row{
        width: 100%;
        max-width: ' . $styledata[3] . 'px;
        margin: auto;
        border: ' . $styledata[7] .'px ' . $styledata[8] .'  ' . $styledata[11] .';
        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 191) . ';
        ' . OxiAddonsBoxShadowSanitize($styledata, 29) . ';
        overflow: auto;
    }
    .oxi_addons_FI_1_' .$oxiid. ' .oxi_addons-FI_1_header_body{
        width: 100%;
        float: left;
        ' . OxiAddonsBGImage($styledata, 39) . ';
        text-align:' . $styledata[43] . ';
        padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 45) . ';
    }
    .oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_header{
        width: 100%;
        float: left;
    }
    .oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_icon{
        width: 100%;
        float: left;
    }
    .oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_icon .oxi-icons{
        font-size: ' . $styledata[63] . 'px;
        color: ' . $styledata[61] . ';
        text-align:' . $styledata[67] . ';
        padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 69) . ';
    }
    .oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_T{
        width: 100%;
        float: left;
        font-size: ' . $styledata[85] . 'px;
        color: ' . $styledata[89] . ';
        ' . OxiAddonsFontSettings($styledata, 91) . '
        padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 97) . ';
    }
    .oxi_addons_FI_1_' .$oxiid. ' .oxi_addons-FI_1_footer_body{
        width: 100%;
        float: left;
         ' . OxiAddonsBGImage($styledata, 113) . ';
        text-align:' . $styledata[117] . ';
        padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 119) . ';
    }
    .oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_phone{
        width: 100%;
        float: left;
        font-size: ' . $styledata[135] . 'px;
        color: ' . $styledata[139] . ';
        ' . OxiAddonsFontSettings($styledata, 141) . '
        padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 147) . ';
    }
    .oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_email{
        width: 100%;
        float: left;
        font-size: ' . $styledata[163] . 'px;
        color: ' . $styledata[167] . ';
        ' . OxiAddonsFontSettings($styledata, 169) . '
        padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 175) . ';
    }
    @media only screen and (min-width : 669px) and (max-width : 993px){
        .oxi_addons_FI_1_' .$oxiid. '{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 14) . ';
        }
        .oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_row{
            max-width: ' . $styledata[4] . 'px;
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 192) . ';
        }
        .oxi_addons_FI_1_' .$oxiid. ' .oxi_addons-FI_1_header_body{
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 46) . ';
        }
        .oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_icon .oxi-icons{
            font-size: ' . $styledata[64] . 'px;
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 70) . ';
        }
        .oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_T{
            font-size: ' . $styledata[86] . 'px;
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 98) . ';
        }
        .oxi_addons_FI_1_' .$oxiid. ' .oxi_addons-FI_1_footer_body{
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 120) . ';
        }
        .oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_phone{
            font-size: ' . $styledata[136] . 'px;
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 148) . ';
        }
        .oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_email{
            font-size: ' . $styledata[164] . 'px;
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 176) . ';
        } 
    }
    @media only screen and (max-width : 668px){
            .oxi_addons_FI_1_' .$oxiid. '{
               padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 15) . ';
           }
           .oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_row{
               max-width: ' . $styledata[5] . 'px;
               border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 193) . ';
           }
           .oxi_addons_FI_1_' .$oxiid. ' .oxi_addons-FI_1_header_body{
               padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 47) . ';
           }
           .oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_icon .oxi-icons{
               font-size: ' . $styledata[65] . 'px;
               padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 71) . ';
           }
           .oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_T{
               font-size: ' . $styledata[87] . 'px;
               padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 99) . ';
           }
           .oxi_addons_FI_1_' .$oxiid. ' .oxi_addons-FI_1_footer_body{
               padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 121) . ';
           }
           .oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_phone{
               font-size: ' . $styledata[137] . 'px;
               padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 149) . ';
           }
           .oxi_addons_FI_1_' .$oxiid. ' .oxi_addons_FI_1_email{
               font-size: ' . $styledata[165] . 'px;
               padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 177) . ';
           }
        }




';
    echo OxiAddonsInlineCSSData($css);
}
