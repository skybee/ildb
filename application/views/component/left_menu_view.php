<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>


<div id="left_menu">

    <div id="left_menu_relative">

        <div id="left_menu_small">
            <a class="left_menu_btn small_menu_search_btn" href="javascript:void(0)" ></a>
            <a class="left_menu_btn" href="/students/" ><span id="bg_left_menu_student" class="left_manu_img"></span></a>
            <a class="left_menu_btn" href="/groups/" ><span id="bg_left_menu_groups" class="left_manu_img"></span></a>
            <a class="left_menu_btn" href="/teachers/" ><span id="bg_left_menu_teacher" class="left_manu_img"></span></a>
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

            <a class="left_menu_btn" href="/students/" >
                Студенты 
                <span>(136)</span> 
                <span id="bg_left_menu_student" class="left_manu_img"></span> 
            </a>
            
            <? if( isset($is_students) ):?>
            <ul class="left_link_list">
                <li><a href="/students/">Учащиеся</a></li>
                <li><a href="/students/without_group/">Без группы</a></li>
                <li><a href="/students/arhive/">Архивные</a></li>
                <li><a href="/students/delete/">Удаленные</a></li>
                <?  if( isset($student_status) ):
                    foreach ( $student_status as $st_status_ar ): 
                ?>
                    <li><a href="/students/<?=$st_status_ar['id']?>/"><?=$st_status_ar['name']?></a></li>
                <?  endforeach;
                    endif;
                ?>
            </ul>
            <? endif;?>
            
            <a class="left_menu_btn" href="/groups/" >
                Группы 
                <span>(19)</span> 
                <span id="bg_left_menu_groups" class="left_manu_img"></span>
            </a>
            <a class="left_menu_btn" href="/teachers/" >
                Преподаватели 
                <span>(8)</span>
                <span id="bg_left_menu_teacher" class="left_manu_img"></span>
            </a>
            <a class="left_menu_btn" href="/payment/" >
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
</div>