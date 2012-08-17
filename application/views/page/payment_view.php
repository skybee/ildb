<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

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
                <input type="text" name="group_filter" id="group_filter" class="jq_st_search" />
            </div>
        </div>
    </div>

    <? 
        if( $payment_list != NULL): 
            foreach( $payment_list as $date => $payment_ar):
                $date_ar = get_date_str_ar($date);
    ?>

        <table class="group_tbl payment_tbl">
            <tr class="group_first_tr">
                <td style="width: 35px;"></td>
                <td style="width: 30px;"></td>
                <td style="width: 270px;" class="payment_tbl_title_date"><?= $date_ar['day_str'].', '.$date_ar['day_nmbr'].' '.$date_ar['month_str']  ?></td>
                <td style="width: 200px;">Назначение</td>
                <td style="width: 70px;">Период оплаты</td>
                <td style="width: 50px;">Сумма</td>
                <td>Комментарий</td>
                <td>Оплату принял</td>
            </tr>
            <?
                foreach( $payment_ar as $pay_ar ):
                    if( is_array($pay_ar) ): //если это массив данных, а не сумма за день
            ?>
            <tr class="jq_student_str" > <!-- класс jq_student_str предназначен для работы поиска-->
                <td><input type="checkbox" name="tmp[]" /></td>
                <td><input type="checkbox" name="tmp[]" class="star_checkbox" /></td>
                <td><a href="/student_cart/<?=$pay_ar['student_id']?>/"><?=$pay_ar['student_fio']?></a></td>
                <td><?= $pay_ar['payment_to'] ?></td>
                <td></td>
                <td style="text-align: right;">
                <?
                    if( $pay_ar['not_full'] )
                        echo '<span style="color:#D00; font-weight:bold">'.number_format($pay_ar['summ'], 0, '.', ' ').' грн.</span>';
                    else
                        echo number_format($pay_ar['summ'], 0, '.', ' ').' грн.';
                ?> 
                </td>
                <td><?=$pay_ar['comment']?></td>
                <td><a href="/manager_cart/<?=$pay_ar['users_id']?>/"><?=$pay_ar['manager_name']?></a></td>
            </tr>
            <?
                    endif;
                endforeach;
            ?>
            <tr class="payment_all_summ_tr">
                <td></td>
                <td></td>
                <td></td>
                <td>Итого за день:</td>
                <td></td>
                <td style="text-align: right; font-weight: bold;"><?= number_format($payment_ar['day_summ'], 0, '.', ' ') ?> грн.</td>
                <td></td>
                <td></td>
            </tr>
        </table>

    <? 
            endforeach;
        endif; 
    ?>

</div>