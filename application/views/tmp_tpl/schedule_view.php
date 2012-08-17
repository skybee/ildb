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
            <div id="main">
                <div id="top_block">
                    <h1>Группы</h1>
                    <div id="top_option_btn"></div>
                    <div id="top_calendar_btn"></div>
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
                    <div id="left_menu">

                        <div id="left_menu_relative">

                            <div id="left_menu_small">
                                <a class="left_menu_btn small_menu_search_btn" href="javascript:void(0)" ></a>
                                <a class="left_menu_btn" href="" ><span id="bg_left_menu_student" class="left_manu_img"></span></a>
                                <a class="left_menu_btn" href="" ><span id="bg_left_menu_groups" class="left_manu_img"></span></a>
                                <a class="left_menu_btn" href="" ><span id="bg_left_menu_teacher" class="left_manu_img"></span></a>
                                <a class="left_menu_btn" href="" ><span id="bg_left_menu_pay" class="left_manu_img"></span></a>
                                <a class="left_menu_btn" href="" ><span id="bg_left_menu_report" class="left_manu_img"></span></a>
                                <a class="left_menu_btn" href="" ><span id="bg_left_menu_ticket" class="left_manu_img">24</span></a>
                                <a class="left_menu_btn" href="" ><span id="bg_left_menu_options" class="left_manu_img"></span></a>
                                <a class="left_menu_btn" href="" ><span id="bg_left_menu_help" class="left_manu_img"></span></a>
                            </div>


                            <div class="left_menu_width">


                                <div id="left_menu_search">
                                    <form action="#" method="post">
                                        <input type="text" name="search" />
                                    </form>
                                </div>

                                <a class="left_menu_btn" href="" >
                                    Студенты 
                                    <span>(136)</span> 
                                    <span id="bg_left_menu_student" class="left_manu_img"></span> 
                                </a>
                                <a class="left_menu_btn" href="" >
                                    Группы 
                                    <span>(19)</span> 
                                    <span id="bg_left_menu_groups" class="left_manu_img"></span>
                                </a>
                                <a class="left_menu_btn" href="" >
                                    Преподаватели 
                                    <span>(8)</span>
                                    <span id="bg_left_menu_teacher" class="left_manu_img"></span>
                                </a>
                                <a class="left_menu_btn" href="" >
                                    Оплаты
                                    <span id="bg_left_menu_pay" class="left_manu_img"></span>
                                </a>
                                <a class="left_menu_btn" href="" >
                                    Отчеты
                                    <span id="bg_left_menu_report" class="left_manu_img"></span>
                                </a>
                                <a class="left_menu_btn" href="" >
                                    Уведомления
                                    <span id="bg_left_menu_ticket" class="left_manu_img">24</span>
                                </a>
                                <a class="left_menu_btn" href="" >
                                    Настройки
                                    <span id="bg_left_menu_options" class="left_manu_img"></span>
                                </a>
                                <a class="left_menu_btn" href="" >
                                    Помощь
                                    <span id="bg_left_menu_help" class="left_manu_img"></span>
                                </a>

                                <a href="#" id="left_menu_memo_btn" >Напоминания</a>

                            </div><!-- left_menu_width -->
                        </div><!-- /left_menu_relative -->
                    </div><!-- /left menu -->

                    <div id="right_content">
                        <div id="content_top_block">
                            <div id="group_top_block">

                                <a href="#" class="top_left_btn_action" style="left:10px;">Добавить</a>

                                <a href="#" class="top_left_btn top_left_btn_left top_left_btn_movement"         style="left:120px;"><div></div></a>
                                <a href="#" class="top_left_btn top_left_btn_center top_left_btn_movement2"         style="left:160px;"><div></div></a>
                                <a href="#" class="top_left_btn top_left_btn_center top_left_btn_close"         style="left:200px;"><div></div></a>
                                <a href="#" class="top_left_btn top_left_btn_right top_left_btn_timer"         style="left:240px;"><div></div></a>

                                <a href="#" class="top_left_btn top_left_btn_left top_left_btn_sort"         style="left:300px;"><div></div></a>
                                <a href="#" class="top_left_btn top_left_btn_center top_left_btn_x0"         style="left:340px;"><div></div></a>
                                <a href="#" class="top_left_btn top_left_btn_center top_left_btn_x1"         style="left:380px;"><div></div></a>
                                <a href="#" class="top_left_btn top_left_btn_right top_left_btn_x2"         style="left:420px;"><div></div></a>

                                <div class="filter_group_top">
                                    <input type="text" name="group_filter" id="group_filter" />
                                </div>
                            </div>
                        </div>


                        <div id="main_schadule">
                            <div class="main_schadule_tbl">
                                <div class="main_sch_vline main_sch_time_vline">
                                    <div class="sch_class_name"></div>
                                    
                                    <div class="sch_day_name">Пн</div>
                                    <div class="sch_day_in_group">
                                        <div class="sch_time_td">9:00</div>
                                        <div class="sch_time_td">10:00</div>
                                        <div class="sch_time_td">11:00</div>
                                        <div class="sch_time_td">12:00</div>
                                        <div class="sch_time_td">13:00</div>
                                        <div class="sch_time_td">14:00</div>
                                        <div class="sch_time_td">15:00</div>
                                        <div class="sch_time_td">16:00</div>
                                        <div class="sch_time_td">17:00</div>
                                        <div class="sch_time_td">18:00</div>
                                        <div class="sch_time_td">19:00</div>
                                        <div class="sch_time_td">20:00</div>
                                        <div class="sch_time_td">21:00</div>
                                    </div>
                                    <!-- Day -->
                                    <div class="sch_day_name">Вт</div>
                                    <div class="sch_day_in_group">
                                        <div class="sch_time_td">9:00</div>
                                        <div class="sch_time_td">10:00</div>
                                        <div class="sch_time_td">11:00</div>
                                        <div class="sch_time_td">12:00</div>
                                        <div class="sch_time_td">13:00</div>
                                        <div class="sch_time_td">14:00</div>
                                        <div class="sch_time_td">15:00</div>
                                        <div class="sch_time_td">16:00</div>
                                        <div class="sch_time_td">17:00</div>
                                        <div class="sch_time_td">18:00</div>
                                        <div class="sch_time_td">19:00</div>
                                        <div class="sch_time_td">20:00</div>
                                        <div class="sch_time_td">21:00</div>
                                    </div>
                                    <!-- Day -->
                                    <div class="sch_day_name">Ср</div>
                                    <div class="sch_day_in_group">
                                        <div class="sch_time_td">9:00</div>
                                        <div class="sch_time_td">10:00</div>
                                        <div class="sch_time_td">11:00</div>
                                        <div class="sch_time_td">12:00</div>
                                        <div class="sch_time_td">13:00</div>
                                        <div class="sch_time_td">14:00</div>
                                        <div class="sch_time_td">15:00</div>
                                        <div class="sch_time_td">16:00</div>
                                        <div class="sch_time_td">17:00</div>
                                        <div class="sch_time_td">18:00</div>
                                        <div class="sch_time_td">19:00</div>
                                        <div class="sch_time_td">20:00</div>
                                        <div class="sch_time_td">21:00</div>
                                    </div>
                                </div>                        

                                <div class="main_sch_vline">
                                    <div class="sch_class_name">Deep Purple<span>(DP-10)</span></div>
                                    <div class="sch_day_name"></div>
                                    <div class="sch_day_in_group">
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop">
                                            <div class="sch_drag"  timesize="2">
                                                <div class="visual_drag">
                                                    <div class="shc_vertical_line"></div>
                                                    <div class="sch_drag_groupname">Crazy Star Pearls Stom</div>
                                                    <div class="sch_drag_teachername">Наталья Рубанова</div>
                                                    <div class="sch_drag_langname"><span>FR</span> 9</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                    </div>
                                    <!-- Day -->
                                    <div class="sch_day_name"></div>
                                    <div class="sch_day_in_group">
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop">
                                            <div class="sch_drag"  timesize="2">
                                                <div class="visual_drag">
                                                    <div class="shc_vertical_line"></div>
                                                    <div class="sch_drag_groupname">Crazy Star Pearls Stom</div>
                                                    <div class="sch_drag_teachername">Наталья Рубанова</div>
                                                    <div class="sch_drag_langname"><span>FR</span> 9</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                    </div>
                                    <!-- Day -->
                                    <div class="sch_day_name"></div>
                                    <div class="sch_day_in_group">
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop">
                                            <div class="sch_drag"  timesize="2">
                                                <div class="visual_drag">
                                                    <div class="shc_vertical_line"></div>
                                                    <div class="sch_drag_groupname">Crazy Star Pearls Stom</div>
                                                    <div class="sch_drag_teachername">Наталья Рубанова</div>
                                                    <div class="sch_drag_langname"><span>FR</span> 9</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                    </div>
                                </div>

                                <div class="main_sch_vline">
                                    <div class="sch_class_name">Yellow Submarine<span>(YS-8)</span></div>
                                    <div class="sch_day_name"></div>
                                    <div class="sch_day_in_group">
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                    </div>
                                    <!-- Day -->
                                    <div class="sch_day_name"></div>
                                    <div class="sch_day_in_group">
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                    </div>
                                    <!-- Day -->
                                    <div class="sch_day_name"></div>
                                    <div class="sch_day_in_group">
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                    </div>
                                </div>

                                <div class="main_sch_vline">
                                    <div class="sch_class_name">Alles Adzuro<span>(AA-11)</span></div>
                                    <div class="sch_day_name"></div>
                                    <div class="sch_day_in_group">
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                    </div>
                                    <!-- Day -->
                                    <div class="sch_day_name"></div>
                                    <div class="sch_day_in_group">
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                    </div>
                                    <!-- Day -->
                                    <div class="sch_day_name"></div>
                                    <div class="sch_day_in_group">
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                    </div>
                                </div>

                                <div class="main_sch_vline">
                                    <div class="sch_class_name">The Vert<span>(TVR-6)</span></div>
                                    <div class="sch_day_name"></div>
                                    <div class="sch_day_in_group">
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop">
                                            <div class="sch_drag" timesize="2">
                                                <div class="visual_drag">
                                                    <div class="shc_vertical_line"></div>
                                                    <div class="sch_drag_groupname">Crazy Star Pearls Stom</div>
                                                    <div class="sch_drag_teachername">Наталья Рубанова</div>
                                                    <div class="sch_drag_langname"><span>FR</span> 9</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                    </div>
                                    <!-- Day -->
                                    <div class="sch_day_name"></div>
                                    <div class="sch_day_in_group">
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                    </div>
                                    <!-- Day -->
                                    <div class="sch_day_name"></div>
                                    <div class="sch_day_in_group">
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop">
                                            <div class="sch_drag" timesize="2">
                                                <div class="visual_drag">
                                                    <div class="shc_vertical_line"></div>
                                                    <div class="sch_drag_groupname">Crazy Star Pearls Stom</div>
                                                    <div class="sch_drag_teachername">Наталья Рубанова</div>
                                                    <div class="sch_drag_langname"><span>FR</span> 9</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                    </div>
                                </div>
                                <div class="main_sch_vline">
                                    <div class="sch_class_name">Lemon Tree<span>(LTR-9)</span></div>
                                    <div class="sch_day_name"></div>
                                    <div class="sch_day_in_group">
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                    </div>
                                    <!-- Day -->
                                    <div class="sch_day_name"></div>
                                    <div class="sch_day_in_group">
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                    </div>
                                    <!-- Day -->
                                    <div class="sch_day_name"></div>
                                    <div class="sch_day_in_group">
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                    </div>
                                </div>
                                <div class="main_sch_vline">
                                    <div class="sch_class_name">Lipstick<span>(LST-8)</span></div>
                                    <div class="sch_day_name"></div>
                                    <div class="sch_day_in_group">
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                    </div>
                                    <!-- Day -->
                                    <div class="sch_day_name"></div>
                                    <div class="sch_day_in_group">
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                    </div>
                                    <!-- Day -->
                                    <div class="sch_day_name"></div>
                                    <div class="sch_day_in_group">
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop">
                                            <div class="sch_drag" timesize="2">
                                                <div class="visual_drag">
                                                    <div class="shc_vertical_line"></div>
                                                    <div class="sch_drag_groupname">Crazy Star Pearls Stom</div>
                                                    <div class="sch_drag_teachername">Наталья Рубанова</div>
                                                    <div class="sch_drag_langname"><span>FR</span> 9</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                        <div class="sch_time_td sch_drop"></div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>  
                    </div>
                </div>
            </div>
        </center>
    </body>
</html>