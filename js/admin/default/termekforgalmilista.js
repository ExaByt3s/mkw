$(document).ready(function() {
    var dialogcenter=$('#dialogcenter');

    $('#mattkarb').mattkarb({
        independent:true,
        viewUrl:'/admin/getkarb',
        newWindowUrl:'/admin/viewkarb',
        saveUrl:'/admin/save',
        beforeShow:function() {
            mkwcomp.datumEdit.init('#TolEdit');
            mkwcomp.datumEdit.init('#IgEdit');
            mkwcomp.termekfaFilter.init('#termekfa');
            $('.js-refresh')
                .on('click', function() {

                    var fak, fafilter, partnercimkefilter;
                    fak = mkwcomp.termekfaFilter.getFilter('#termekfa');
                    if (fak.length > 0) {
                        fafilter = fak;
                    }

                    partnercimkefilter = mkwcomp.partnercimkeFilter.getFilter('.js-cimkefilter');

                    $.ajax({
                        url: '/admin/termekforgalmilista/refresh',
                        type: 'GET',
                        data: {
                            datumtipus: $('select[name="datumtipus"] option:selected').val(),
                            tol: $('input[name="tol"]').val(),
                            ig: $('input[name="ig"]').val(),
                            raktar: $('select[name="raktar"] option:selected').val(),
                            gyarto: $('select[name="gyarto"] option:selected').val(),
                            partner: $('select[name="partner"] option:selected').val(),
                            keszletfilter: $('select[name="keszletfilter"] option:selected').val(),
                            forgalomfilter: $('select[name="forgalomfilter"] option:selected').val(),
                            ertektipus: $('select[name="ertektipus"] option:selected').val(),
                            arsav: $('select[name="arsav"] option:selected').val(),
                            nevfilter: $('input[name="nevfilter"]').val(),
                            nyelv: $('select[name="nyelv"] option:selected').val(),
                            fafilter: fafilter,
                            partnercimkefilter: partnercimkefilter
                        },
                        success: function(d) {
                            $('#eredmeny').html(d);
                        }
                    })
                })
                .button();
            $('.js-exportbutton').on('click', function(e) {
                var fak, fafilter, $ff, partnercimkefilter;
                e.preventDefault();

                fak = mkwcomp.termekfaFilter.getFilter('#termekfa');
                if (fak.length > 0) {
                    fafilter = fak;
                }
                $('#FaFilter').val(fafilter);

                partnercimkefilter = mkwcomp.partnercimkeFilter.getFilter('.js-cimkefilter');
                $('#PartnerCimkeFilter').val(partnercimkefilter);

                $ff = $('#termekforgalmi');
                $ff.attr('action', $(this).attr('href'));
                $ff.submit();
            }).button();
            $('#cimkefiltercontainer').mattaccord({
                header: '',
                page: '.js-cimkefilterpage',
                closeUp: '.js-cimkefiltercloseupbutton'
            });
            $('.js-cimkefilter').on('click', function(e) {
                e.preventDefault();
                $(this).toggleClass('ui-state-hover');
            });
        },
        onSubmit:function() {
            $('#messagecenter')
                .html('A mentés sikerült.')
                .hide()
                .addClass('matt-messagecenter ui-widget ui-state-highlight')
                .one('click',messagecenterclick)
                .slideToggle('slow');
        }
    });
});