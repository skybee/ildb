<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?  if( $student_groups_list != NULL ):
    foreach ($student_groups_list as $group_ar): ?>
    <div class="studen_cart_info studen_group_block_nofirst">   
        <table class="student_cart_group_upd_tbl">
            <tr>
                <td>
                    <a href="/group_cart/<?= $group_ar['id'] ?>/"><?= $group_ar['name'] ?></a> <?= $group_ar['lang'] . ' ' . $group_ar['level'] ?>
                </td>
                <td style="width: 210px;">
                    <a href="javascript:void(0)" class="st_cart_del_group_btn" 
                       onclick="send_post( {    id:'<?= $group_ar['st_gp_id'] ?>',
                           student_id: '<?= $group_ar['student_id'] ?>'
                       }, 
                       '/action/student/del_from_group/', 
                       {title:'Выполняется удаление студента из группы', content:'loader'} )">
                        Удалить из группы
                    </a>
                </td>
            </tr>
            <tr>
                <td style="padding-top: 10px; vertical-align: top;">
                    <p>Пробное занятие</p>
                    <span><?= timestamp_to_date($group_ar['test_lesson']) ?></span><br /><br />
                    <p>Начало занятий</p>
                    <span><?= timestamp_to_date($group_ar['start_lesson_date']) ?></span>
                </td>
                <? if (timestamp_to_time($group_ar['stop_pause']) < time()): ?>

                    <td style="padding-top: 0">
                        <div class="st_cart_paus_in_group_block">
                            <a href="javascript:void(0)" class="st_cart_pause_group_btn">Приостановить занятия</a>

                            <form action="/action/student/paused_in_group/" id="paused_form_<?= $group_ar['st_gp_id'] ?>">
                                <input type="hidden" name="st_gp_id" value="<?= $group_ar['st_gp_id'] ?>" />
                                <input type="hidden" name="student_id" value="<?= $group_ar['student_id'] ?>" />
                                <table class="st_cart_paus_date_tbl">
                                    <tr>
                                        <td style="width: 20px;">
                                            с
                                        </td>
                                        <td>
                                            <div class="payment_add_date_block st_cart_paus_date_input_block">
                                                <input type="text" name="pause_start"  class="greyinput date_input" />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            по
                                        </td>
                                        <td>
                                            <div class="payment_add_date_block st_cart_paus_date_input_block">
                                                <input type="text" name="pause_stop"  class="greyinput date_input" />
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </form>

                            <table class="add_payment_btn_tbl pause_student_confirm_tbl">
                                <tr>
                                    <td>
                                        <a href="javascript:void(0)" class="btn_add_payment"
                                           onclick="send_form('#paused_form_<?= $group_ar['st_gp_id'] ?>', {title:'Выполняется приостановка занятий в группе', content:'loader'} )">
                                            Добавить паузу
                                        </a>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" class="hide_st_cart_pause">Отмена</a>
                                    </td>
                                </tr>
                            </table>

                        </div>
                    </td>

                <? else: ?>

                <form action="/action/student/del_pause_in_group/" id="paused_form_<?= $group_ar['st_gp_id'] ?>">
                    <input type="hidden" name="st_gp_id"        value="<?= $group_ar['st_gp_id'] ?>" />
                    <input type="hidden" name="student_id"      value="<?= $group_ar['student_id'] ?>" />
                    <input type="hidden" name="pause_start"     value="00.00.0000" />
                    <input type="hidden" name="pause_stop"      value="00.00.0000"/>
                </form>

                <td style="padding-top: 0">
                    <div class="st_cart_paus_in_group_block st_cart_paus_true">
                        <a href="javascript:void(0)" class="st_cart_pause_group_btn st_cart_pauset">Занятия остановлены</a>

                        <table class="st_cart_paus_date_tbl">
                            <tr>
                                <td style="width: 20px;">с</td>
                                <td><?= timestamp_to_date($group_ar['start_pause']) ?></td>
                            </tr>
                            <tr>
                                <td>по</td>
                                <td><?= timestamp_to_date($group_ar['stop_pause']) ?></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="javascript:void(0)" 
                                       onclick="send_form('#paused_form_<?= $group_ar['st_gp_id'] ?>', {title:'Выполняется возобновление занятий в группе', content:'loader'} )" >
                                        Ануллировать паузу
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="javascript:void(0)" class="hide_st_cart_pause">Отмена</a>
                                </td>
                            </tr>
                        </table>                    
                    </div>
                </td>

            <? endif; ?>
            </tr>
        </table>
    </div>

    <div class="st_cart_upd_group_border"><!--линия--></div>

<?  endforeach; 
    endif;
?>