(function($) {
    // var username = '';
    var password = '';
    var email = '';
    var domain_name_cpanel = '';
    var project_id = '';

    var client_name = '';
    var subdomain = '';
    var company_name = '';
    var product_id = '';
    var domain_name_admin = '';

    var domain_app = '';
    var appname = '';
    var map_api_key = '';
    var username_app = '';
    var phone = '';
    var email_app  = '';
    var colorcode  = '';
    
    var opt1  = '';
    var opt2  = '';
    var opt3  = '';
    var versionname  = '';
    var versioncode  = '';
    
    var slug = '';

    var cpanel_id = '';

    var app_cpanel_id = '';

    var app_username = '';

    var username_from_id = '';

    var upload_logo_directory = '';

    $(".loading-api").hide();
    $('#advanced').hide();
    $('#advanced-toggle').hide();
    $('.admin_panel_form').hide();
    $('.make_app_form').hide();
    $('.table-data-app').hide();
    $('.table-data-admin').hide();
    $('.table-data-cpanel').hide();
    $("#task-completed-div").hide();
    $(".app_uploaded_file").hide();
    
    $(document).on('click','#edit-app',function() {
        $('.jumbotron>.lead').html('');
        $('.make_app_form').show();
        $('.signup-form-conent').show(); 
        $('#cpanel').parent().removeClass('active');
        $('#admin_panel').parent().removeClass('active');
        $('#make_app').parent().addClass('active');
        $('#my_admin_panel').parent().removeClass('active');
        $('#my_cpanel').parent().removeClass('active');
        $('#my_app').parent().removeClass('active');
        $('.cpanel-form').hide();
        $('.admin_panel_form').hide();
        $('.table-data-admin').hide();
        $('.table-data-app').hide();
        $('.table-data-cpanel').hide();
        $(".app_uploaded_file").show();
        $('#appname').val($(this).parent().parent().find('td:eq(1)').text());
        $('#appicon_file').attr("href", $(this).parent().parent().find('td:eq(2)').text());
        $('#appicon_file').text($(this).parent().parent().find('td:eq(2)').text());
        $('#splashscreen_file').attr("href", $(this).parent().parent().find('td:eq(3)').text());
        $('#splashscreen_file').text($(this).parent().parent().find('td:eq(3)').text());
        $('#domain_app').val($(this).parent().parent().find('td:eq(5)').text());
        $('#phone').val($(this).parent().parent().find('td:eq(6)').text());
        $('#email_app').val($(this).parent().parent().find('td:eq(7)').text());
        $('#colorcode').val($(this).parent().parent().find('td:eq(8)').text());
        $('#json_file_upload').attr("href", $(this).parent().parent().find('td:eq(9)').text());
        $('#json_file_upload').text($(this).parent().parent().find('td:eq(9)').text());
        $('#opt1').val($(this).parent().parent().find('td:eq(11)').text());
        $('#opt2').val($(this).parent().parent().find('td:eq(12)').text());
        $('#opt3').val($(this).parent().parent().find('td:eq(13)').text());
        $('#version_name').val($(this).parent().parent().find('td:eq(14)').text());
        $('#version_code').val($(this).parent().parent().find('td:eq(15)').text());
    });
    $(document).on('click','#cpanel',function() {
        $('.jumbotron>.lead').html('');
        $('.cpanel-form').show();
        $('.signup-form-conent').show(); 
        $('#cpanel').parent().addClass('active');
        $('#make_app').parent().removeClass('active');
        $('#admin_panel').parent().removeClass('active');
        $('#my_admin_panel').parent().removeClass('active');
        $('#my_cpanel').parent().removeClass('active');
        $('#my_app').parent().removeClass('active');
        $('.admin_panel_form').hide();
        $('.make_app_form').hide();
        $('.table-data-admin').hide();
        $('.table-data-app').hide();
        $('.table-data-cpanel').hide();
    });
    $(document).on('click','#admin_panel',function() {
        $('.jumbotron>.lead').html('');
        $('.admin_panel_form').show();
        $('.signup-form-conent').show(); 
        $('#cpanel').parent().removeClass('active');
        $('#make_app').parent().removeClass('active');
        $('#admin_panel').parent().addClass('active');
        $('#my_admin_panel').parent().removeClass('active');
        $('#my_cpanel').parent().removeClass('active');
        $('#my_app').parent().removeClass('active');
        $('.cpanel-form').hide();
        $('.make_app_form').hide();
        $('.table-data-admin').hide();
        $('.table-data-app').hide();
        $('.table-data-cpanel').hide();
    });
    $(document).on('click','#make_app',function() {
        $('.jumbotron>.lead').html('');
        $('.make_app_form').show();
        $('.signup-form-conent').show(); 
        $('#cpanel').parent().removeClass('active');
        $('#admin_panel').parent().removeClass('active');
        $('#make_app').parent().addClass('active');
        $('#my_admin_panel').parent().removeClass('active');
        $('#my_cpanel').parent().removeClass('active');
        $('#my_app').parent().removeClass('active');
        $('.cpanel-form').hide();
        $('.admin_panel_form').hide();
        $('.table-data-admin').hide();
        $('.table-data-app').hide();
        $('.table-data-cpanel').hide();
    });
    $(document).on('click','#my_admin_panel',function() {
        $('.jumbotron>.lead').html('');
        $('#cpanel').parent().removeClass('active');
        $('#admin_panel').parent().removeClass('active');
        $('#make_app').parent().removeClass('active');
        $('#my_cpanel').parent().removeClass('active');
        $('#my_admin_panel').parent().addClass('active');
        $('#my_app').parent().removeClass('active'); 
        $('.signup-form-conent').hide();
        $('.table-data-admin').show();
        $('.table-data-app').hide();
        $('.table-data-cpanel').hide();
    });
    $(document).on('click','#my_cpanel',function() {
        $('.jumbotron>.lead').html('');
        $('#cpanel').parent().removeClass('active');
        $('#admin_panel').parent().removeClass('active');
        $('#make_app').parent().removeClass('active');
        $('#my_admin_panel').parent().removeClass('active');
        $('#my_cpanel').parent().addClass('active');
        $('#my_app').parent().removeClass('active');
        $('.signup-form-conent').hide(); 
        $('.table-data-admin').hide();
        $('.table-data-app').hide();
        $('.table-data-cpanel').show();
    });
    $(document).on('click','#my_app',function() {
        $('.jumbotron>.lead').html('');
        $('#cpanel').parent().removeClass('active');
        $('#admin_panel').parent().removeClass('active');
        $('#make_app').parent().removeClass('active');
        $('#my_admin_panel').parent().removeClass('active');
        $('#my_cpanel').parent().removeClass('active');
        $('#my_app').parent().addClass('active');
        $('.signup-form-conent').hide(); 
        $('.table-data-admin').hide();
        $('.table-data-cpanel').hide();
        $('.table-data-app').show();
    });
    var form1 = $("#signup-form");
    form1.validate({
        errorPlacement: function errorPlacement(error, element) { element.before(error); },
        rules: {
            confirm: {
                equalTo: "#password"
            }
        }
    });
    form1.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        labels: {
            previous: 'Previous',
            next: 'Next',
            finish: 'Finish',
            current: ''
        },
        titleTemplate: '<h3 class="title">#title#</h3>',
        onStepChanging: function (event, currentIndex, newIndex)
        {
            form1.validate().settings.ignore = ":disabled,:hidden";
            return form1.valid();
        },
        onFinishing: function (event, currentIndex)
        {
            form1.validate().settings.ignore = ":disabled";
            return form1.valid();
        },
        onFinished: function(event, currentIndex) {
            $(".loading-api").show();
        },
    });
    var form = $("#admin_panel_form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) { element.before(error); },
        rules: {
            confirm: {
                equalTo: "#password"
            }
        }
    });
    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        labels: {
            previous: 'Previous',
            next: 'Next',
            finish: 'Finish',
            current: ''
        },
        titleTemplate: '<h3 class="title">#title#</h3>',
        onStepChanging: function (event, currentIndex, newIndex)
        {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function (event, currentIndex)
        {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function(event, currentIndex) {
            $(".loading-api").show();
        },
    });
    var form = $("#make_app_form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) { element.before(error); },
        rules: {
            confirm: {
                equalTo: "#password"
            }
        }
    });
    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        labels: {
            previous: 'Previous',
            next: 'Next',
            finish: 'Finish',
            current: ''
        },
        titleTemplate: '<h3 class="title">#title#</h3>',
        onStepChanging: function (event, currentIndex, newIndex)
        {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function (event, currentIndex)
        {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function(event, currentIndex) {
            $(".loading-api").show();
        },
    });

    $(".toggle-password").on('click', function() {
        $(this).toggleClass("zmdi-eye zmdi-eye-off");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
    });
    
    $(document).on('click',"#advanced-toggle",function() {
            $('#advanced').toggle();
    });
    
    $(document).on('click',"#toggle-sidebar",function() {
            $('.signup-desc').toggle();
            $('.signup-content').toggleClass('pb-207');
    });
    
    $(document).on('click',"a[href='#next']",function() {
        if($('#username').val()!='' && $('#password').val()!='' && $('#email').val()!='' && $('#domain_name_cpanel').val()!='' && $('#client_name').val()!=''){
            username = $('#username').val();
            password = $('#password').val();
            email = $('#email').val();
            domain_name_cpanel = $('#domain_name_cpanel').val();
            client_name = $('#client_name').val();
        }
        if($('#company_name').val()!='' && $('#product_id').val()!='' && $('#domain_name_admin').val()!=''){
            subdomain = $('#subdomain').val();
            company_name = $('#company_name').val();
            product_id = $('#product_id').val();
            domain_name_admin = $('#domain_name_admin').val();
            $('#domain_name_admin').change(function() {
                cpanel_id = $('#domain_name_admin').find(':selected').data('id');
            });
            if(product_id){
                $.ajax({
                    url: 'http://ssoft.xyz/api/getProductSlugById.php',
                    method: 'post',
                    data:{product_id:product_id},
                    success: function(result) {
                        slug = JSON.parse(result);
                        console.log(slug);
                    }
                });
            }
            if(cpanel_id){
                $.ajax({
                    url: 'http://ssoft.xyz/api/getUsernameById.php',
                    method: 'post',
                    data:{cpanel_id:cpanel_id},
                    success: function(result) {
                        username_from_id = JSON.parse(result);
                        console.log(username_from_id);
                    }
                });
            }
        }
        if($('#domain_app').val()!='' && $('#appname').val()!='' && $('#map_api_key').val()!='' && $('#phone').val()!='' && $('#email_app').val()!='' && $('#colorcode').val()!=''){
            domain_app = $('#domain_app').val();
            appname = $('#appname').val();
            map_api_key = $('#map_api_key').val();
            // username_app = $('#username_app').val();
            phone = $('#phone').val();
            email_app = $('#email_app').val();
            colorcode = $('#colorcode').val();
            app_cpanel_id = $('#domain_app').find(':selected').data('cpanelid');
            if(app_cpanel_id){
                $.ajax({
                    url: 'http://localhost/Cpanel/getCpanelUsername.php',
                    method: 'post',
                    data:{app_cpanel_id:app_cpanel_id},
                    success: function(result) {
                        username_app = JSON.parse(result);
                        console.log(username_app);
                    }
                });
            }
            if(colorcode){
                $('#advanced-toggle').show();
                $(document).on('click',"#advanced-submit",function(e) {
                    e.preventDefault();
                    opt1 = $('#opt1').val();
                    opt2 = $('#opt2').val();
                    opt3 = $('#opt3').val();
                    versionname = $('#version_name').val();
                    versioncode = $('#version_code').val();
                    $('#advanced-toggle').hide();
                    $('#advanced').hide();
                    $("#advanced-toggle").attr("disabled", true);
                });
            }
            if(domain_app){
                $.ajax({
                    url: 'http://ssoft.xyz/api/getProductId.php',
                    method: 'post',
                    data:{domain:domain_app},
                    success: function(result) {
                        product_id_app = JSON.parse(result);
                        console.log(product_id_app);
                    }
                });
            }
        }
    });

    $(document).on('click',"a[href='#finish']",function() {
        if($('#project_id').val()!=''){
            $('#ajaxFrameWC').attr('src','http://ssoft.xyz/api/real_time_output_cpanel.php?domain='+domain_name_cpanel+'&password='+password+'&email='+email+'&username='+username);
            console.log('http://ssoft.xyz/api/real_time_output_cpanel.php?domain='+domain_name_cpanel+'&password='+password+'&email='+email+'&username='+username);
            project_id = $('#project_id').val();
            console.log(project_id);
            $.ajax({
                url: 'https://ssoft.xyz/api/CreateCpanel.php',
                method: 'post',
                data:{username:username,password:password,user_id:user_id,email:email,domain_name:domain_name_cpanel,client_name:client_name,project_id:project_id,id:project_id},
                success: function(result) {
                    debugger;
                    console.log(result);
                    // if(result['output']){
                    //     setTimeout(
                    //     function() {
                    //         $(".loading-api #loader").hide();
                    //         $("#task-completed-div").show();
                    //         // reload();
                    //         // $("#cpanel").click();                        
                    //     }, 27000);
                    // }
                }
            });
        }
        if($('#logo').val()!=''){
            var fd = new FormData();
            var files = $('#logo')[0].files[0];
            fd.append('logo',files);
            fd.append('company_name', company_name);
            fd.append('subdomain', subdomain);
            fd.append('product_id', product_id);
            fd.append('user_id', user_id);
            fd.append('domain_name', domain_name_admin);
            fd.append('cpanel_id', cpanel_id);
            $.ajax({
                url: 'https://ssoft.xyz/api/admin_panel.php',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(result) {
                    upload_logo_directory = result['logo_directory'];
                    $('#ajaxFrameWC').attr('src','http://ssoft.xyz/api/real_time_output_admin_panel.php?domain='+domain_name_admin+'&username='+username_from_id+'&logo='+upload_logo_directory+'&company='+company_name+'&product='+product_id+'&slug='+slug);
                    console.log('http://ssoft.xyz/api/real_time_output_admin_panel.php?domain='+domain_name_admin+'&username='+username_from_id+'&logo='+upload_logo_directory+'&company='+company_name+'&product='+product_id+'&slug='+slug);
                    if(result['output']){
                        setTimeout(
                        function() {
                            $(".loading-api").hide();
                            reload();
                            $("#admin_panel").click(); 
                        }, 27000);  
                    }
                }
            });
        }
        if($('#json_file').val()!=''){
            var formData = new FormData();
            var splashscreen_file = $('#splashscreen')[0].files[0];
            var json_file = $('#json_file')[0].files[0];
            var appicon = $('#appicon')[0].files[0];
            var domain_and_subdomain = domain_app + subdomain;
            console.log(domain_and_subdomain);
            formData.append('uid',user_id);
            formData.append('domain',domain_app);
            formData.append('appname', appname);
            formData.append('map_api_key', map_api_key);
            formData.append('username', username_app);
            formData.append('phone', phone);
            formData.append('email', email_app);
            formData.append('colorcode', colorcode);
            formData.append('splash_image',splashscreen_file);
            formData.append('file',json_file);
            formData.append('icon',appicon);
            formData.append('opt1',opt1);
            formData.append('opt2',opt2);
            formData.append('opt3',opt3);
            formData.append('version_name',versionname);
            formData.append('version_code',versioncode);
            $.ajax({
                url: 'https://ssoft.xyz/api/makeapp.php',
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
                success: function(result) {
                    var splash = result['splash_screen'];
                    var icon = result['icon'];
                    var base_url = 'https://ss'+domain_app;
                    $('#ajaxFrameWC').attr('src','http://ssoft.xyz/api/real_time_output_make_app.php?appname='+appname+'&icon='+icon+'&phone='+phone+'&base_url='+base_url+'&username='+username_app+'&product_id='+product_id_app+'&splash='+splash+'&vn='+versionname+'&vc='+versioncode);
                    if(result['output']){
                        setTimeout(
                        function() {
                            $(".loading-api").hide();
                            reload();
                            $("#make_app").click(); 
                        }, 27000); 
                    }
                }
            });
        }
    });
    
    function reload(){
        location.reload();
    }

})(jQuery);