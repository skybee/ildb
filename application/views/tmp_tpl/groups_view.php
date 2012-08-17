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
                            <div id="check_all_block">
                                <input type="checkbox" name="check_all" id="check_all" />
                            </div>
<!--                            <div class="add_group_top_btn"></div>-->

                            <a href="#" class="top_left_btn_action" style="left:50px;">Добавить</a>
                            
                            <a href="#" class="top_left_btn top_left_btn_left top_left_btn_del"         style="left:160px;"><div></div></a>
                            <a href="#" class="top_left_btn top_left_btn_right top_left_btn_catalog"   style="left:200px;"><div></div></a>
                            
                            <a href="#" class="top_left_btn top_left_btn_list" style="left:250px; width: 75px;">
                                <div>Статус</div>
                            </a>
                            
                            <div class="filter_group_top">
                                <input type="text" name="group_filter" id="group_filter" />
                            </div>
                        </div>
                    </div>
                    
                    <table class="group_tbl">
                        <tr class="group_first_tr">
                            <td></td>
                            <td></td>
                            <td>Группа</td>
                            <td>Язык</td>
                            <td>Уровень</td>
                            <td>Кол-во</td>
                            <td>Режим работы</td>
                            <td>Статус</td>
                        </tr>
                        
                        <?for($i=0; $i<=1; $i++): ?>
                        
                        <tr>
                            <td><input type="checkbox" name="tmp[]" /></td>
                            <td class="group_tbl_star"></td>
                            <td><a href="#">Superstereo PhonicsSound</a></td>
                            <td>En</td>
                            <td>B1</td>
                            <td>8</td>
                            <td>Пн <span>(18:00)</span>. Ср <span>(18:00)</span>. Пт <span>(19:00)</span></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="tmp[]" /></td>
                            <td class="group_tbl_star"></td>
                            <td><a href="#">CrazyStarPearls</a></td>
                            <td>En</td>
                            <td>B2</td>
                            <td>10</td>
                            <td>Вт <span>(16:00)</span>. Чт <span>(19:00)</span></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="tmp[]" /></td>
                            <td class="group_tbl_star"></td>
                            <td><a href="#">Nachos</a></td>
                            <td>De</td>
                            <td>A2</td>
                            <td>7</td>
                            <td>Пн <span>(18:00)</span>. Ср <span>(18:00)</span></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="tmp[]" /></td>
                            <td class="group_tbl_star"></td>
                            <td><a href="#">Pinckertones</a></td>
                            <td>Es</td>
                            <td>B1</td>
                            <td>12</td>
                            <td>Вт <span>(16:00)</span>. Чт <span>(19:00)</span></td>
                            <td></td>
                        </tr>
                        
                        <? endfor; ?>
                        
                    </table>
                </div>
                </div>
            </div>
        </center>
    </body>
</html>