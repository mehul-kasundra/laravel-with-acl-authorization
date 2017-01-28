(function (options) {

    var list = {

        select2: options.select2,

        init: function () {
            this.cacheDom();
            this.bindEvents();
        },
        cacheDom: function () {
            this.$body = $('body');
            this.$list_wrapper = $('#event-list-wrapper');
            if ($('#ssa-event-create-btn').length !== 0) {
                this.$add_btn = $('#ssa-event-create-btn');
            }
        },
        bindEvents: function () {

            if ("$add_btn" in this) {
                this.$add_btn.on("click", this.loadPromoterSelectorPopUp.bind(this));
            }

            this.$body.delegate("#promoter_select_submit_btn", "click", this.redirectToStep1.bind(this));
        },
        // opens a popup with option to select promoter
        loadPromoterSelectorPopUp: function (event) {

            var $this = $(event.currentTarget);
            var url = $this.attr('attr-url');
            var model = $('#myModal');
            $('#myModal').modal();
            $.get(url, function(data){
                model.find('.modal-content').html(data);
            }).done(function () {

                model.removeAttr('tabindex');
                this.initSelect2(model);

            }.bind(this));
            
        },
        // initialize select2 drop down
        initSelect2: function (model) {

            var promoter_select = model.find('.modal-content').find('select[name="search_promoter"]');
            var url = promoter_select.attr('attr-url');

            var select2 =promoter_select.select2({
                placeholder: {
                    id: '-1', // the value of the option
                    text: 'Search For ...'
                },
                minimumInputLength: 3,
                ajax: {
                    type: 'post',
                    url: url,
                    dataType: 'json',
                    cache: false,
                    delay: 250,
                    data: function (params) {

                        var queryParameters = {
                            text: params.term,
                            _token:$('meta[name=csrf-token]').attr("content")
                        }
                        return queryParameters;
                    },
                    processResults: function (data) {
                        var datos = $.map(data.results, function (obj) {
                            return obj;
                        });
                        return {
                            results: datos
                        };
                    }
                },
                templateResult: this.formatResult,
                templateSelection: this.formatResultSelection,
            });

            model.on('shown.bs.modal', function () {
                select2.select2("open");
            });

        },
        // select2: html template to list out searched promoters
        formatResult: function (data) {
            var image_url = '<img src="' + data.image + '" alt="' + data.image + '" class="img-circle" width="50">';
            var $data = $(
                '<div class="media">'+
                '<div class="media-left media-middle hidden-sm-down">' +
                image_url +
                '</div>'+
                '<div class="media-body media-middle">' +
                '<h6 class="card-title m-b-0"><a>' + data.name + '</a></h6>' +
                '<small><span class="text-muted">' + data.email + '</span></small>' +
                '</div>' +
                '</div>'
            );
            return $data;
        },
        // select2: Select which data to be set to drop down
        formatResultSelection: function (data) {
            return data.name || data.email;
        },
        // redirect to step-1 with promoter code
        redirectToStep1: function (event) {
            var $this = $(event.currentTarget);
            var wrapper = $this.closest('div[id="promoter_select_wrapper"]');
            var select = this.$body.find('select[name="search_promoter"]');
            location.href = wrapper.attr('attr-redirect-url') + '?for=' + select.val() + '&request-for=add';
        }

    };

    list.init();


})({'select2': $.fn.select2})
