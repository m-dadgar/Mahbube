jQuery(document).ready(function(){
    "use strict";
    function runImport(datatype, percent){
        jQuery.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
                'action': 'sampledata',
                'datatype':  datatype,
            },
            success: function(data, textStatus, XMLHttpRequest){
                // Change css import bar
                jQuery('.sns-importprocess-width').css({
                    'width' : percent + '%',
                    '-moz-transition' : 'width 1s',
                    '-o-transition' : 'width 1s',
                    '-webkit-transition' : 'width 1s',
                    'transition' : 'width 1s'
                });
                // Change message import info
                jQuery('#sns-importmsg .status').html(' Importing: ' + percent + '%');
                // Check result
                if ( datatype == 'theme' ){
                    jQuery('#sns-import-tablecontent ul li.theme-cfg i').attr('class', 'fa fa-check');
                    percent = percent + 20;
                    runImport("slider", percent);
                    jQuery('#sns-import-tablecontent ul li.revslider-cfg i').attr('class', 'fa fa-spin fa-circle-o-notch');
                }
                if ( datatype == 'slider' ){
                    jQuery('#sns-import-tablecontent ul li.revslider-cfg i').attr('class', 'fa fa-check');
                    percent = percent + 20;
                    runImport("content", percent);
                    jQuery('#sns-import-tablecontent ul li.all-content i').attr('class', 'fa fa-spin fa-circle-o-notch');
                }
                if ( datatype == 'content' ){
                    jQuery('#sns-import-tablecontent ul li.all-content i').attr('class', 'fa fa-check');
                    percent = percent + 20;
                    runImport("widget", percent);
                    jQuery('#sns-import-tablecontent ul li.widget-cfg i').attr('class', 'fa fa-spin fa-circle-o-notch');
                }
                if ( datatype == 'widget' ){
                    jQuery('#sns-import-tablecontent ul li.widget-cfg i').attr('class', 'fa fa-check');
                    runImport("media1", percent);
                    jQuery('#sns-import-tablecontent ul li.media1-files i').attr('class', 'fa fa-spin fa-circle-o-notch');
                }
                if ( datatype == 'media1' ){
                    jQuery('#sns-import-tablecontent ul li.media1-files i').attr('class', 'fa fa-check');
                    runImport("media2", percent);
                    jQuery('#sns-import-tablecontent ul li.media2-files i').attr('class', 'fa fa-spin fa-circle-o-notch');
                }
                if ( datatype == 'media2' ){
                    jQuery('#sns-import-tablecontent ul li.media2-files i').attr('class', 'fa fa-check');
                    runImport("media3", percent);
                    jQuery('#sns-import-tablecontent ul li.media3-files i').attr('class', 'fa fa-spin fa-circle-o-notch');
                }
                if ( datatype == 'media3' ){
                    jQuery('#sns-import-tablecontent ul li.media3-files i').attr('class', 'fa fa-check');
                     percent = percent + 20;
                    runImport("media4", percent);
                    jQuery('#sns-import-tablecontent ul li.media4-files i').attr('class', 'fa fa-spin fa-circle-o-notch');
                }
                if ( datatype == 'media4' ){
                    jQuery('#sns-importmsg').html('Import done!');
                    jQuery('#sns-import-tablecontent ul li.media4-files i').attr('class', 'fa fa-check');
                }
            }
        });
    }
    jQuery('#btn_sampledata').on('click', function(){
        var c = confirm("Are you want import demo content?");
        if (c == true) {
            jQuery('.sns-importprocess').show();
            jQuery(this).attr('disabled','true');
            jQuery('#sns-importmsg .status').html('Importing');
            runImport("theme", 20);
        }
    });
});