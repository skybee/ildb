<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>


<script lang="javascript">
    st_info_obj = {
        count_lesson:   '<?= $info_obj->count_lesson ?>',
        lesson_form:    '<?= $info_obj->lesson_form ?>',
        lesson_length:  '<?= $info_obj->lesson_length ?>',
        schedule_ar: [
                    <?
                    $i=0;
                    foreach ($info_obj->schedule_ar as $day => $time) {
                        if($i)
                            echo ",\n";
                        echo "{day: '$day', time :'$time'}";
                        $i++;
                    }
                    ?>
                    ]
                };
</script>


<div class="add_st_info4_schedule_tbl_block" style="margin: 30px 0px 0px 43px;">
    <div class="add_st_info4_schedule_left">
        <table class="group_schedule_tbl">
            <tr class="group_schedule_first_str">
                <td style="width:70px;">Дни</td>
                <td style="width:115px">Начало занятия</td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="op3_day[1]" />
                    Пн.
                </td>
                <td>
                    <select name="op3_start_lesson[1]" class="greyselect" style="width: 95px">
                        <?= $timeselect_opt ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="op3_day[2]" />
                    Вт.
                </td>
                <td>
                    <select name="op3_start_lesson[2]" class="greyselect" style="width: 95px">
                        <?= $timeselect_opt ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="op3_day[3]" />
                    Ср.
                </td>
                <td>
                    <select name="op3_start_lesson[3]" class="greyselect" style="width: 95px">
                        <?= $timeselect_opt ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="op3_day[4]" />
                    Чт.
                </td>
                <td>
                    <select name="op3_start_lesson[4]" class="greyselect" style="width: 95px">
                        <?= $timeselect_opt ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="op3_day[5]" />
                    Пт.
                </td>
                <td>
                    <select name="op3_start_lesson[5]" class="greyselect" style="width: 95px">
                        <?= $timeselect_opt ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="op3_day[6]" />
                    Сб.
                </td>
                <td>
                    <select name="op3_start_lesson[6]" class="greyselect" style="width: 95px">
                        <?= $timeselect_opt ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="op3_day[7]" />
                    Вс.
                </td>
                <td>
                    <select name="op3_start_lesson[7]" class="greyselect" style="width: 95px">
                        <?= $timeselect_opt ?>
                    </select>
                </td>
            </tr>
        </table>
    </div>
    <div class="add_st_info4_schedule_right">
        <table class="group_schedule_tbl">
            <tr class="group_schedule_first_str">
                <td style="width:150px;">Кол-во занятий в неделю</td>
            </tr>
            <tr>
                <td>
                    <select name="count_lesson" class="greyselect" style="width: 95px">
                        <option value="1"> 1 занятие</option>
                        <option value="2"> 2 занятия</option>
                        <option value="3"> 3 занятия</option>
                        <option value="4"> 4 занятия</option>
                        <option value="5"> 5 занятий</option>
                        <option value="6"> 6 занятий</option>
                        <option value="7"> 7 занятий</option>
                    </select>
                </td>
            </tr>
            <tr><td style="padding-top: 31px;"></td></tr>
            <tr class="group_schedule_first_str">
                <td style="width:150px;">Форма занятий</td>
            </tr>
            <tr>
                <td>
                    <select name="lesson_form" class="greyselect" style="width: 170px">
                        <option value="2"> В группе</option>
                        <option value="1"> Индивидуальная</option>
                    </select>

                    </div>
                </td>
            </tr>
            <tr><td style="padding-top: 31px;"></td></tr>
            <tr class="group_schedule_first_str">
                <td style="width:150px;">Длительность занятия</td>
            </tr>
            <tr>
                <td>
                    <select name="lesson_length" class="greyselect" style="width: 95px">
                        <option value="1">1:00</option>
                        <option value="2:30">1:30</option>
                        <option value="2">2:00</option>
                        <option value="2:30">2:30</option>
                        <option value="3">3:00</option>
                    </select>

                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>
