<div></div>
<?php /*个人信息-查看业主信息*/ ?>
<table id='p_info_main' class="ui mainmain vertical celled striped table ">
    <thead>
    <tr>
        <th class="four p_main_dh_nr wide"></th>
        <th class="twelve wide"></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>姓名:</td>
        <td id='p_info_main_name'></td>
    </tr>
    <tr>
        <td>性别:</td>
        <td id='p_info_main_sex'></td>
    </tr>
    <tr>
        <td>身份证号:</td>
        <td id="p_info_main_id"></td>
    </tr>
    <tr>
        <td>手机号:</td>
        <td id='p_info_main_phone'></td>
    </tr>
    <tr>
        <td>邮箱:</td>
        <td id='p_info_main_email'></td>
    </tr>

    <tr>
        <td>工作:</td>
        <td id='p_info_main_work'></td>
    </tr>
    </tbody>
    <tfoot>

    </tfoot>
</table>

<?php /*个人信息-查看房屋信息*/ ?>
<table id='p_house_main' class="ui loading mainmain vertical celled striped table">
    <thead>
    <tr>
        <th class="p_main_dh_nr four wide"></th>
        <th class="twelve wide"></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>楼房编号:</td>
        <td id='p_house_main_id'></td>
    </tr>
    <tr>
        <td>楼宇编号:</td>
        <td id='p_house_main_id_building'></td>
    </tr>
    <tr>
        <td>单元号:</td>
        <td id="p_house_main_id_unit"></td>
    </tr>
    <tr>
        <td>门牌号:</td>
        <td id='p_house_main_id_id'></td>
    </tr>
    <tr>
        <td>住房面积:</td>
        <td id='p_house_main_area'></td>
    </tr>

    <tr>
        <td>入住时间:</td>
        <td id='p_house_main_time'></td>
    </tr>
    </tbody>
    <?php /*<tfoot>*/ ?>

    <?php /*</tfoot>*/ ?>
</table>

<?php /*个人信息-修改个人信息*/ ?>
<div id="p_modify_main" class="ui mainmain loading form segment">
    <h4 class="ui dividing header">个人信息修改</h4>
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
    <div class="two fields">
        <div class="field">
            <label>业主姓名(只读)</label>
            <input id='p_modify_main_default_name' placeholder="业主姓名" readonly="readonly" type="text">
        </div>
        <div class="field">
            <label>性别(只读)</label>
            <div class="ui selection dropdown" tab-index="2">
                <div id="p_modify_main_default_sex" class="default text">选择</div>
                <i class="dropdown icon"></i>
                <input type="hidden" name="gender">
                <div class="menu">
                    <div class="item" data-value="male">男</div>
                    <div class="item" data-value="female">女</div>
                </div>
            </div>
        </div>
    </div>

    <div class="field">
        <label>身份证号(只读)</label>
        <input id='p_modify_main_default_id' placeholder="身份证号" type="text" readonly="readonly">
    </div>

    <div class="field">
        <label>手机号</label>
        <input id='p_modify_main_default_phone' placeholder="手机号" type="text">
    </div>

    <div class="field">
        <label>邮箱</label>
        <input id="p_modify_main_default_email" placeholder="邮箱" type="text">
    </div>
    <?php /*界面显示*/ ?>
    <?php /*<div id='error_email_un' class="ui error message">*/ ?>
    <?php /*<div class="header">拒绝提交</div>*/ ?>
    <?php /*<p>每一个e-mail只允许注册一次</p>*/ ?>
    <?php /*</div>*/ ?>
    <?php /*弹出层*/ ?>
    <div id='error_email_un' class="ui basic modal">
        <i class="close icon"></i>
        <div class="header">
            请求被拒绝
        </div>
        <div class="image content">
            <div class="image">
                <i class="error icon"></i>
            </div>
            <div class="description">
                <p>您输入的邮箱号码已被注册!</p>
            </div>
        </div>
        <div class="actions">
            <div class="two fluid ui inverted buttons">

                <div class="ui ok green basic inverted button">
                    <i class="checkmark icon"></i>
                    知道了
                </div>
            </div>
        </div>
    </div>
    <div id='p_modify_main_feedback_success' class="ui basic modal">
        <i class="close icon"></i>
        <div class="header">
            请求成功
        </div>
        <div class="image content">
            <div class="image">
                <i class="error icon"></i>
            </div>
            <div class="description">
                <p>您的信息已经修改成功</p>
            </div>
        </div>
        <div class="actions">
            <div class="two fluid ui inverted buttons">

                <div class="ui ok green basic inverted button">
                    <i class="checkmark icon"></i>
                    知道了
                </div>
            </div>
        </div>
    </div>
    <div class="field">
        <label>工作</label>
        <input id="p_modify_main_default_work" placeholder="工作" type="text">
    </div>

    <div class="ui button" onclick='p_modufy_info_2()'>提交更改</div>

</div>

<?php /*密码修改*/ ?>
<div id="p_pm_main" class='ui mainmain'>
    <p></p>
    <div id='p_pm_main_form' class="ui form">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <div class="field">
            <h3>请输入您的新密码</h3>
            <input type="password" name="pw" placeholder="新密码">
        </div>
        <div class="field">
            <h3>请再次确认您的新密码</h3>
            <input type="password" name="pw_again" placeholder="新密码确认">
        </div>
        <div class="field">
            <h3>请输入您的原密码</h3>
            <input type="password" name="pw_check" placeholder="原密码核实">
        </div>
        <div class="ui error message"></div><?php /*报错层*/ ?>
        <?php /*信息反馈*/ ?>
        <div id='p_pm_main_feedback_success' class="ui basic modal">
            <i class="close icon"></i>
            <div class="header">
                请求成功
            </div>
            <div class="image content">
                <div class="image">
                    <i class="error icon"></i>
                </div>
                <div class="description">
                    <p>您的密码已经修改成功</p>
                </div>
            </div>
            <div class="actions">
                <div class="two fluid ui inverted buttons">

                    <div class="ui ok green basic inverted button">
                        <i class="checkmark icon"></i>
                        知道了
                    </div>
                </div>
            </div>
        </div>
        <div id='p_pm_main_feedback_fail' class="ui basic modal">
            <i class="close icon"></i>
            <div class="header">
                请求被拒绝
            </div>
            <div class="image content">
                <div class="image">
                    <i class="error icon"></i>
                </div>
                <div class="description">
                    <p>您输入的原密码不正确</p>
                </div>
            </div>
            <div class="actions">
                <div class="two fluid ui inverted buttons">

                    <div class="ui ok green basic inverted button">
                        <i class="checkmark icon"></i>
                        重新输入
                    </div>
                </div>
            </div>
        </div>
        <button class="ui button" name='p_pm_main_submit' onclick="p_modify_pw_2('')">提交更改</button>
    </div>

</div>

<?php /*价格查询*/ ?>
<table id='price_main' class="ui loading mainmain vertical celled striped table">
    <thead>
    <tr>
        <th class="two wide">编号</th>
        <th class="two wide">名称</th>
        <th class="three wide">单价</th>
        <th class="three wide">单位</th>
        <th class="four wide">开始执行时间</th>
    </tr>
    </thead>
    <tbody class='price_water_main_start'>

    </tbody>
</table>

<?php /*费用清单*/ ?>
<table id='fee_main' class="ui loading mainmain vertical celled striped table">
    <div id='fee_main_feedback_success' class="ui basic modal">
        <i class="close icon"></i>
        <div class="header">
            请求成功
        </div>
        <div class="image content">
            <div class="image">
                <i class="error icon"></i>
            </div>
            <div class="description">
                <p>缴费成功</p>
            </div>
        </div>
        <div class="actions">
            <div class="two fluid ui inverted buttons">

                <div class="ui ok green basic inverted button">
                    <i class="checkmark icon" ></i>
                    知道了
                </div>
            </div>
        </div>
    </div>
    <div id='fee_main_feedback_fail' class="ui basic modal">
        <i class="close icon"></i>
        <div class="header">
            请求被拒绝
        </div>
        <div class="image content">
            <div class="image">
                <i class="error icon"></i>
            </div>
            <div class="description">
                <p>未知错误,更改失败,请稍后重试</p>
            </div>
        </div>
        <div class="actions">
            <div class="two fluid ui inverted buttons">

                <div class="ui ok green basic inverted button">
                    <i class="checkmark icon"></i>
                    重新输入
                </div>
            </div>
        </div>
    </div>
    <thead>
    <tr>
        <th class="one wide"></th>
        <th class="two wide">账单编号</th>
        <th class="two wide">类别</th>
        <th class="two wide">用量</th>
        <th class="one wide">单价</th>
        <th class="two wide">价格</th>
        <th class="three wide">月份</th>
        <th class="six wide">缴费</th>

    </tr>
    </thead>
    <tbody class='price_water_main_start'>

    </tbody>
</table>