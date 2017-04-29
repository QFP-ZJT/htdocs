$(document)
    .ready(function () {
        $('.mainmain').hide();//隐藏所有的主界面
        $('#p_main_dh').hide();//隐藏所有的主界面组件
        $('._sidegirde').hide();
        head_choose('#h_person');
        p_info('#p_info');
    })
;

//主界面选择器
function head_choose(btn) {
    $(btn).addClass('active').siblings().removeClass('active');
    $('.mainmain').hide();
    if (btn == '#h_person') {
        $('#second_menu_person').show().siblings().hide();
        console.log('个人中心激活')
    }
    if (btn == '#h_public') {
        $('#second_menu_notice').show().siblings().hide();
        console.log('公告中心激活')
    }
    if (btn == '#h_cost') {
        $('#second_menu_cost').show().siblings().hide();
        console.log('费用中心激活')
    }
    if (btn == '#h_price') {
        $('#second_menu_price').show().siblings().hide();
        console.log('价格中心激活')
    }
    if (btn == '#h_quick') {
        $('#second_menu_quick').show().siblings().hide();
        console.log('快捷中心激活')
    }
}
//次级目录按钮触发显示
function sidegridechoose(btn) {
    $(btn).addClass('active').siblings().removeClass('active');
}

//密码修改表单的验证
$('#p_pm_main_form').form({
    fields: {

        pw: {
            identifier: 'pw',
            rules: [
                {
                    type: 'empty',
                    prompt: '请输入您的新密码'
                },
                {
                    type: 'minLength[6]',
                    prompt: '密码最少为6位'
                }
            ]
        },
        pw_again: {
            identifier: 'pw_again',
            rules: [
                {
                    type: 'match[pw]',
                    prompt: '您两次输入的密码不一致'
                }
            ]
        },
        pw_check: {
            identifier: 'pw_check',
            rules: [
                {
                    type: 'different[pw]',
                    prompt: '您的密码没有变化'
                }
            ]
        },

        terms: {
            identifier: 'terms',
            rules: [
                {
                    type: 'checked',
                    prompt: '您需要同意条款'
                }
            ]
        }
    },
    inline: true,
    on: 'blur'
});
//
function pwcheck() {
    console.log('弹出')
    $('#p_pm_main_check').modal('show');
}

//查看个人的基本信息
function p_info(btn) {
    sidegridechoose(btn);
    $('#p_info_main').show().siblings().hide();
    console.log('查看个人的基本信息');
    $.ajax({
        type: "get",
        url: '/person/info',
        dataType: 'json',
        cache: false,
        data: {},//上传数据

        success: function (data) { //data表示接收到的数据
            if (data == null) {
                console.log('未收到请求')
                return;
            }
            if (data.status != 0) {
                $('#p_info_main').removeClass('loading');
                $('#p_main_dh').show();
                $('.p_main_dh_nr').html('个人信息：')
                $('#p_info_main_name').html(data.message.name);
                $('#p_info_main_email').html(data.message.email);
                $('#p_info_main_id').html(data.message.owner_id);
                $('#p_info_main_phone').html(data.message.phone);
                $('#p_info_main_sex').html(data.message.sex);
                $('#p_info_main_work').html(data.message.work);
                console.log(data);
                return;
            }
        },
        error: function () {
            alert('暂时帮不到您，抱歉');
        }
    });
}
//查看个人房产信息
function p_house(btn) {
    sidegridechoose(btn);
    $('#p_house_main').show().siblings().hide();
    console.log('查看个人房产信息');
    $.ajax({
        type: "get",
        url: '/person/house',
        dataType: 'json',
        cache: false,
        data: {},//上传数据

        success: function (data) { //data表示接收到的数据
            if (data == null) {
                console.log('未收到请求')
                return;
            }
            if (data.status != 0) {
                $('#p_house_main').removeClass('loading');
                $('.p_main_dh_nr').html('个人房屋信息：');
                $('#p_house_main_id').html(data.message.house_id);
                $('#p_house_main_id_building').html(data.message.id_building);
                $('#p_house_main_id_unit').html(data.message.id_unit);
                $('#p_house_main_id_id').html(data.message.id_id);
                $('#p_house_main_area').html(data.message.area);
                $('#p_house_main_time').html(data.message.house_time.substring(0,10));
                console.log(data);
                return;
            }
        },
        error: function () {
            alert('暂时帮不到您，抱歉');
        }
    });
}
//修改个人信息 信息更改展示
function p_modify_info_1(btn) {
    sidegridechoose(btn);
    $('#p_modify_main').show().siblings().hide();//将显示框调进来
    console.log('个人信息修改');
    $.ajax({
        type: "get",
        url: '/person/info',
        dataType: 'json',
        cache: false,
        data: {},//上传数据

        success: function (data) { //data表示接收到的数据
            if (data == null) {
                console.log('未收到请求')
                return;
            }
            if (data.status != 0) {//结果返回
                $('#p_modify_main').removeClass('loading');//取消等待
                $('#p_modify_main_default_name').attr('placeholder', data.message.name);
                $("#p_modify_main_default_sex").html(data.message.sex);
                $('#p_modify_main_default_id').attr('placeholder', data.message.owner_id);
                $('#p_modify_main_default_phone').attr('placeholder', data.message.phone);
                $('#p_modify_main_default_email').attr('placeholder', data.message.email);
                $('#p_modify_main_default_work').attr('placeholder', data.message.work);
                console.log(data);
                return;
            }
        },
        error: function () {
            alert('暂时帮不到您，抱歉');
        }
    });
}
//修改个人信息 信息更改提交
function p_modufy_info_2() {
    console.log($('input[id=p_modify_main_default_phone]').val());
    $.ajax({
        type: "get",
        url: '/person/info_change',
        dataType: 'json',
        cache: false,
        data: {
            phone: $('input[id=p_modify_main_default_phone]').val(),
            email: $('input[id=p_modify_main_default_email]').val(),
            work: $('input[id=p_modify_main_default_work]').val()
        },//上传数据

        success: function (data) { //data表示接收到的数据
            if (data == null) {
                console.log('未收到请求')
                return;
            }
            if (data.status != 0) {//结果返回
                if (data.message == 11)
                    $('#error_email_un').modal('show');
                if (data.message == 0)
                    $('#p_modify_main_feedback_success').modal('show');
                console.log(data);
                return;
            }
        },
        error: function () {
            alert('暂时帮不到您，抱歉');
        }
    });
}
//修改个人信息 密码更改展示
function p_modify_pw_1(btn) {
    sidegridechoose(btn);
    console.log('密码修改');
    $('#p_pm_main').show().siblings().hide();//将显示框调进来
}
//修改个人信息 密码更改展示
function p_modify_pw_2(btn) {
    console.log('激活');
    $newps = $('input[name=pw]').val();
    $oldps = $('input[name=pw_check]').val();
    if ($newps.length < 6 || $newps == $oldps || $newps !== $('input[name=pw_again]').val()) {
        console.log('拒绝请求')
        return;
    }

    $.ajax({
        type: "get",
        url: '/person/info_pw_change',
        dataType: 'json',
        cache: false,
        data: {
            newps: $newps, oldps: $oldps
        },//上传数据
        success: function (data) { //data表示接收到的数据
            if (data == null) {
                console.log('未收到请求')
                return;
            }
            if (data.status != 0) {//结果返回
                if (data == 1)
                    $('#p_pm_main_feedback_success')
                        .modal('show')
                    ;
                if (data == 0)
                    $('#p_pm_main_feedback_fail')
                        .modal('show')
                    ;
                console.log(data);
                return;
            }
        },
        error: function () {
            alert('暂时帮不到您，抱歉');
        }
    });
}
//价格查询 水1 电2 物业管理3 当前为4
function pr_check(btn, $cate) {
    sidegridechoose(btn);//正常显示边栏
    $('#pr_5_1').html(btn);
    $('#pr_5_2').html($cate);
    $('#price_main').show().siblings().hide();//显示内容框
    $(".price_water_main_start tr").empty("");//清除原来的行
    console.log('水费查询');
    $.ajax({
        type: "get",
        url: '/price',
        dataType: 'json',
        cache: false,
        data: {cate: $cate},//上传数据

        success: function (data) { //data表示接收到的数据
            if (data == null) {
                console.log(data);
                return;
            }
            if (data.status != 0) {
                var $i = 1;
                for (var $el in data.message) {
                    console.log(data.message[$el]);
                    $('.price_water_main_start').append('<tr>' +
                        '<td>' + $i + '</td>' +
                        '<td>' + data.message[$el].name + '</td>' +
                        '<td>' + data.message[$el].price + '</td>' +
                        '<td>' + data.message[$el].uom + '</td>' +
                        '<td>' + data.message[$el].cate_time.substring(0,10) + '</td>' +
                        '</tr>')
                    $i++;
                }
                console.log(data);
                return;
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert('暂时帮不到您，抱歉');
        }
    });
}
//账单查询 水1 电2 物业管理3 当前为4
function fee_check(btn, $cate) {
    sidegridechoose(btn);//正常显示边栏
    $('#fee_main').show().siblings().hide();//显示内容框
    $(".price_water_main_start tr").empty("");//清除原来的行
    console.log('账单查询');
    $.ajax({
        type: "get",
        url: '/fee_check',
        dataType: 'json',
        cache: false,
        data: {cate: $cate},//上传数据

        success: function (data) { //data表示接收到的数据
            if (data == null) {
                console.log(data);
                return;
            }
            if (data.status != 0) {
                var $i = 1;
                for (var $el in data.message) {
                    $catecate = '类别';
                    console.log(data.message[$el].cate);
                    switch (data.message[$el].cate) {
                        case '1' :
                            $catecate = '水费';
                            break;
                        case '2' :
                            $catecate = '电费';
                            break;
                        case '3' :
                            $catecate = '物业管理费';
                            break;
                        default:
                            $catecate = '匹配失败'
                    }
                    $idid = "'id" + $i + "'";
                    console.log($idid);
                    $button = '<div class="ui animated fade button">' +
                        '<div class="visible content" onclick="fee_up(' + $idid + ')">点击缴费</div>' +
                        '<div class="hidden content" onclick="fee_up(' + $idid + ')">' +
                        '模拟缴费阶段' +
                        '</div>' +
                        '</div>';
                    if (data.message[$el].haved == 1)
                        $button = '<div class="ui large label">' +
                            '已缴费' +
                            '</div>';
                    console.log(data.message[$el]);
                    $('.price_water_main_start').append('<tr>' +
                        '<td>' + $i + '</td>' +
                        "<td id = " + $idid + ">" + data.message[$el].id + "</td>" +
                        '<td>' + $catecate + '</td>' +
                        '<td>' + data.message[$el].amount + '</td>' +
                        '<td>' + (data.message[$el].money / data.message[$el].amount).toFixed(2) + '</td>' +
                        '<td>' + data.message[$el].money + '</td>' +
                        '<td>' + data.message[$el].time.substring(0, 10) + '</td>' +
                        '<td> '+$button+'</td>' +
                        '</tr>'
                    );
                    $i++;
                }
                console.log(data);
                return;
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert('暂时帮不到您，抱歉');
        }
    });
}

//确认缴费
function fee_up(btn) {
    $.ajax({
        type: "get",
        url: '/fee_up',
        dataType: 'json',
        cache: false,
        data: {id: $('#'+btn).html()},//上传数据
        success: function (data) { //data表示接收到的数据
            if (data == null) {
                console.log(data);
                return;
            }
            if (data.status != 0) {
                if(data.message==1) {
                    $('#fee_main_feedback_success').modal('show');
                    fee_check($('#pr_5_1').html(), $('#pr_5_2').html());
                }

                console.log(data);
                return;
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert('暂时帮不到您，抱歉');
        }
    });
}