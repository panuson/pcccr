
$(document).on('click','[data-dialog]',function(){
var head;
var label_1;
var ele_1; // 
var ele_2; // 
var ele_3; // 
var ele_4;
var file;
var type     = $(this).data('dialog');
var id       = $(this).data('id');
var name     = $(this).data('name');
var position = $(this).data('position');
var img      = $(this).data('img');
var row      = $(this).data('row');
var no       = $(this).data('no');
var pid      = $(this).data('pid');
if(type === 'person'){
    if(id!==""){
        head = 'แก้ไขบุคลากร';
        ele_3 = '<input type="hidden" name="id" value="'+id+'" />';
    }else{
        head = 'เพิ่มบุคลากร';
        ele_3 = '<input type="hidden" name="row" value="'+row+'" /> <input type="hidden" name="type" value="'+pid+'" />';
    }
    if(img===""){
        file  = '<label class="v-top" for="filename1">รูปภาพ</label><div><input name="filename1" data-type="jpg,jpeg,gif" data-alert="true" type="file"/></div>';
        ele_4 = '<input type="hidden" name="no" value="'+no+'" />';
    }else{
        file  = '<div>'+
                '<img src="../../filesAttach/personnel/'+img+'" height="250" alt="">'+
                '</div>'+
                '<label for="filename1" class="v-top">เปลี่ยนรูป : </label><input data-change-img="true" data-type="jpg,jpeg,gif" data-alert="true" name="filename1" type="file">';
        ele_4 = '<input type="hidden" value="'+img+'" name="file_old" />';
    }
    ele_1 = '<div class="form-group">'+
            '<label for="">ตำแหน่ง</label>'+
            '<input style="width:100%" class="form-control" name="position" type="text" value="'+position+'" />'+
            '</div>';
    ele_2 = '<div class="form-group">'+file+
            '</div>';
    label_1 = 'ชื่อ - สกุล';
    
}

var d = alertify.confirm();
d.setHeader(head)
d.set({
    transition: 'slide',
    labels: { ok: 'บันทึกข้อมูล', cancel: 'ยกเลิก' },
    onshow: function() {
         d.setContent('<form action="control/command.php" enctype="multipart/form-data" method="post" target="iframe">'+ele_3+ele_4+
                      '<div class="form-group">'+
                      '<label for="">'+label_1+'</label>'+
                      '<input style="width:100%" class="form-control" name="topic" type="text"  value="'+name+'"/>'+
                      '</div>'+ele_1+ele_2+
                      '<input style="display:none;" name="save" id="save" type="submit" />'+
                      '</form>');
        },
    onok: function(Event){
        Event.cancel = true;
        $('#save').click();
    }
    }).show()
})
$(document).on('change', '[data-change-img]', function() {
    if ($(this)["0"].files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('.change_img > img').attr('src', e.target.result).fadeIn();
            $('.old_img').fadeIn();
        }

        reader.readAsDataURL($(this)["0"].files[0]);
    }
});

$(document).ready(function(){
        if ($("#list").length > 0) {
        $('div#list').each(function() {
            $(this).sortable({
                handle: '#move',
                update: function() {
                    var order = $(this).sortable('serialize');
                    $.ajax({
                        url: 'control/command.php',
                        type: 'post',
                        data: order,
                        success: function(data) {
                            if (data) {
                                alertify.success('บันทึกข้อมูลเรียบร้อยแล้ว');
                            }
                            if (data === "OK") {
                                return true;
                            } else {
                                return false;
                            }
                        }
                    })
                }
            });
        })
    }
});

// Change new image
$(document).on('change', '[data-change-img]', function() {
    if ($(this)["0"].files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('.change_img > img').attr('src', e.target.result).fadeIn();
            $('.old_img').fadeIn();
        }

        reader.readAsDataURL($(this)["0"].files[0]);
    }
});

$(document).on('change', 'input[type="file"]', function() {
    var file = $(this)["0"].files["0"];
    var extall = $(this).data('type');
    var ext = $(this)["0"].value.split('.').pop().toLowerCase();
    var a = $(this).data('alert');
    var upload = $(this).data('upload');
    if (file) {
        if (parseInt(extall.indexOf(ext)) < 0) {
            alertify
                .alert('แจ้งเตือน', a, function() {});
            $(this).val('');
        }else{
            if(upload===true){
                $('#upload').click();
            }
        }
    } else {
        $(this).val('');
    }
});

function success(text, url) {
    alertify.alert('แจ้งเตือน', text, function() {
        setTimeout(function() {
            location.replace(url);
        }, 200)
    });
}
function person_show(id, s) {
    if (s === '0') {
        var status = 1;
    } else {
        var status = 0;
    }
    $.ajax({
        url: 'control/command.php',
        type: 'post',
        data: {
            id: id,
            status: status,
        },
        success: function(data) {
            if (data) {
                alertify.success('บันทึกข้อมูลเรียบร้อยแล้ว');
            }
            if (data === "OK") {
                return true;
            } else {
                return false;
            }
        }
    })
}
// Drag & Drop
function dnd() {
    $("div#drop").draggable({
        revert: true,
        handle: '',
    });
    $(".box2").droppable({
        accept: '#drop',
        drop: function(event, ui) {
            var item1 = $(this).find('div').data('id'); // ele ที่โดนสลับ
            var row_1 = $(this).find('div').data('row'); // ele ที่โดนสลับ
            var no_1 = $(this).find('div').data('no'); // ele ที่โดนสลับ

            var item2 = $(ui.draggable).data('id'); // ele ที่โดนลาก 
            var row_2 = $(ui.draggable).data('row'); // ele ที่โดนลาก 
            var no_2 = $(ui.draggable).data('no'); // ele ที่โดนลาก 
            if ($(this).children().length > 0) {
                var move = $(this).children().detach();
                console.log(move)
                $(ui.draggable).parent().append(move);
            }

            $(this).append($(ui.draggable));
            $.ajax({
                url: 'control/command.php',
                type: 'post',
                data: {
                    dnd: 'true',
                    id1: item1,
                    r1: row_1,
                    no1: no_1,
                    id2: item2,
                    r2: row_2,
                    no2: no_2,
                },
                success: function(data) {
                    if (data) {
                        alertify.success('บันทึกข้อมูลเรียบร้อยแล้ว');
                        setTimeout(function(){
                            location.replace('')
                        },200)
                    }
                    if (data === "OK") {
                        return true;
                    } else {
                        return false;
                    }
                }
            })

        }

    });
}
$(document).on('click', '[data-del]', function() {
    var id = $(this).data('id');
    var file = $(this).data('file');
    var type = $(this).data('del');
    var no = $(this).data('no');
    alertify.confirm('แจ้งเตือน', "คุณต้องการลบข้อมูลนี้ใช่หรือไม่ !?",
        function() {
            alertify.success('ลบข้อมูลเรียบร้อยแล้ว');
            $.ajax({
                url: 'control/command.php',
                type: 'post',
                data: {
                    id: id,
                    file: file,
                    no: no,
                    deltype: type,
                },
                success: function(data) {
                    if (data) {
                        setTimeout(function() { location.replace(''); }, 150)

                    }
                    if (data == "OK") {
                        return true;
                    } else {
                        return false;
                    }
                }
            })
        },
        function() {
            alertify.error('ยกเลิก');
        });
});