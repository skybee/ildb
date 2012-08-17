<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="studen_cart_info studen_cart_info_upd">
    <h1>
        Информация о студенте 
        <span style=" display: inline-block; width: 20px;"></span>
        <a href="#">Архив</a>
    </h1>
    
    <table class="student_cart_info_tbl">
        <tr>
            <td style="width: 110px;">ФИО</td>
            <td> 
                <input type="text" name="fio" value="" class="greyinput" style="width: 350px" /> 
            </td>
        </tr>
        <tr>
            <td>Адрес</td>
            <td><input type="text" name="fio" value="" class="greyinput" style="width: 350px" /></td>
        </tr>
        <tr>
            <td>Телефон</td>
            <td><input type="text" name="fio" value="" class="greyinput" style="width: 120px" /></td>
        </tr>
        <tr>
            <td>E-mail</td>
            <td><input type="text" name="fio" value="" class="greyinput" style="width: 180px" /></td>
        </tr>
        <tr>
            <td colspan="2" class="info_space" style="padding-top: 10px;"></td>
        </tr>
        <tr>
            <td style="vertical-align: middle; padding-top: 20px;">Level test</td>
            <td style="vertical-align: middle;">
                <table>
                    <tr>
                        <td style="width: 75px;">
                            <select name="level" class="greyselect" style="width: 60px;">
                                <option value="tmp[]" >A1</option>
                                <option value="tmp[]" >B1</option>
                                <option value="tmp[]" >B2</option>
                                <option value="tmp[]" >H2</option>
                                <option value="tmp[]" >C1</option>
                            </select>
                        </td>
                        <td style="vertical-align: middle; width: 75px;">
                            <input type="text" name="temp[]" class="greyinput" style="width: 50px;" /> %
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: middle;" >Статус</td>
            <td>
                <select class="greyselect" name="qwe" >
                    <option value="1" >Распределен</option>
                    <option value="2" >Удален</option>
                    <option value="3" >Убит</option>
                    <option value="4" >Полетел в космос</option>
                    <option value="5" >Стал жабой</option>
                    <option value="6" >Барабанщик</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Дата записи</td>
            <td>
                <div class="payment_add_date_block student_upd_date_block" >
                    <input type="text" name="fio" value="" class="greyinput date_input" style="width: 105px"  />
                </div>
            </td>
        </tr>
        <tr>
            <td>Скидка</td>
            <td><input type="text" name="fio" value="" class="greyinput" style="width: 50px" /> %</td>
        </tr>
        <tr>
            <td colspan="2" class="info_space"></td>
        </tr>
        <tr>
            <td>Дата рождения</td>
            <td>
                <div class="payment_add_date_block student_upd_date_block">
                    <input type="text" name="fio" value="" class="greyinput date_input" style="width: 105px"  />
                </div>
            </td>
        </tr>
        <tr>
            <td>Род занятий</td>
            <td><input type="text" name="fio" value="" class="greyinput" style="width: 180px" /></td>
        </tr>
        <tr>
            <td style="vertical-align: middle;" >Откуда узнал</td>
            <td>
                <select class="greyselect" name="qwe" >
                    <option value="1" >метро</option>
                    <option value="2" >интернет</option>
                    <option value="3" >уличная реклама</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="info_space"></td>
        </tr>
        <tr>
            <td style="vertical-align: top; padding-top: 14px;">
                Комментарий
            </td>
            <td><textarea name="comment"></textarea></td>
        </tr>
    </table>
    
    <div class="confirm_block">
        <a href="#" class="confirm_button" style="width: 65px;">Сохранить</a>
        <a href="#">Отмена</a>
    </div>
</div>
