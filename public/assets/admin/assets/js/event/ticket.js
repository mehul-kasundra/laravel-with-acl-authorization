(function (options) {

    var ticket = {

        tinymce: options.tinymce,
        js_config: options.js_config,
        js_data: options.js_data,
        add_section_btn: 'disable',
        add_ticket_btn: [],
        // stores section codes for which ticket add
        // is requested, ticket btn validation is done
        // based on this array values
        used_sections: [],

        init: function () {
            this.cacheDom();
            this.bindEvents();
            this.initTextEditor();
            this.initJqueryFormValidation();

            if (this.js_data.enable_section_add_btn) {
                this.add_section_btn = 'enable';
                this.toggleSectionAddBtn();
            }

        },
        cacheDom: function () {
            this.$ticket_tab = $('#ticket-tab-content');
            this.$section_wrapper = this.$ticket_tab.find('#section-wrapper');
            this.$section_add_btn_wrapper = this.$ticket_tab.find('#section-add-btn-wrapper');
            this.$section_add_btn = this.$ticket_tab.find('#section-add-btn');
        },
        bindEvents: function () {
            this.$section_wrapper.delegate(".section-save-btn", "click", this.storeNewSection.bind(this));
            this.$section_wrapper.delegate(".section-update-btn", "click", this.updateSection.bind(this));
            this.$section_wrapper.delegate(".section-status-btn", "click", this.updateSectionStatus.bind(this));
            this.$section_wrapper.delegate(".toggle-section-description", "click", this.toggleSectionDescription.bind(this));
            this.$section_wrapper.delegate(".btn-submit-edit", "click", this.loadSectionUpdateForm.bind(this));
            this.$section_wrapper.delegate(".toggle-ticket-description", "click", this.toggleTicketDescription.bind(this));
            this.$section_wrapper.delegate(".section-cancel-btn", "click", this.removeSectionForm.bind(this));
            this.$section_wrapper.delegate(".btn-ticket-add", "click", this.loadTicketCreateForm.bind(this));
            this.$section_wrapper.delegate(".ticket-cancel-btn", "click", this.removeTicketForm.bind(this));
            this.$section_wrapper.delegate(".ticket-save-btn", "click", this.storeNewTicket.bind(this));
            this.$section_wrapper.delegate(".btn-ticket-edit", "click", this.loadTicketUpdateForm.bind(this));
            this.$section_wrapper.delegate(".ticket-cancel-btn", "click", this.removeTicketForm.bind(this));
            this.$section_wrapper.delegate(".ticket-update-btn", "click", this.updateTicket.bind(this));
            this.$section_wrapper.delegate(".ticket-status-btn", "click", this.updateTicketStatus.bind(this));
            this.$section_add_btn.on("click", this.loadSectionCreateForm.bind(this));
        },
        // save section data and list the added section
        storeNewSection: function (event) {

            var $formWrapper = this.$section_wrapper.find('#section-add-form');

            // var $this = $(event.currentTarget);
            if (this.validateTicketSection($formWrapper.closest('form'))) {

                var data = {
                    _token: $('meta[name=csrf-token]').attr("content"),
                    promoter_code: this.js_config._promoter_code,
                    section_name: $formWrapper.find('input[name="section_name"]').val(),
                    total_ticket: $formWrapper.find('input[name="total_tickets"]').val(),
                    max_ticket_per_order: $formWrapper.find('input[name="max_ticket_per_order"]').val(),
                    section_description: this.tinymce.get('section_description').getContent(),
                };

                // for ticket edit section
                var event_code = ("_event_code" in this.js_config)?this.js_config._event_code:'';
                data.event_code = event_code;

                $.ajax({
                    method: 'POST',
                    url: $formWrapper.attr('attr-action'),
                    data: data,
                    success: function (response) {
                        var data = $.parseJSON(response);
                        $formWrapper.remove();
                        $(data.html).insertBefore(this.$section_add_btn_wrapper);
                    }.bind(this)
                }).done(function () {
                    this.add_section_btn = 'enable';
                    this.toggleSectionAddBtn();
                }.bind(this));


            } else {
                console.log('validation error....');
            }

        },
        // init jquery form validation
        initJqueryFormValidation: function (event) {

            $.each(this.$ticket_tab.find('form'), function () {

                $(this).validate({
                    errorElement: 'small',
                    errorClass: 'text-help',
                    validClass: 'form-control-success ',
                    errorPlacement: function (error, element) {
                        error.appendTo(element.closest("div"));
                    },
                    highlight: function (element, errorClass) {
                        $(element).addClass('form-control-danger').closest('div').addClass('has-danger');
                    },
                    unhighlight: function (element, errorClass) {
                        $(element).removeClass('form-control-danger').closest('div').removeClass('has-danger');
                        $(element).addClass('form-control-success').closest('div').addClass('has-success');
                    },
                    ignore: ".ignore",
                    invalidHandler: function (e, validator) {
                        if (validator.errorList.length)
                            $('#tabs a[href="#' + $(validator.errorList[0].element).closest(".tab-pane").attr('id') + '"]').tab('show');
                    },
                    rules: {}
                });
            });
            // $("#event_step_2_form").validate({
            //     errorElement: 'small',
            //     errorClass: 'text-help',
            //     validClass: 'form-control-success ',
            //     errorPlacement: function(error, element){
            //         error.appendTo(element.closest("div"));
            //     },
            //     highlight: function (element, errorClass) {
            //         $(element).addClass('form-control-danger').closest('div').addClass('has-danger');
            //     },
            //     unhighlight: function (element, errorClass) {
            //         $(element).removeClass('form-control-danger').closest('div').removeClass('has-danger');
            //         $(element).addClass('form-control-success').closest('div').addClass('has-success');
            //     },
            //     ignore: ".ignore",
            //     invalidHandler: function(e, validator){
            //         if(validator.errorList.length)
            //             $('#tabs a[href="#' + $(validator.errorList[0].element).closest(".tab-pane").attr('id') + '"]').tab('show');
            //     },
            //     rules: {
            //
            //     }
            // });
            //
            // $("[name^=section_name]").each(function () {
            //     $(this).rules("add", {
            //         required: true,
            //     });
            // });

        },
        // check if form is valid
        validateTicketSection: function (selector) {
            return selector.valid();
        },
        // Show/Hide section description
        toggleSectionDescription: function (event) {

            $this = $(event.currentTarget);
            var $desc_section = $this.closest('div[attr-section]').find('.section_description_wrapper');

            if ($desc_section.css('display') == 'none') {

                $this.html('show less');
                $desc_section.show();

            } else {

                $this.html('show more');
                $desc_section.hide();

            }

        },
        // Enable/Disable section add button
        toggleSectionAddBtn: function () {

            if (this.add_section_btn == 'enable') {
                this.$section_add_btn.attr('href', '#');
                this.$section_add_btn.removeClass('btn-default').addClass('btn-primary')
            } else {
                this.$section_add_btn.attr('href', 'javascript:void(0)');
                this.$section_add_btn.removeClass('btn-primary').addClass('btn-default')
            }

        },
        // Load new Section create form
        loadSectionCreateForm: function (event) {

            event.preventDefault();

            if (this.add_section_btn == 'enable') {

                $.ajax({
                    method: 'GET',
                    url: this.js_config._host + '/admin/event/section/create',
                    success: function (response) {
                        var data = $.parseJSON(response);
                        $(data.html).insertBefore(this.$section_add_btn_wrapper);
                    }.bind(this)
                }).done(function () {
                    this.scrollToDefinedDiv($('#section-add-form'), false);
                    this.add_section_btn = 'disable';
                    this.toggleSectionAddBtn();
                    this.initTextEditor();
                }.bind(this));

            }

        },
        // scrolls to the defined selector position
        scrollToDefinedDiv: function (selectorDiv, parentDiv) {
            var parentPosition = 0;
            if (parentDiv == false) {
                parentPosition = 0;
            } else {
                parentPosition = parentDiv.position().top;
            }
            $('.simplebar-scroll-content').animate({
                scrollTop: (selectorDiv.position().top + parentPosition)
            }, 1000);
        },
        // Remove Section Form
        removeSectionForm: function (event) {

            var $this = $(event.currentTarget);
            var section_code = $this.attr('attr-section');

            if ($this.attr('attr-request-for') == 'add') {

                var $formWrapper = this.$section_wrapper.find('#section-add-form');
                $formWrapper.remove();

            } else if ($this.attr('attr-request-for') == 'update') {

                $.ajax({
                    method: 'GET',
                    url: this.js_config._host + '/admin/event/section/' + section_code,
                    data: {
                        promoter_code: this.js_config._promoter_code,
                        section_code: section_code,
                    },
                    success: function (response) {
                        var data = $.parseJSON(response);
                        $this.closest('#section-' + section_code).replaceWith(data.html);
                    }.bind(this)
                }).done(function () {
                    this.add_section_btn = 'enable';
                    this.toggleSectionAddBtn();
                }.bind(this));

            }


            this.add_section_btn = 'enable';
            this.toggleSectionAddBtn();
        },
        // Load section update form
        loadSectionUpdateForm: function (event) {

            var $this = $(event.currentTarget);
            var section_code = $this.attr('attr-section');

            $.ajax({
                    method: 'POST',
                    url: this.js_config._host + '/admin/event/section/' + section_code + '/edit',
                    data: {
                        _token: $('meta[name=csrf-token]').attr("content"),
                        section_code: section_code
                    },
                    success: function (response) {
                        var data = $.parseJSON(response);
                        $this.closest('#section-' + section_code).html(data.html);

                    }.bind(this)
                }).done(function () {
                    var selector = $('#section-' + section_code).find('.event-add-section-add-form');
                    this.scrollToDefinedDiv(selector, $('#section-' + section_code));
                    this.add_ticket_btn = 'enable';
                    this.initTextEditor();
                }.bind(this));
        },
        // update section data and list the updated section
        updateSection: function (event) {

            //event.preventDefault();
            var $this = $(event.currentTarget);
            var section_code = $this.attr('attr-section');
            var $formWrapper = this.$section_wrapper.find('#section-update-form-' + section_code);

            this.initJqueryFormValidation();

            if (this.validateTicketSection($formWrapper.closest('form'))) {

                var data = {
                    _token: $('meta[name=csrf-token]').attr("content"),
                    promoter_code: this.js_config._promoter_code,
                    section_code: section_code,
                    section_name: $formWrapper.find('input[name="section_name"]').val(),
                    total_ticket: $formWrapper.find('input[name="total_tickets"]').val(),
                    max_ticket_per_order: $formWrapper.find('input[name="max_ticket_per_order"]').val(),
                    section_description: this.tinymce.get('section_description_' + section_code).getContent(),
                };

                $.ajax({
                    method: 'POST',
                    url: $formWrapper.attr('attr-action'),
                    data: data,
                    success: function (response) {
                        var data = $.parseJSON(response);
                        $this.closest('#section-' + section_code).replaceWith(data.html);
                    }.bind(this)
                }).done(function () {
                    this.add_section_btn = 'enable';
                    this.toggleSectionAddBtn();
                }.bind(this));
            } else {
                console.log('Validation error...')
            }

        },
        // update section status " Publish / Disable "
        updateSectionStatus: function (event) {

            //event.preventDefault();
            var $this = $(event.currentTarget);
            var section_code = $this.attr('attr-section');
            var data = {
                _token: $('meta[name=csrf-token]').attr("content"),
                section_code: section_code,
            };

            $.ajax({
                method: 'POST',
                url: this.js_config._host + '/admin/event/section/change-status',
                data: data,
                success: function (response) {
                    var data = $.parseJSON(response);
                    if (!data.error) {

                        // change btn color
                        $this.removeClass('btn-primary').removeClass('btn-danger');
                        if (data.section_status == 1)
                            $this.addClass('btn-danger');
                        else
                            $this.addClass('btn-primary');

                        // change tooltip text
                        if (data.section_status == 1)
                            $this.attr('data-original-title', 'Published');
                        else
                            $this.attr('data-original-title', 'Disabled');

                        // change btn icon
                        var i = $this.find('i');
                        i.removeClass('fa-globe').removeClass('fa-ban');
                        if (data.section_status == 1)
                            i.addClass('fa-ban');
                        else
                            i.addClass('fa-globe');

                        // change btn text
                        var s = $this.find('span');
                        if (data.section_status == 1)
                            s.text('Disable');
                        else
                            s.text('Publish');
                    }
                }
            });

        },
        // Load new Ticket create form
        loadTicketCreateForm: function (event) {

            //event.preventDefault();

            var $this = $(event.currentTarget);
            var section_code = $this.attr('attr-section');

            if (!this.valueExistInArray(section_code, this.used_sections)) {

                var $formWrapper = this.$section_wrapper.find('#ticket-wrapper-' + section_code);

                $.ajax({
                    method: 'POST',
                    url: this.js_config._host + '/admin/event/ticket/create',
                    data: {
                        _token: $('meta[name=csrf-token]').attr("content"),
                        section_code: section_code
                    },
                    success: function (response) {
                        var data = $.parseJSON(response);
                        $formWrapper.append(data.html);

                    }.bind(this)
                }).done(function () {
                    var selector = $('#section-' + section_code).find('#ticket-add-form-' + section_code);
                    this.scrollToDefinedDiv(selector, $('#section-' + section_code));
                    this.used_sections.push(section_code);
                    this.toggleTicketAddBtn($this, section_code);
                    this.initTextEditor();
                    this.initTicketQuantity();
                }.bind(this));

            }
        },
        // Remove Ticket Form
        removeTicketForm: function (event) {

            var $this = $(event.currentTarget);
            var section_code = $this.attr('attr-section');
            var ticket_code = $this.attr('attr-ticket');

            if ($this.attr('attr-request-for') == 'add') {

                var $formWrapper = this.$section_wrapper.find('#ticket-add-form-' + section_code);
                this.used_sections.splice($.inArray(section_code, this.used_sections), 1);
                this.toggleTicketAddBtn($this.closest('#section-' + section_code).find('.btn-ticket-add'), section_code);
                $formWrapper.remove();

            } else if ($this.attr('attr-request-for') == 'update') {

                $.ajax({
                    method: 'POST',
                    url: this.js_config._host + '/admin/event/ticket/' + ticket_code,
                    data: {
                        _token: $('meta[name=csrf-token]').attr("content"),
                        promoter_code: this.js_config._promoter_code,
                        section_code: section_code,
                        ticket_code: ticket_code,
                    },
                    success: function (response) {
                        var data = $.parseJSON(response);
                        $this.closest('#ticket-' + ticket_code).replaceWith(data.html);
                    }.bind(this)
                }).done(function () {
                    this.add_section_btn = 'enable';
                    this.toggleSectionAddBtn();
                }.bind(this));

            }


        },
        // save ticket data and list the added section
        storeNewTicket: function (event) {

            var $this = $(event.currentTarget);
            var section_code = $this.attr('attr-section');

            var $formWrapper = this.$section_wrapper.find('#ticket-add-form-' + section_code);


            this.initJqueryFormValidation();

            if (this.validateTicketSection($formWrapper.closest('form'))) {

                var data = {
                    _token: $('meta[name=csrf-token]').attr("content"),
                    promoter_code: this.js_config._promoter_code,
                    section_code: section_code,
                    ticket_name: $formWrapper.find('input[name="ticket_name"]').val(),
                    ticket_price: $formWrapper.find('input[name="ticket_price"]').val(),
                    ticket_quantity: $formWrapper.find('select[name="ticket_quantity"]').val(),
                    ticket_sales_start: $formWrapper.find('input[name="ticket_sales_start"]').val(),
                    ticket_sales_end: $formWrapper.find('input[name="ticket_sales_end"]').val(),
                    ticket_description: this.tinymce.get('ticket_description_' + section_code).getContent(),
                };

                $.ajax({
                    method: 'POST',
                    url: $formWrapper.attr('attr-action'),
                    data: data,
                    success: function (response) {
                        var data = $.parseJSON(response);
                        this.used_sections.splice($.inArray(section_code, this.used_sections), 1);
                        this.toggleTicketAddBtn($this.closest('#section-' + section_code).find('.btn-ticket-add'), section_code);
                        $formWrapper.replaceWith(data.html);

                    }.bind(this)
                });
            } else {
                console.log('Validation error...');
            }

        },
        // Load ticket update form
        loadTicketUpdateForm: function (event) {

            var $this = $(event.currentTarget);
            var section_code = $this.attr('attr-section');
            var ticket_code = $this.attr('attr-ticket');

            $.ajax({
                method: 'POST',
                url: this.js_config._host + '/admin/event/ticket/' + ticket_code + '/edit',
                data: {
                    _token: $('meta[name=csrf-token]').attr("content"),
                    section_code: section_code,
                    ticket_code: ticket_code,
                },
                success: function (response) {
                    var data = $.parseJSON(response);
                    $this.closest('#ticket-' + ticket_code).html(data.html);

                }.bind(this)
            }).done(function () {
                var selector = $('#section-' + section_code).find('#ticket-' + ticket_code);
                this.scrollToDefinedDiv(selector, $('#section-' + section_code));
                this.initTextEditor();
                this.initTicketQuantity();
            }.bind(this))

        },
        // update ticket data and list the updated ticket
        updateTicket: function (event) {

            var $this = $(event.currentTarget);
            var section_code = $this.attr('attr-section');
            var ticket_code = $this.attr('attr-ticket');
            var $formWrapper = this.$section_wrapper.find('#ticket-update-form-' + ticket_code);

            this.initJqueryFormValidation();

            if (this.validateTicketSection($formWrapper.closest('form'))) {

                var data = {
                    _token: $('meta[name=csrf-token]').attr("content"),
                    promoter_code: this.js_config._promoter_code,
                    section_code: section_code,
                    ticket_code: ticket_code,
                    ticket_name: $formWrapper.find('input[name="ticket_name"]').val(),
                    ticket_price: $formWrapper.find('input[name="ticket_price"]').val(),
                    ticket_quantity: $formWrapper.find('select[name="ticket_quantity"]').val(),
                    ticket_sales_start: $formWrapper.find('input[name="ticket_sales_start"]').val(),
                    ticket_sales_end: $formWrapper.find('input[name="ticket_sales_end"]').val(),
                    ticket_description: this.tinymce.get('ticket_description_' + section_code + '_' + ticket_code).getContent(),
                };

                $.ajax({
                    method: 'POST',
                    url: $formWrapper.attr('attr-action'),
                    data: data,
                    success: function (response) {
                        var data = $.parseJSON(response);
                        $this.closest('#ticket-' + ticket_code).replaceWith(data.html);


                        // change ticket quantity for all the open ticket edit form for current working section
                        this.$section_wrapper.find('#section-' + section_code).find('.ticket_quantity').each(function (index, qty_select) {

                            var $qty_select = $(qty_select);

                            if ($qty_select.attr('attr-form') == 'update') {

                                var section_code = $qty_select.attr('attr-section');
                                var ticket_code = $qty_select.attr('attr-ticket');

                                $.ajax({
                                    method: 'POST',
                                    url: this.js_config._host + '/admin/event/ticket/get-ticket-quantity',
                                    data: {
                                        _token: $('meta[name=csrf-token]').attr("content"),
                                        section_code: section_code,
                                        ticket_code: ticket_code,
                                    },
                                    success: function (response) {
                                        var data = $.parseJSON(response);
                                        if (!data.error) {

                                            var s2 = $qty_select.select2();
                                            s2.html(data.select_content);
                                            s2.trigger('change');
                                        }
                                    }
                                });
                            }

                        }.bind(this));


                    }.bind(this)
                }).done(function () {


                }.bind(this));
            } else {
                console.log('Validation Error...');
            }

        },
        // update ticket status " Enable / Disable "
        updateTicketStatus: function (event) {

            //event.preventDefault();
            var $this = $(event.currentTarget);
            var ticket_code = $this.attr('attr-ticket');
            var data = {
                _token: $('meta[name=csrf-token]').attr("content"),
                ticket_code: ticket_code,
            };

            $.ajax({
                method: 'POST',
                url: this.js_config._host + '/admin/event/ticket/change-status',
                data: data,
                success: function (response) {
                    var data = $.parseJSON(response);
                    if (!data.error) {

                        // change btn color
                        $this.removeClass('btn-primary').removeClass('btn-danger');
                        if (data.ticket_status == 1)
                            $this.addClass('btn-danger');
                        else
                            $this.addClass('btn-primary');

                        // change tooltip text
                        if (data.ticket_status == 1)
                            $this.attr('data-original-title', 'Published');
                        else
                            $this.attr('data-original-title', 'Disabled');

                        // change btn icon
                        var i = $this.find('i');
                        i.removeClass('fa-globe').removeClass('fa-ban');
                        if (data.ticket_status == 1)
                            i.addClass('fa-ban');
                        else
                            i.addClass('fa-globe');

                        // change btn text
                        var s = $this.find('span');
                        if (data.ticket_status == 1)
                            s.text('Disable');
                        else
                            s.text('Publish');
                    }
                }
            });

        },
        // Load ticket quantity
        initTicketQuantity: function () {
            $(".ticket_quantity").select2();
        },
        // Show/Hide ticket description
        toggleTicketDescription: function (event) {

            $this = $(event.currentTarget);
            var $desc_section = $this.closest('div[attr-section]').find('.ticket_description_wrapper');

            if ($desc_section.css('display') == 'none') {

                $this.html('show less');
                $desc_section.show();

            } else {

                $this.html('show more');
                $desc_section.hide();

            }

        },
        // Enable/Disable ticket add button
        toggleTicketAddBtn: function ($addBtn, section_code) {

            if (!this.valueExistInArray(section_code, this.used_sections))
                $addBtn.removeClass('btn-default').addClass('btn-info');
            else
                $addBtn.removeClass('btn-info').addClass('btn-default');

        },
        // initialize tinymce editor
        initTextEditor: function () {
            this.tinymce.remove();
            this.tinymce.init(this.getTextEditorConfig());
        },
        // setting for loading editor
        getTextEditorConfig: function () {

            /* Load Library Externally: //cdn.tinymce.com/4/tinymce.min.js */
            var editor_config = {
                path_absolute: "/",
                selector: ".textEditor",
                /*mode : "textareas",*/
                height: 250,
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table contextmenu directionality",
                    "emoticons template paste textcolor colorpicker textpattern"
                ],
                toolbar: "insertfile undo redo |  bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link image media",
                relative_urls: false,
                file_browser_callback: function (field_name, url, type, win) {
                    var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                    var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

                    var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                    if (type == 'image') {
                        cmsURL = cmsURL + "&type=Images";
                    } else {
                        cmsURL = cmsURL + "&type=Files";
                    }

                    tinyMCE.activeEditor.windowManager.open({
                        file: cmsURL,
                        title: 'Filemanager',
                        width: x * 0.8,
                        height: y * 0.8,
                        resizable: "yes",
                        close_previous: "no"
                    });
                }
            };


            return editor_config;

        },
        // check if given data exist in array
        valueExistInArray: function (key, array) {
            return $.inArray(key, array) >= 0;
        },

    };

    ticket.init();


})({'tinymce' : tinymce, 'js_config' : js_config, 'js_data' : js_data})
