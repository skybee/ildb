<?php // if ( ! defined('BASEPATH')) exit('No direct script access allowed');    ?>

<div id="right_content">
    <div id="fix_space">
        <div id="fix_top_menu">
            <div id="content_top_block">
                <div id="group_top_block">
                    <div id="check_all_block">
                        <input type="checkbox" name="check_all" id="check_all" />
                    </div>
                    <!--                            <div class="add_group_top_btn"></div>-->

                    <a href="/add_group/" class="top_left_btn_action" style="left:50px;">Добавить</a>

                    <a href="javascript:void(0)" class="top_left_btn top_left_btn_left top_left_btn_del" style="left:160px;" onclick="del_stud_teach('delete', 'groups')"><div></div></a>
                    <a href="#" class="top_left_btn top_left_btn_right top_left_btn_catalog"   style="left:200px;"><div></div></a>

                    <a href="#" class="top_left_btn top_left_btn_list" style="left:250px; width: 75px;">
                        <div>Статус</div>
                    </a>

                    <div class="filter_group_top">
                        <input type="text" name="group_filter" id="group_filter" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <table class="group_tbl">
        <tr class="group_first_tr">
            <td style="width: 35px;"></td>
            <td style="width: 30px;"></td>
            <td>Группа</td>
            <td style="width: 50px;">Язык</td>
            <td style="width: 70px;">Уровень</td>
            <td style="width: 70px;">Кол-во</td>
            <td>Режим работы</td>
            <td>Статус</td>
        </tr>

        <? foreach ($groups_list as $group_ar): ?>
            <tr>
                <td>
                    <input type="checkbox" name="tmp[]" class="checkline"  group_id="<?= $group_ar['id'] ?>" />
                </td>
                <td class="group_tbl_star"></td>
                <td><a href="/group_cart/<?= $group_ar['id'] ?>/"><?= $group_ar['name'] ?></a></td>
                <td><?= $group_ar['lang_sname'] ?></td>
                <td><?= $group_ar['level_name'] ?></td>
                <td><?= $group_ar['cnt_student'] ?></td>
                <td><?= $group_ar['time_str'] ?></td>
                <td></td>
            </tr>
        <? endforeach; ?>

    </table>
</div>