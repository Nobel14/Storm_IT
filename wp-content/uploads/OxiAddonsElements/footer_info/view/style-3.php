<?php

if (!defined('ABSPATH'))
    exit;


function oxi_footer_info_style_3_shortcode($styledata = false, $listdata = false, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    
    $contact = $address = $phone = $email = '';
    if ($stylefiles[2] != '') {
        $contact = '<div class="oxi_addons_FI_3_contact" ' . OxiAddonsAnimation($styledata, 51) . '>' . OxiAddonsTextConvert($stylefiles[2]) . '</div>';
    }
    if ($stylefiles[4] != '') {
        $address = '<div class="oxi_addons_FI_3_address" ' . OxiAddonsAnimation($styledata, 51) . '>' . OxiAddonsTextConvert($stylefiles[4]) . '</div>';
    }
    if ($stylefiles[6] != '') {
        $phone = '<div class="oxi_addons_FI_3_phone" ' . OxiAddonsAnimation($styledata, 51) . '>' . OxiAddonsTextConvert($stylefiles[6]) . '</div>';
    }
    if ($stylefiles[8] != '') {
        $email = ' <div class="oxi_addons_FI_3_email" ' . OxiAddonsAnimation($styledata, 51) . '>' . OxiAddonsTextConvert($stylefiles[8]) . '</div>';
    }
     
    echo '<div class="oxi-addons-container">
        <div class="oxi_addons_FI_3_' . $oxiid . '">
            <div class="oxi_addons_FI_3_row">
                    ' .$contact. '
                    ' .$address. '
                    ' .$phone. '
                    ' .$email. '
                    <div class="oxi_addons_FI_3_icon-area">';
                    foreach ($listdata as $value) {
                    $listitemdata = explode('||#||', $value['files']);
                        echo '<a ' . OxiAddonsAnimation($styledata, 51) . ' class="oxi-icons ' . OxiAddonsAdminDefine($user) . '" href="' . OxiAddonsUrlConvert($listitemdata[4]) . '" target="' . $styledata[195] . '">'.oxi_addons_font_awesome($listitemdata[2]).'';
                              if ($user == 'admin') {
                                echo '  <div class="oxi-addons-admin-absulote">
                                                <div class="oxi-addons-admin-absulate-edit">
                                                    <form method="post"> ' . wp_nonce_field("OxiAddonsListFileEditfooter_infodata") . '
                                                        <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                                        <button class="btn btn-primary" type="submit" value="edit" name="OxiAddonsListFileEdit">Edit</button>
                                                    </form>
                                                </div>
                                                <div class="oxi-addons-admin-absulate-delete">
                                                    <form method="post">  ' . wp_nonce_field("OxiAddonsListFileDeletefooter_infodata") . '
                                                        <input type="hidden" name="oxi-item-id" value="' . $value['id'] . '">
                                                        <button class="btn btn-danger " type="submit" value="delete" name="OxiAddonsListFileDelete">Delete</button>
                                                    </form>
                                                </div>
                                            </div>';
                                 }
                                echo '</a>';
                    }
                echo '</div>
            </div>
        </div>
    </div>';

    $css = '.oxi_addons_FI_3_' . $oxiid . '{
            width: 100%;
            float: left;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 29) . ';
        }
        .oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_row{
            width: 100%;
            margin: auto;
            border: ' . $styledata[7] .'px ' . $styledata[8] .'  ' . $styledata[11] .';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 13) . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 45) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 59) . ';
            ' . OxiAddonsBGImage($styledata, 55) . ';
            overflow: auto;
        }
        .oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_contact{
            width: 100%;
            float: left;
            font-size: ' . $styledata[75] . 'px;
            color: ' . $styledata[79] . ';
            ' . OxiAddonsFontSettings($styledata, 81) . '
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 87) . ';
        }
        .oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_address{
            width: 100%;
            float: left;
            font-size: ' . $styledata[103] . 'px;
            color: ' . $styledata[107] . ';
            ' . OxiAddonsFontSettings($styledata, 109) . '
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 115) . ';
        }
        .oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_phone{
            width: 100%;
            float: left;
            font-size: ' . $styledata[131] . 'px;
            color: ' . $styledata[135] . ';
            ' . OxiAddonsFontSettings($styledata, 137) . '
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 143) . ';
        }
        .oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_email{
            width: 100%;
            float: left;
            font-size: ' . $styledata[159] . 'px;
            color: ' . $styledata[163] . ';
            ' . OxiAddonsFontSettings($styledata, 165) . '
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 171) . ';
        }
        .oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_icon-area{
            width: 100%;
            float: left;
            text-align:' . $styledata[197] . ';
        }
        .oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_icon-area .oxi-icons{
            font-size: ' . $styledata[187] . 'px;
            color: ' . $styledata[191] . ';
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 199) . ';
        }
        .oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_icon-area .oxi-icons:hover{
            color: ' . $styledata[193] . ';
        }

        @media only screen and (min-width : 669px) and (max-width : 993px){
           .oxi_addons_FI_3_' . $oxiid . '{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 30) . ';
        }
        .oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_row{
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 14) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 60) . ';
        }
        .oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_contact{
            font-size: ' . $styledata[76] . 'px;
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 88) . ';
        }
        .oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_address{
            font-size: ' . $styledata[104] . 'px;
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 116) . ';
        }
        .oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_phone{
            font-size: ' . $styledata[132] . 'px;
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 144) . ';
        }
        .oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_email{
            font-size: ' . $styledata[160] . 'px;
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 172) . ';
        }
        .oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_icon-area .oxi-icons{
            font-size: ' . $styledata[188] . 'px;
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 200) . ';
        }
           
        }
         @media only screen and (max-width : 668px){
             .oxi_addons_FI_3_' . $oxiid . '{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 31) . ';
        }
        .oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_row{
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 15) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 61) . ';
        }
        .oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_contact{
            font-size: ' . $styledata[77] . 'px;
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 89) . ';
        }
        .oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_address{
            font-size: ' . $styledata[105] . 'px;
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 117) . ';
        }
        .oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_phone{
            font-size: ' . $styledata[133] . 'px;
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 145) . ';
        }
        .oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_email{
            font-size: ' . $styledata[161] . 'px;
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 173) . ';
        }
        .oxi_addons_FI_3_' . $oxiid . ' .oxi_addons_FI_3_icon-area .oxi-icons{
            font-size: ' . $styledata[189] . 'px;
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 201) . ';
        }

         }';
    echo OxiAddonsInlineCSSData($css);
}
