<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>


<div class="studen_cart_info">
    <h1>Предпочтительный график работы</h1>
    
    <table class="st_cart_schedule_tbl">
        <tr class="st_cart_schedule_first_tr">
            <td style="width: 70px;">Дни</td>
            <td>Начало занятия</td>
        </tr>
        <tr>
            <td>
                <input type="checkbox" name="tmp1" />
                Пн.
            </td>
            <td>
                <input type="text" class="greyinput" name="tmp[]" />
            </td>
        </tr>
        <tr>
            <td>
                <input type="checkbox" name="tmp2" checked="checked" />
                Вт.
            </td>
            <td>
                <input type="text" class="greyinput" name="tmp[]" />
            </td>
        </tr>
        <tr>
            <td>
                <input type="checkbox" name="tmp3" />
                Ср.
            </td>
            <td>
                <input type="text" class="greyinput" name="tmp[]" />
            </td>
        </tr>
        <tr>
            <td>
                <input type="checkbox" name="tmp4" checked="checked"  />
                Чт.
            </td>
            <td>
                <input type="text" class="greyinput" name="tmp[]" />
            </td>
        </tr>
        <tr>
            <td>
                <input type="checkbox" name="tm5" />
                Пт.
            </td>
            <td>
                <input type="text" class="greyinput" name="tmp[]" />
            </td>
        </tr>
        <tr>
            <td>
                <input type="checkbox" name="tmp6" checked="checked" />
                Сб.
            </td>
            <td>
                <input type="text" class="greyinput" name="tmp[]" />
            </td>
        </tr>
        <tr>
            <td>
                <input type="checkbox" name="tmp7" />
                Вс.
            </td>
            <td>
                <input type="text" class="greyinput" name="tmp[]" />
            </td>
        </tr>
        
    </table>
    
    <table>
        <tr>
            <td style="width: 110px;">
                <a href="#" class="btn_student_info">Сохранить</a>
            </td>
            <td>
                <a href="#">Отмена</a>
            </td>
        </tr>
    </table>
    
    
</div>    