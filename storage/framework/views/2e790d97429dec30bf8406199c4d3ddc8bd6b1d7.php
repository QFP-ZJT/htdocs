
<div>
    <?php /*<img class="ui large image" src="/images/left.jpg">*/ ?>
</div>


<div id='second_menu'>
    <?php /*临时*/ ?>
    <div id='temp' class="ui _sidegirde big vertical pointing menu">
    </div>
    <?php /*个人信息查看*/ ?>
    <div id='second_menu_person' class="ui _sidegirde big vertical pointing menu">

        <a id = 'p_info' class="item" onclick="p_info('#p_info')" ><?php /*TODO 查看个人基本信息*/ ?>
            <i class="user icon"></i> 查看业主信息
        </a>
        <a id = 'p_hinfo' class="item" onclick="p_house('#p_hinfo')"><?php /*TODO 查看房屋基本信息*/ ?>
            <i class="home icon"></i> 查看房屋信息
        </a>
        <a id = 'p_modify' class="item" onclick="p_modify_info_1('#p_modify')"><?php /*TODO 修改个人信息*/ ?>
            <i class="mail icon"></i> 修改个人信息
        </a>
        <a id = 'p_pm' class="item" onclick="p_modify_pw_1('#p_pm')"><?php /*TODO 修改密码*/ ?>
            <i class="user icon"></i> 修改密码
        </a>

    </div>
    <?php /*费用查看*/ ?>
    <div id='second_menu_cost' class="ui _sidegirde big vertical pointing menu">
        <a class="item">
            <i class="home icon"></i> 查看电费详情
        </a>
        <a class="item">
            <i class="mail icon"></i> 查看水费详情
        </a>
        <a class="item">
            <i class="user icon"></i> 查看物业管理费详情
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
        <a class="active item">
            <i class="search icon"></i> 欢迎使用快捷查询
        </a>
    </div>
</div>