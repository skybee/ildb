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
                    
                    <center>
                        <div class="top_payment_navigation_block">
                            <a href="#" id="btn_top_date_vavigation_left"></a>
                            <a href="#" id="btn_top_date_vavigation_right"></a>
                            Оплаты: Январь 2012
                        </div>
                    </center>
                    
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

                            <div class="left_menu_payment_filter">
                                <div class="payment_filter_date_block">
                                    Дата оплаты
                                    <input type="text" name="payment_filter_date" />
                                    <div class="payment_filter_calendar_btn"></div>
                                </div>
                                <div class="payment_filter_summ_block">
                                    Сумма
                                    <input type="text" name="payment_filter_summ_start" />
                                    <input type="text" name="payment_filter_summ_stop" />
                                </div>
                                <div class="payment_filter_show_btn">Показать результат</div>
                            </div>

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
                        </div> <!-- /left_menu_width -->
                    </div> <!-- /left_menu_relative -->
                </div> <!-- /left menu -->
                    
                    
                <div id="right_content">
                    <div id="content_top_block">
                        <div id="group_top_block">
                            <div id="check_all_block">
                                <input type="checkbox" name="check_all" id="check_all" />
                            </div>
                            <a href="#" class="top_left_btn_action" style="left:50px;">Добавить</a>
                            
                            <a href="#" class="top_left_btn top_left_btn_left top_left_btn_del"        style="left:160px;"><div></div></a>
                            <a href="#" class="top_left_btn top_left_btn_right top_left_btn_catalog"   style="left:200px;"><div></div></a>
                            
                            <a href="#" class="top_left_btn top_left_btn_list" style="left:250px; width: 75px;">
                                <div>Статус</div>
                            </a>
                            
                            <div class="filter_group_top">
                                <input type="text" name="group_filter" id="group_filter" />
                            </div>
                        </div>
                    </div>
                    
                    <? for($i=12; $i<=18; $i++): ?>
                    
                    <table class="group_tbl payment_tbl">
                        <tr class="group_first_tr">
                            <td></td>
                            <td></td>
                            <td class="payment_tbl_title_date">Среда, <?=$i?> января</td>
                            <td>Назначение</td>
                            <td>Период оплаты</td>
                            <td>Сумма</td>
                            <td>Комментарий</td>
                            <td>Оплату принял</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="tmp[]" /></td>
                            <td><input type="checkbox" name="tmp[]" class="star_checkbox" /></td>
                            <td><a href="#">Стародубцева Елизавета</a></td>
                            <td>книга</td>
                            <td></td>
                            <td style="text-align: right;">395 грн</td>
                            <td>Streamline, PreIntermediate</td>
                            <td><a href="#">Стас</a></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="tmp[]" /></td>
                            <td><input type="checkbox" name="tmp[]" class="star_checkbox" /></td>
                            <td><a href="#">Рубанова Наталья</a></td>
                            <td>4 занятия</td>
                            <td></td>
                            <td style="text-align: right;">420 грн</td>
                            <td>Все оплатил, вот ведь молодец</td>
                            <td><a href="#">Стас</a></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="tmp[]" /></td>
                            <td><input type="checkbox" name="tmp[]" class="star_checkbox" checked="checked" /></td>
                            <td><a href="#">Рубанова Наталья</a></td>
                            <td>4 занятия</td>
                            <td>18.09 - 29.09</td>
                            <td style="text-align: right;">395 грн</td>
                            <td></td>
                            <td><a href="#">Вика</a></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="tmp[]" /></td>
                            <td><input type="checkbox" name="tmp[]" class="star_checkbox" checked="checked" /></td>
                            <td><a href="#">Черныгина Надежда</a></td>
                            <td>3 занятия</td>
                            <td>18.09 - 29.09</td>
                            <td style="text-align: right;">370 грн</td>
                            <td>Придет в апреле</td>
                            <td><a href="#">Вика</a></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="tmp[]" /></td>
                            <td><input type="checkbox" name="tmp[]" class="star_checkbox" /></td>
                            <td><a href="#">Чернышева Ольга</a></td>
                            <td>3 занятия</td>
                            <td>18.09 - 29.09</td>
                            <td style="text-align: right;">420 грн</td>
                            <td></td>
                            <td><a href="#">Стас</a></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="tmp[]" /></td>
                            <td><input type="checkbox" name="tmp[]" class="star_checkbox" checked="checked" /></td>
                            <td><a href="#">Куринова Юлия</a></td>
                            <td>4 занятия</td>
                            <td>16.10 - 31.11</td>
                            <td style="text-align: right;">395 грн</td>
                            <td>Должны 2 гривны</td>
                            <td><a href="#">Вика</a></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="tmp[]" /></td>
                            <td><input type="checkbox" name="tmp[]" class="star_checkbox" /></td>
                            <td><a href="#">Черныгина Надежда</a></td>
                            <td>3 занятия</td>
                            <td>16.10 - 31.11</td>
                            <td style="text-align: right;">420 грн</td>
                            <td>Все оплатил</td>
                            <td><a href="#">Вика</a></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="tmp[]" /></td>
                            <td><input type="checkbox" name="tmp[]" class="star_checkbox" /></td>
                            <td><a href="#">Чернышева Ольга</a></td>
                            <td>4 занятия</td>
                            <td>18.09 - 29.09</td>
                            <td style="text-align: right;">370 грн</td>
                            <td></td>
                            <td><a href="#">Вика</a></td>
                        </tr>
                        <tr class="payment_all_summ_tr">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Итого за день:</td>
                            <td></td>
                            <td style="text-align: right; font-weight: bold;">12 356 грн</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                    
                    <? endfor;?>
                    
                </div>
                </div>
            </div>
        </center>
    </body>
</html>