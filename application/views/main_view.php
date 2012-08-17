<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title></title>
        
        <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
        
        <script type="text/javascript" src="/js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="/js/jquery-ui-1.8.18.custom.min.js"></script>
        <script type="text/javascript" src="/js/jquery.ezmark.min.js"></script>
        <script type="text/javascript" src="/js/chosen.jquery.min.js"></script>
        <script type="text/javascript" src="/js/jquery.ui.datepicker-ru.js"></script>
        <script type="text/javascript" src="/js/jquery.mousewheel.js"></script>
        <script type="text/javascript" src="/js/jquery.jscrollpane.min.js"></script>
        <script type="text/javascript" src="/js/jquery.form.js"></script>
        <script type="text/javascript" src="/js/form_action.js"></script>
        <script type="text/javascript" src="/js/style.js"></script>
        <script type="text/javascript" src="/js/schedule.js"></script>
        <script type="text/javascript" src="/js/main.js"></script>
        
        <link rel="stylesheet" type="text/css" href="/css/reset.css" />
        <link rel="stylesheet" type="text/css" href="/css/ezmark.css" />
        <link rel="stylesheet" type="text/css" href="/css/chosen.css" />
        <link rel="stylesheet" type="text/css" href="/css/flick/jquery-ui-1.8.18.custom.css" />
        <link rel="stylesheet" type="text/css" href="/css/jquery.jscrollpane.css" />
        <link rel="stylesheet" type="text/css" href="/css/main.css" />
    </head>
    <body>
        <center>
            
            
            <!-- MODAL WINDOW -->
            <div id="modal_bg">
                <center>
                    <div id="modal_dialog_block">
                        <div id="modal_dialog_close" onclick="close_modal()"></div>
                        <div id="modal_dialog_title"></div>
                        <div id="modal_dialog_content"></div>
                    </div>
                </center>
            </div>
            <!-- /MODAL WINDOW -->
            
            
            
            <div id="main">
                <div id="top_block">
                    <h1><? if( isset($title) ) echo $title?></h1>
                    <div id="top_option_btn"></div>
                    <div id="top_calendar_btn" onclick="document.location.href='/schedule/'"></div>
                    <div id="top_back_btn"></div>
                    
                    <div id="top_sitename_btn" class="show_slide_list">
                        iLingua
                        <div class="slide_list_block" style="width: 140px; top: 27px; right: -13px;">
                            <ul>
                                <li><a href="#">Изменить аккаунт</a></li>
                                <li><a href="#">Выйти</a></li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
                <div id="center">
                <!-- LEFT MENU -->      <?=$left_menu?>     <!-- /LEFT MENU -->
                <!-- RIGHT BLOCK -->    <?=$right_content?> <!-- RIGHT BLOCK -->
                </div>
            </div>
        </center>
    </body>
</html>