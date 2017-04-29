<div>

</div>
{{--个人信息-查看业主信息--}}
<table id='p_info_main' class="ui loading mainmain vertical celled striped table ">
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

    </tbody>
    <tfoot>

    </tfoot>
</table>

{{--个人信息-修改个人信息--}}
<div id="p_modify_main" class="ui mainmain loading form segment">
    <h4 class="ui dividing header">个人信息修改</h4>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="two fields">
        <div class="field">
            <label>管理员姓名(只读)</label>
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

    <div class="ui button" onclick='p_modufy_info_2()'>提交更改</div>

</div>

{{--密码修改--}}
<div id="p_pm_main" class='ui mainmain'>
    <p></p>
    <div id='p_pm_main_form' class="ui form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
        <div class="ui error message"></div>{{--报错层--}}
        {{--信息反馈--}}
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

{{--价格查询--}}
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

{{--房屋信息检索--}}
<table id='house_check_main' class="ui loading mainmain vertical celled striped table">
    <thead>
    <tr>
        <th class="two wide">楼房号</th>
        <th class="two wide">楼号</th>
        <th class="two wide">单元号</th>
        <th class="two wide">门牌号</th>
        <th class="two wide">住房面积</th>
        <th class="two wide">现任业主</th>
        <th class="four wide">入住时间</th>
    </tr>
    </thead>
    <tbody class='price_water_main_start'>

    </tbody>
</table>

{{--业主信息检索--}}
<table id='owner_check_main' class="ui loading mainmain vertical celled striped table">
    <div id='owner_check_main_feedback' class="ui basic modal">
        <i class="close icon"></i>
        <div class="header">
            未找到匹配项
        </div>
        <div class="image content">
            <div class="image">
                <i class="error icon"></i>
            </div>
            <div class="description">
                <p>请核实您的输入，或放宽查询条件</p>
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
    <thead>
    <tr>
        <th class="two wide">身份证号</th>
        <th class="three wide">姓名</th>
        <th class="two wide">性别</th>
        <th class="two wide">手机号</th>
        <th class="two wide">邮箱号</th>
        <th class="two wide">工作</th>
        <th class="four wide">楼房编号</th>
    </tr>
    </thead>
    <tbody class='price_water_main_start'>

    </tbody>
</table>

{{--价格变更--}}
<div id="price_modify_main" class='ui mainmain'>
    <p></p>

    <div id='price_modify_main_form' class="ui form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="field" data-tooltip="不输入，即取消该价格的更改" data-position="top center">
            <h3>请输入最新的水费价格(单位:元/立方米)</h3>
            <input type="text" name="water">
        </div>
        <div class="field" data-tooltip="不输入，即取消该价格的更改" data-position="top center">
            <h3>请输入最新的电费价格(单位:元/度)</h3>
            <input type="text" name="electric">
        </div>
        <div class="field" data-tooltip="不输入，即取消该价格的更改" data-position="top center">
            <h3>请输入最新的物业管理费价格(单位:元/平方米/月)</h3>
            <input type="text" name="wy">
        </div>
        <div class="ui error message"></div>{{--报错层--}}
        {{--信息反馈--}}
        <div id='price_modify_feedback_success' class="ui basic modal">
            <i class="close icon"></i>
            <div class="header">
                请求成功
            </div>
            <div class="image content">
                <div class="image">
                    <i class="error icon"></i>
                </div>
                <div class="description">
                    <p>价格已更新</p>
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
        <div id='price_modify_feedback_fail' class="ui basic modal">
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
        <div id='price_modify_feedback_fail_empty' class="ui basic modal">
            <i class="close icon"></i>
            <div class="header">
                请求被拒绝
            </div>
            <div class="image content">
                <div class="image">
                    <i class="error icon"></i>
                </div>
                <div class="description">
                    <p>您没有填写任何新数据</p>
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
        <button class="ui button" name='p_pm_main_submit' onclick="price_modify('')">提交新价格</button>
    </div>

</div>

{{--用量添加--}}
<div id='amount_main' class='mainmain'>
    <div class="ui horizontal divider"></div>
    {{--反馈信息--}}
    <div id='amount_feedback_fail' class="ui basic modal">
        <i class="close icon"></i>
        <div class="header">
            请求被拒绝
        </div>
        <div class="image content">
            <div class="image">
                <i class="error icon"></i>
            </div>
            <div class="description">
                <p>您的输入不符合规范,请检查后重新输入</p>
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
    <div id='amount_feedback_success' class="ui basic modal">
        <i class="close icon"></i>
        <div class="header">
            请求成功
        </div>
        <div class="image content">
            <div class="image">
                <i class="error icon"></i>
            </div>
            <div class="description">
                <p>已经成功注入</p>
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
    <div id='amount_feedback_fail' class="ui basic modal">
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

    <div class="ui right floated buttons">
        <button class="ui red button"><i class='bug icon'></i>警告:一经提交不能更改,请核实无误</button>
        <div class="or"></div>
        <button class="ui grey button" onclick="reset_amount_water()">重置本月水使用量</button>
        <div class="or"></div>
        <button class="ui grey button" onclick="reset_amount_elc()">重置本月电使用量</button>
        <div class="or"></div>
        <button class="ui blue button" onclick="getTableContent('.signal_row')">提交本月水电使用量</button>
    </div>
    {{--<div class="ui hidden horizontal divider"></div>--}}
    <table class="ui loading vertical center table">
        <thead>
        <tr>
            <th class="two wide">楼房号</th>
            <th class="one wide">楼号</th>
            <th class="two wide">单元号</th>
            <th class="two wide">门牌号</th>
            <th class="two wide">现任业主</th>
            <th class="four wide">&nbsp&nbsp&nbsp&nbsp本月<strong>水</strong>使用量</th>
            <th class="four wide">&nbsp&nbsp&nbsp&nbsp本月<strong>电</strong>使用量</th>
        </tr>
        </thead>
        <tbody id='amount_main_table' class='price_water_main_start'>

        </tbody>
    </table>
    <p id='amount_main_number' class='mainmain'></p>
</div>

{{--缴费情况查看--}}
<table id='fee_main' class="ui loading mainmain vertical striped celled table">
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
                    <i class="checkmark icon"></i>
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
        <th class="one wide">楼号</th>
        <th class="two wide">业主姓名</th>
        <th class="one wide">类别</th>
        <th class="one wide">用量</th>
        <th class="one wide">单价</th>
        <th class="two wide">价格</th>
        <th class="two wide">月份</th>
        <th class="six wide">缴费</th>

    </tr>
    </thead>
    <tbody class='price_water_main_start'>

    </tbody>
</table>

{{--请输入新房主的--}}
<div id="house_change" class="ui labeled mainmain input">
    <div class="ui section divider"></div>
    <div class="ui label">请输入楼房号</div>
    <input id="id_owner" class="" type="text" placeholder="要变更房主的楼房号">
</div>

{{--房屋信息变更--}}
<div id='house_check_change_main' class='ui mainmain'>
    <div id='house_check_change_main_feedback_success' class="ui basic modal">
        <i class="close icon"></i>
        <div class="header">
            请求成功
        </div>
        <div class="image content">
            <div class="image">
                <i class="error icon"></i>
            </div>
            <div class="description">
                <p>已更改新业主</p>
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
    <div id='house_check_change_main_feedback_fail' class="ui basic modal">
        <i class="close icon"></i>
        <div class="header">
            请求被拒绝
        </div>
        <div class="image content">
            <div class="image">
                <i class="error icon"></i>
            </div>
            <div class="description">
                <p>新业主未注册</p>
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
    <h3 id='house_owner_empty' class="ui black mainmain block header">
        该房屋目前的拥有权
    </h3>
    <table id="house_check_change_table_main" class="ui loading vertical celled striped table">
        <thead>
        <tr>
            <th class="two wide">楼房号</th>
            <th class="two wide">楼号</th>
            <th class="two wide">单元号</th>
            <th class="two wide">门牌号</th>
            <th class="two wide">住房面积</th>
            <th class="two wide">现任业主</th>
            <th class="two wide">入住时间</th>
        </tr>
        </thead>
        <tbody class='price_water_main_start'>

        </tbody>
        <tfoot class="full-width">
        <tr>
            <th></th>
            <th colspan="7">
                <div id="change_new_owner" class="ui right floated small primary labeled icon button"
                     onclick="house_change_2()"><i class="user icon"></i>更改或添加新业主
                </div>
                <div class="ui label">新业主身份证号</div>
                <input id="owner_new" class="" type="text">
            </th>
        </tr>
        </tfoot>
    </table>
</div>

{{--自然语言查询--}}
<div id='search_main' class='ui mainmain'>
    <br></br>
    <h2 class="ui blue centered grid header">请输入自然语言查询语句</h2>
    <br></br>
    </br>
    <div class="ui fluid big icon input">
        <input id="ordinary_search" type="text" placeholder="语句请尽量规范">
        <button class="ui blue circular button" onclick="search_1()">检索</button>
    </div>
    </br>
    <div class="ui tag labels">
        <a id="wordcut" class="ui label">
        </a>
    </div>
    <div class="ui tag labels">
        <a id="sql" class="ui label">
        </a>
    </div>

    <table id='search_main' class="ui loading vertical celled striped table">
        <thead>
        <tr id='search_main_head'>

        </tr>
        </thead>
        <tbody id="search_main_context">

        </tbody>
    </table>

</div>

