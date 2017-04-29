<div>
    <?php /*<img class="ui large image" src="/images/left.jpg">*/ ?>
</div>


<div id='second_menu'>
    <?php /*临时*/ ?>
    <div id='temp' class="ui _sidegirde big vertical pointing menu">
    </div>
    <?php /*个人信息查看*/ ?>
    <div id='second_menu_person' class="ui _sidegirde big vertical pointing menu">

        <a id='p_info' class="item" onclick="p_info('#p_info')"><?php /*TODO 查看个人基本信息*/ ?>
            <i class="user icon"></i> 查看个人信息
        </a>
        <a id='p_modify' class="item" onclick="p_modify_info_1('#p_modify')"><?php /*TODO 修改个人信息*/ ?>
            <i class="mail icon"></i> 修改个人信息
        </a>
        <a id='p_pm' class="item" onclick="p_modify_pw_1('#p_pm')"><?php /*TODO 修改密码*/ ?>
            <i class="user icon"></i> 修改密码
        </a>

    </div>
    <?php /*房屋信息检索*/ ?>
    <div id='second_menu_house' class="ui _sidegirde">
        <form action=""></form>
        <p></p>
        <h3 class="ui center aligned header">请输入检索条件 </h3>
        <div class="ui labeled input" data-tooltip="不输入，即取消该搜索条件" data-position="top left">
            <div class="ui label">请输入房屋号</div>
            <input id="id" class="reset" type="text">
        </div>
        <p></p>
        <div class="ui labeled input" data-tooltip="不输入，即取消该搜索条件" data-position="top left">
            <div class="ui label">请输入楼房号</div>
            <input id="id_building" class="reset" type="text">
        </div>
        <p></p>
        <div class="ui labeled input" data-tooltip="不输入，即取消该搜索条件" data-position="top left">
            <div class="ui label">请输入单元号</div>
            <input id="id_unit" class="reset" type="text">
        </div>
        <p></p>
        <div class="ui labeled input" data-tooltip="不输入，即取消该搜索条件" data-position="top left">
            <div class="ui label">请输入楼层号</div>
            <input id="id_id" class="reset" type="text">
        </div>
        <div class="ui horizontal divider"></div>
        <div class="ui four column centered grid">
            <div class="ui large buttons">
                <button class="ui button" onclick="_reset()">重置</button>
                <div class="or"></div>
                <button class="ui button" onclick="house_check()">检索</button>
            </div>
        </div>

<?php /*楼房信息变更*/ ?>
        <h4 class="ui horizontal header divider">
            <i class="bar home icon"></i>
            业主信息变更
        </h4>
        <div class="ui labeled input">
            <div class="ui label">请输入房屋号</div>
            <input id="id_owner" class="" type="text" placeholder="要变更房主的楼房号">
        </div>
        <div class="ui hidden divider"></div>
        <div class="ui four column centered grid">
            <div class="ui large buttons">
                <button class="ui button" onclick="house_change_1()">检索</button>
            </div>
        </div>
    </div>
    <?php /*住户信息检索*/ ?>
    <div id='second_menu_owner' class="ui _sidegirde">
        <form action=""></form>
        <p></p>
        <h3 class="ui center aligned header">请输入检索条件 </h3>
        <div class="ui labeled input" data-tooltip="不输入，即取消该搜索条件" data-position="top left">
            <div class="ui label">请输入身份证号</div>
            <input id="owner_id" class="reset" type="text">
        </div>
        <p></p>
        <div class="ui labeled input" data-tooltip="不输入，即取消该搜索条件" data-position="top left">
            <div class="ui label">请输入楼主姓名</div>
            <input id="owner_name" class="reset" type="text">
        </div>
        <p></p>
        <div class="ui labeled input" data-tooltip="不输入，即取消该搜索条件" data-position="top left">
            <div class="ui label">&nbsp&nbsp&nbsp&nbsp&nbsp请输入性别&nbsp&nbsp&nbsp&nbsp&nbsp</div>
            <input id="owner_sex" class="reset" type="text">
        </div>
        <p></p>
        <div class="ui labeled input" data-tooltip="不输入，即取消该搜索条件" data-position="top left">
            <div class="ui label">&nbsp&nbsp&nbsp&nbsp&nbsp请输入工作&nbsp&nbsp&nbsp&nbsp&nbsp</div>
            <input id="owner_work" class="reset" type="text">
        </div>
        <div class="ui horizontal divider"></div>
        <div class="ui four column centered grid">
            <div class="ui large buttons">
                <button class="ui button" onclick="_reset()">重置</button>
                <div class="or"></div>
                <button class="ui button" onclick="owner_check()">检索</button>
            </div>
        </div>
    </div>
    <?php /*价格查询与变更*/ ?>
    <div id='second_menu_price' class="ui _sidegirde big vertical pointing menu">
        <a id="pr_1" class="item" onclick="pr_check('#pr_1',1)">
            <i class="yen icon"></i> 水价查看
        </a>
        <a id="pr_2" class="item" onclick="pr_check('#pr_2',2)">
            <i class="yen icon"></i> 电价查询
        </a>
        <a id="pr_3" class="item" onclick="pr_check('#pr_3',3)">
            <i class="yen icon"></i> 物业管理费查询
        </a>
        <a id="pr_4" class="item" onclick="pr_check('#pr_4',4)">
            <i class="yen icon"></i> 本月物价查询
        </a>
        <a id="pr_5" class="item" onclick="pr_check('#pr_5',5)">
            <i class="yen icon"></i> 价格变更
        </a>
    </div>
    <?php /*用量注入*/ ?>
    <div id='second_menu_amount' class="ui _sidegirde">
        <p></p>
        <p></p>
        <div class="ui horizontal divider"></div>
        <h3 class="ui center aligned header">请输入检索楼房的条件</h3>
        <div class="ui labeled input" data-tooltip="不输入，即取消该搜索条件" data-position="top left">
            <div class="ui label">请输入房屋号</div>
            <input id="amount_id" class="reset" type="text">
        </div>
        <p></p>
        <div class="ui labeled input" data-tooltip="不输入，即取消该搜索条件" data-position="top left">
            <div class="ui label">请输入楼房号</div>
            <input id="amount_id_building" class="reset" type="text">
        </div>
        <p></p>
        <div class="ui labeled input" data-tooltip="不输入，即取消该搜索条件" data-position="top left">
            <div class="ui label">请输入单元号</div>
            <input id="amount_id_unit" class="reset" type="text">
        </div>
        <p></p>
        <div class="ui labeled input" data-tooltip="不输入，即取消该搜索条件" data-position="top left">
            <div class="ui label">请输入楼层号</div>
            <input id="amount_id_id" class="reset" type="text">
        </div>
        <div class="ui horizontal divider"></div>
        <div class="ui four column centered grid">
            <div class="ui large buttons">
                <button class="ui button" onclick="_reset()">重置</button>
                <div class="or"></div>
                <button class="ui button" onclick="house_check_for_amount()">检索</button>
            </div>
        </div>
    </div>

    <?php /*费用查看*/ ?>
    <div id='second_menu_cost' class="ui _sidegirde big vertical pointing menu">
        <a id = 'fee_1' class="item" onclick="fee_check('#fee_1',1)">
            <i class="home icon"></i> 查看水费缴费情况
        </a>
        <a id='fee_2' class="item" onclick="fee_check('#fee_2',2)">
            <i class="mail icon"></i> 查看电费缴费情况
        </a>
        <a id='fee_3' class="item" onclick="fee_check('#fee_3',3)">
            <i class="user icon"></i> 查看物业管理费缴费情况
        </a>
        <a id='fee_4' class="item" onclick="fee_check('#fee_4',4)">
            <i class="user icon"></i> 查看本月未缴费的账单
        </a>
    </div>

    <?php /*小区公告*/ ?>
    <div id='second_menu_notice' class="ui _sidegirde big vertical pointing menu">
        <a class="active item">
            <i class="announcement icon"></i> 欢迎查看小区公告
        </a>
    </div>
    <?php /*价格查询*/ ?>
    <div id='second_menu_price' class="ui _sidegirde big vertical pointing menu">
        <a id="pr_1" class="item" onclick="pr_check('#pr_1',1)">
            <i class="yen icon"></i> 水价查看
        </a>
        <a id="pr_2" class="item" onclick="pr_check('#pr_2',2)">
            <i class="yen icon"></i> 电价查询
        </a>
        <a id="pr_3" class="item" onclick="pr_check('#pr_3',3)">
            <i class="yen icon"></i> 物业管理费查询
        </a>
        <a id="pr_4" class="item" onclick="pr_check('#pr_4',4)">
            <i class="yen icon"></i> 本月物价查询
        </a>

    </div>
    <?php /*快捷查询*/ ?>
    <div id='second_menu_quick' class="ui _sidegirde big vertical pointing menu">
        <a class="active item" >
            <i class="search icon"></i> 欢迎使用快捷查询
        </a>
    </div>
</div>