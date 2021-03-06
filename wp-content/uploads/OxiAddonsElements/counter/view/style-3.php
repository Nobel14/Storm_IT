<?php

if (!defined('ABSPATH'))
    exit;

function oxi_counter_style_3_shortcode($styledata = FALSE, $listdata = FALSE, $user = 'user') {
    echo oxi_addons_public_waypoints();
    $stylename = $styledata['style_name'];
    $datatype = $styledata['type'] . 'data';
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    $css = '';
    $title = $icon = $divider = $number = '';
    echo '<div class="oxi-addons-container ">'
	. '<div class="oxi-addons-row oxi-addons-center">';
    foreach ($listdata as $value) {
        $listfiles = explode('||#||', $value['files']);
        echo '<div class = "' . OxiAddonsItemRows($styledata, 17) . ' ' . OxiAddonsAdminDefine($user) . '" ' . OxiAddonsAnimation($styledata, 11) . '>
                    <div class="oxi-addons-counter-' . $oxiid . '">
                        <div class="oxi-addons-counter-row">';
        if (!empty($listfiles[3])) {
            $title = '<div class="oxi-addons-counter-body-data"> <div class="oxi-addons-counter-title">' . OxiAddonsTextConvert($listfiles[3]) . '</div></div>';
        }
        if (!empty($listfiles[5])) {
            $icon = '<div class="oxi-addons-counter-body-data"> <div class="oxi-addons-counter-icon">' . oxi_addons_font_awesome($listfiles[5]) . '</div></div>';
        }
        if (!empty($styledata[187])) {
            $divider = '<div class="oxi-addons-counter-body-data"> <div class="oxi-addons-counter-divider"><div class="oxi-divider-left"><div class="oxi-divider"></div></div></div></div>';
        }
        if (!empty($listfiles[1])) {
            $number = '<div class="oxi-addons-counter-body-data"> <div class="oxi-addons-counter-number">' . OxiAddonsTextConvert($listfiles[1]) . '</div></div>';
        }
        $rearrange = explode(',', $styledata[3]);
        foreach ($rearrange as $arrange) {
            echo $$arrange;
        }
        echo '</div>';
        if ($user == 'admin') {
            echo '  <div class="oxi-addons-admin-absulote">
                            <div class="oxi-addons-admin-absulate-edit">
                                <form method="post"> ' . wp_nonce_field("OxiAddonsListFileEdit$datatype") . '
                                    <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                    <button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
                                </form>
                            </div>
                            <div class="oxi-addons-admin-absulate-delete">
                                <form method="post">  ' . wp_nonce_field("OxiAddonsListFileDelete$datatype") . '
                                    <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                    <button class="btn btn-danger " type="submit" value="delete" name="OxiAddonsListFileDelete">Delete</button>
                                </form>
                            </div>
                        </div>';
        }
        echo '</div></div>';
    }
    echo '</div></div>';
    if ($styledata[15] == 'left') {
        $textalign = 'margin: 0 auto 0 0 !important';
    } elseif ($styledata[15] == 'center') {
        $textalign = 'margin: 0 auto';
    } else {
        $textalign = 'margin: 0 0 0 auto !important';
    }
    $css .= '.oxi-addons-counter-' . $oxiid . '{
                    width:100%;
                    float:left;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 21) . ';
                }
                .oxi-addons-counter-' . $oxiid . ' .oxi-addons-counter-row{
                    width: 100%;
                    float: left;
                    ' . OxiAddonsBGImage($styledata, 193) . ';
                    border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 197) . ' ;
                    border-style: ' . $styledata[213] . ';
                    border-color: ' . $styledata[214] . ';
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 217) . ' ;
                    padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 233) . ' ;
                    ' . OxiAddonsBoxShadowSanitize($styledata, 249) . ';
                }
                .oxi-addons-counter-' . $oxiid . ' .oxi-addons-counter-body-data{
                    width:100%;
                    float:left;
                    text-align: ' . $styledata[15] . ' !important;
                }
                .oxi-addons-counter-' . $oxiid . ' .oxi-addons-counter-title{
                    float:left;
                    width:100%;
                    font-size: ' . $styledata[37] . 'px;
                    color:' . $styledata[41] . ';
                    ' . OxiAddonsFontSettings($styledata, 43) . '
                    padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 49) . ';
                }
                .oxi-addons-counter-' . $oxiid . ' .oxi-addons-counter-number{
                    float:left;
                    width:100%;
                    font-size: ' . $styledata[65] . 'px;
                    color:' . $styledata[69] . ';
                    ' . OxiAddonsFontSettings($styledata, 71) . '
                    padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 77) . ';
                }
                 .oxi-addons-counter-' . $oxiid . ' .oxi-addons-counter-icon{
                    width: ' . $styledata[97] . 'px;
                    height:' . $styledata[97] . 'px;
                    display: inline-flex;
                    align-items: center;
                    justify-content: center;
                    ' . OxiAddonsBGImage($styledata, 103) . '
                    border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 107) . ';
                    border-color:' . $styledata[124] . ';
                    border-style: ' . $styledata[123] . ';
                    border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 127) . ';
                    margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 143) . ';
                }
                .oxi-addons-counter-' . $oxiid . ' .oxi-icons{
                    font-size: ' . $styledata[93] . 'px;
                    color:' . $styledata[101] . ';
                }
                .oxi-addons-counter-' . $oxiid . ' .oxi-addons-counter-divider{
                    position: relative;
                    display: table;
                    width: 100%;
                    max-width:' . $styledata[159] . 'px;
                    padding:' . OxiAddonsPaddingMarginSanitize($styledata, 171) . ';
                    ' . $textalign . '
                }
               .oxi-addons-counter-' . $oxiid . ' .oxi-divider-left{
                    display: table-cell;
                    width: 100%;
                    vertical-align: middle;
                }
               .oxi-addons-counter-' . $oxiid . ' .oxi-divider-left .oxi-divider {
                    border-top-style: ' . $styledata[167] . ';
                    border-top-color: ' . $styledata[168] . ';
                    border-top-width: ' . $styledata[163] . 'px;
                    margin-top: 1px;
                }
                @media only screen and (min-width : 669px) and (max-width : 993px){
                  .oxi-addons-counter-' . $oxiid . '{
                        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 22) . ';
                    }
                    .oxi-addons-counter-' . $oxiid . ' .oxi-addons-counter-title{
                        font-size: ' . $styledata[38] . 'px;
                        padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 50) . ';
                    }
                    .oxi-addons-counter-' . $oxiid . ' .oxi-addons-counter-number{
                        font-size: ' . $styledata[66] . 'px;
                        padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 78) . ';
                    }
                     .oxi-addons-counter-' . $oxiid . ' .oxi-addons-counter-icon{
                        width: ' . $styledata[98] . 'px;
                        height:' . $styledata[98] . 'px;
                        border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 108) . ';
                        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 128) . ';
                        margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 144) . ';
                    }
                    .oxi-addons-counter-' . $oxiid . ' .oxi-icons{
                        font-size: ' . $styledata[94] . 'px;
                    }
                    .oxi-addons-counter-' . $oxiid . ' .oxi-addons-counter-divider{
                        max-width:' . $styledata[160] . 'px;
                        padding:' . OxiAddonsPaddingMarginSanitize($styledata, 172) . ';
                    }
                   .oxi-addons-counter-' . $oxiid . ' .oxi-divider-left .oxi-divider {
                        border-top-width: ' . $styledata[164] . 'px;
                    }
                }
                @media only screen and (max-width : 668px){
                   .oxi-addons-counter-' . $oxiid . '{
                        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 23) . ';
                    }
                    .oxi-addons-counter-' . $oxiid . ' .oxi-addons-counter-title{
                        font-size: ' . $styledata[39] . 'px;
                        padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 51) . ';
                    }
                    .oxi-addons-counter-' . $oxiid . ' .oxi-addons-counter-number{
                        font-size: ' . $styledata[67] . 'px;
                        padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 79) . ';
                    }
                     .oxi-addons-counter-' . $oxiid . ' .oxi-addons-counter-icon{
                        width: ' . $styledata[99] . 'px;
                        height:' . $styledata[99] . 'px;
                        border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 109) . ';
                        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 129) . ';
                        margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 145) . ';
                    }
                    .oxi-addons-counter-' . $oxiid . ' .oxi-icons{
                        font-size: ' . $styledata[95] . 'px;
                    }
                    .oxi-addons-counter-' . $oxiid . ' .oxi-addons-counter-divider{
                        max-width:' . $styledata[161] . 'px;
                        padding:' . OxiAddonsPaddingMarginSanitize($styledata, 173) . ';
                    }
                   .oxi-addons-counter-' . $oxiid . ' .oxi-divider-left .oxi-divider {
                        border-top-width: ' . $styledata[165] . 'px;
                    }
                }
                ';
    $jquery = 'jQuery(".oxi-addons-counter-' . $oxiid . ' .oxi-addons-counter-number").counterUp({
                        delay: ' . ($styledata[191] * 1000) . ',
                        time: ' . ($styledata[189] * 1000) . '
                    })';

    echo OxiAddonsInlineCSSData($css);
    echo oxi_addons_elements_stylejs('jquery-counterup-min', 'counter', 'js');
    echo OxiAddonsInlineCSSData($jquery, 'js', 'oxi-addons-jquery-counterup-min');
}
