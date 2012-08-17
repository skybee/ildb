<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>




<div id="right_content">
    <div id="content_top_block">
        <div id="group_top_block">
            <a href="#" class="top_left_btn top_left_btn_left top_left_btn_del"         style="left:20px;"><div></div></a>
            <a href="#" class="top_left_btn top_left_btn_center top_left_btn_catalog"   style="left:60px;"><div></div></a>
            <a href="#" class="top_left_btn top_left_btn_right top_left_btn_pause"      style="left:100px;"><div></div></a>

            <a href="#" class="top_left_btn top_left_btn_list" style="left:150px; width: 115px;">
                <div>Скопировать</div>
            </a>

            <!--                            <div class="student_copy_top_btn"></div>-->
            <div class="student_del_top_btn"></div>
        </div>
    </div>

    <div class="student_cart_block">
        <div class="student_cart_left_block">
            <a href="#">Информация</a>
            <a href="#">Часы работы</a>
            <a href="#">Группы <span>(1)</span></a>
            <a href="#">Общий доступ</a>
            <a href="#">Замены и отмены</a>
        </div>

        <div class="student_cart_right_block">
            <?= $page_content ?>
        </div>
    </div>

</div>