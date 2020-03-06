$(function() {
    if($('textarea#editor').length > 0){
        var height = $('textarea#editor').attr('text-height');
        var h;
        if (height == undefined) { h = 150 } else { h = height }
        tinymce.init({
            selector: 'textarea#editor',
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
            ],
            plugin_preview_width: "1000",
            plugin_preview_height: "600",
            toolbar1: 'bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect ',
            toolbar2: ' copy paste | bullist numlist | outdent indent blockquote | undo redo | link unlink image code | preview | forecolor backcolor ',
            toolbar3: ' table | hr removeformat | emoticons media | fullscreen ',
            height: h,
        })
    }
    if ($('table#example').length > 0){
        $('table#example').DataTable({
            "bSort": false,
            "bInfo": false,
            "language": {
                "search": "ค้นหา : ",
                "zeroRecords": ":: ไม่พบข้อมูล ::",
                "paginate": {
                    "previous": "ก่อนหน้า",
                    "next": "ถัดไป"
                }
            },
            "lengthMenu": [ [50, -1], [50, "All"] ]
        });
    }
    $("body").tooltip({ selector: '[data-toggle=tooltip]' });
});
$(document).on('submit','form[data-action]',function(){
    alertify.alert().set({closable: false, frameless: true, resizable: true}).setContent(`
        <div class="loader mt-5"></div>
        <h5 class="mt-4 mb-3 text-center">กำลังบันทึกข้อมูลกรุณารอซักครู่</h5>
    `).show(); 
})
$(document).on('change', 'input[type="file"]', function() {
    var file = $(this)["0"].files["0"]
    var extall = $(this).data('type')
    var id = $(this)[0].id;
    var ext = $(this)["0"].value.split('.').pop().toLowerCase()
    var alert = $(this).data('alert')    
    //var a = $(this).data('alert')
    //var upload = $(this).data('upload')
    //var md = $(this).attr('img-detail');
    /*if (md != undefined) {
                imgDetail('Null');
                $('[add-image] > span').html('เลือกรูปภาพ. . .')
            }if (md != undefined) {
                $('[add-image] > span').html(file.name);
                var reader = new FileReader();
                reader.onload = function(e) {
                    imgDetail(e.target.result);
                }
                reader.readAsDataURL(file);
            }
            if (upload === true) {
                $('#upload').click()
            }
    */
   
    if (file) {
        if (parseInt(extall.indexOf(ext)) < 0) {
            //alertify.alert('แจ้งเตือน', a, function() {})
            $(this).addClass('is-invalid')
            $(this).val('')
            console.log(alert);
            
            if(alert == true){
                error('เฉพาะไฟล์ .jpg เท่านั้น');
            }else{
                $('label[for="'+id+'"]').html('เลือกไฟล์...')
            }
        }else{
            $(this).removeClass('is-invalid')
            console.log(alert);

            if(alert == true){
            }else{
                $('label[for="'+id+'"]').html(file.name)
            }
        }
    } else {
        $(this).val('')
        //$(this).addClass('is-invalid')
        console.log(alert);

        if(alert == true){
        }else{
            $('label[for="'+id+'"]').html('เลือกไฟล์...')
        }

    }
})
$(document).on('click','[data-delete]',function(){
    let id = $(this).data('id');
    let file = $(this).data('file');
    let type = $(this).data('delete');
    alertify.confirm('แจ้งเตือน', 'คุณต้องการลบข้อมูลนี้ใช่หรือไม่!?', 
        function(){ 
            $.ajax({
                url: './control/command.php',
                type: 'POST',
                data: {
                    id : id,
                    file: file,
                    type : type,
                    delete: true,
                },
                success:function(res){
                    location.reload();
                }
            })
        }, 
        function(){}
    );
})
$(document).on('click','[data-create-topic]',function(){
    let id =  $(this).data('id') ? $(this).data('id') : '';
    let topic = $(this).data('topic') ? $(this).data('topic') : '';
    let action = $(this).data('action') ? $(this).data('action') : '';
    let type = $(this).data('type') ? $(this).data('type') : '';
    let url = $(this).data('url') ? $(this).data('url') : '';
    let target = $(this).data('target') ? $(this).data('target') : 0;
    var header;
    
    if( id === '' ){
        header = 'เพิ่มข้อมูล';
    }else{
        header = 'แก้ไขข้อมูล';
    }

    if(url === ''){
        var checked = '';
        var uclass = 'd-none';
    }else{
        var checked = 'checked';
        var uclass = '';
    }
    if(target == 1)
    {
        var ck = 'checked';
    }else{
        var ck = '';
    }

    var d = alertify.confirm();
    d.setHeader(header)
    d.set({
        transition: 'slide',
        labels: { ok: 'บันทึกข้อมูล', cancel: 'ยกเลิก' },
        onshow: function() {
             d.setContent(`<div class="form-group">
                            <label for="create_topic">หัวข้อ</label>    
                            <input class="form-control" id="create_topic" value="${topic}">
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1" ${checked}>
                                <label class="custom-control-label" for="customCheck1">ลิงก์</label>
                            </div>
                            <input class="form-control ${uclass}" id="create_url" value="${url}">
                            <div id="settingUrl" class="custom-control custom-checkbox ${uclass}">
                                <input type="checkbox" class="custom-control-input" id="customCheck2" ${ck}>
                                <label class="custom-control-label" for="customCheck2">เปิดลิงก์หน้าต่างใหม่</label>
                            </div>
                        </div>`);
            },
        onok: function(Event){
            if(!$('input#create_topic').val()){
                Event.cancel = true;
                alertify.alert('แจ้งเตือน','กรุณากรอกหัวข้อ');
            }
            console.log($('input#create_url').val());
            
            topic = $('input#create_topic').val()
            if($('#customCheck1')[0].checked == true)
            {
                url = $('input#create_url').val()
                if($('#customCheck2')[0].checked == true)
                {
                    target = 1
                }else{
                    target = 0
                }
            }else{
                url = ''
            }
            $.ajax({
                url : 'control/command.php',
                type : 'POST',
                data : {
                    id : id,
                    topic: topic,
                    type : type,
                    url : url,
                    target: target,
                    action: action,
                },
                success: function(res){
                    if(res=='true'){
                        location.reload()
                    }
                }
            })  
            
        }
    }).show()

})
$(document).on('change','input#customCheck1',function(){
    if($(this)[0].checked == true)
    {
        $('#create_url, #settingUrl').removeClass('d-none');
    }
    else
    {
        $('#create_url, #settingUrl').addClass('d-none');
    }
})
$(document).on('click','[data-add-topic]',function(){
    let id =  $(this).data('id');
    let topic = $(this).data('topic');
    let action = $(this).data('action');
    let type = $(this).data('type');
    var header;
    
    if( id === undefined ){
        header = 'เพิ่มข้อมูล';
    }else{
        header = 'แก้ไขข้อมูล';
    }
    alertify.prompt(header, 'หัวข้อ', topic ? topic : '', function(evt, value) {
        $.ajax({
            url : 'control/command.php',
            type : 'POST',
            data : {
                id : id,
                topic: value,
                type : type,
                action: action,
            },
            success: function(res){
                if(res=='true'){
                    location.reload()
                }
            }
        })                   
    }, function() { })
    .set({
        labels: { ok: 'บันทึกข้อมูล', cancel: 'ยกเลิก' }
    });
})
$(document).on('click','[data-sort]',function(){
    let id      = $(this).data('sort')
    let no      = $(this).data('no')
    let action  = $(this).data('action')
    let type    = $(this).data('type');
    let type_id = $(this).data('type-id')
    $.ajax({
        url: 'control/command.php',
        type: 'POST',
        data : {
            id : id,
            no : no,
            sort: action,
            type: type,
            type_id : type_id,
        },
        success: function(res){
            var json = JSON.parse(res)
            if(json.status === 'true')
            {
                location.replace('')
            }
            else
            {
                error(json.status)
            }
        }
    })
})
$(document).on('click','[data-create-course]',function(){
    alertify.prompt('เพิ่มหลักสูตร', 'หัวข้อ', '', function(evt, value) {
        $.ajax({
            url: 'control/command.php',
            type: 'POST',
            data : {
                topic: value,
                create_course: 'true'
            },
            success: function(res){
                var json = JSON.parse(res)
                if(json.status === 'true')
                {
                    location.replace('')
                }
                else
                {
                    error(json.status)
                }
            }
        })
    }, function() { })
    
    
})
$(document).on('click','[data-choice]',function(){
    let choice = $(this).data('choice');
    let course = $(this).data('course');
    let id     = $(this).data('id');
    let topic  = $(this).data('topic');
        if(choice == 'main')
        {
            var cho_type = 0;
        }
        else
        {
            var cho_type = 1;
        }

        alertify.prompt('จัดการชื่อตัวเลือก', 'ชื่อตัวเลือก', topic ? topic : '', function(evt, value) {
            $.ajax({
                url: 'control/command.php',
                type: 'POST',
                data : {
                    id : id,
                    topic: value,
                    course_id : course,
                    type : cho_type,
                    create_choice: 'true'
                },
                success: function(res){
                    var json = JSON.parse(res)
                    if(json.status === 'true')
                    {
                        /*$('[choice-'+choice+'="'+course+'"]').append(`
                            <div class="custom-control custom-radio edit-radio d-inline-block mr-3 mb-3">
                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" disabled>
                                <label class="custom-control-label" contenteditable="true" for="choice_${course}">${value}</label>
                                <a data-delete="choice" data-id="${json.id}" style="margin-left: -4px;vertical-align: unset;" class="btn btn-danger btn-sm" href="javascript:void(0)">
                                    <i class="material-icons">close</i>
                                </a>
                            </div>
                        `)*/
                        location.replace('')
                    }
                    else
                    {
                        error(json.status)
                    }
                }
            })               
        }, function() { })
        .set({
            labels: { ok: 'บันทึกข้อมูล', cancel: 'ยกเลิก' }
        });
})
$(document).on('change keyup paste','[data-course-topic]' ,function() {
    let course_id = $(this).data('course');
    let type = $(this).data('course-topic');
    let id = $(this).data('id');
    let value = $(this).val();
    $.ajax({
        url: 'control/command.php',
        type: 'POST',
        data : {
            id: id,
            topic: value,
            course_id : course_id,
            type : type,
            action: 'choice_topic'
        },
        success: function(res){
            
        }
    })
})
$('body').on('focus', '[contenteditable]', function() {
    const $this = $(this);
    $this.data('before', $this.html());
}).on('blur keyup paste input', '[contenteditable]', function() {
    const $this = $(this);
    if ($this.data('before') !== $this.html()) {
        $this.data('before', $this.html());
        $this.trigger('change');
        var value = $this[0].innerText;
        var id = $(this).data('id');
        $.ajax({
            url: 'control/command.php',
            type: 'POST',
            data : {
                id: id,
                topic: value,
                update_choice: true
            },
            success: function(res){
                
            }
        })
        
    }
});

$(document).on('click','[data-selected]',function(e){
    if(this.value == 0)
    {
        $('#useSelected_file').removeClass('d-none')
        $('#useSelected_link').addClass('d-none')
    }else{
        $('#useSelected_link').removeClass('d-none')
        $('#useSelected_file').addClass('d-none')
    }
})
function success(text,url){
    alertify.alert('แจ้งเตือน', text, function() {
        setTimeout(function() {
            location.replace(url);
        }, 200)
    }).set({closable: true, frameless: false, resizable: false});
}
function error(text){
    alertify.alert('แจ้งเตือน',text);
}