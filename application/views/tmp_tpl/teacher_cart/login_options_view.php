<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="studen_cart_info studen_cart_info_upd">
    <h1>
        Общий доступ
    </h1>
    
    <div class="techer_option_list_block">
        <ul>
            <li>
                <input type="checkbox" name="tmp[]" />
                доступ к просмотру расписания своих груп
            </li>
            <li>
                <input type="checkbox" name="tmp[]" />
                использовать общий логин и пароль
            </li>
        </ul>
    </div>
</div>


<div class="st_cart_upd_group_border"><!--линия--></div>


<div class="studen_cart_info studen_cart_info_upd" style="margin-top: 10px;">
    <table class="student_cart_info_tbl group_cart_info_tbl teacher_options_tbl">
        <tr>
            <td style="width: 120px"><span>Логин</span></td>
            <td>
                <input type="text" name="tmp[]" class="greyinput" style="width: 170px" />
            </td>
        </tr>
        <tr>
            <td><span>Пароль</span></td>
            <td>
                <input type="password" name="tmp[]" class="greyinput" style="width: 170px" />
            </td>
        </tr>
        <tr>
            <td><span>Пароль повторно</span></td>
            <td>
                <input type="password" name="tmp[]" class="greyinput" style="width: 170px" />
            </td>
        </tr>
    </table>
    
    <div class="confirm_block">
        <a href="#" class="confirm_button" > Сохранить </a>
    </div>
</div>