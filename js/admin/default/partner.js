function irszamAutocomplete(irszam,varos) {
	$(irszam).autocomplete({
		minLength: 2,
		source: function(req,resp) {
			$.ajax({
				url: '/admin/irszam',
				type: 'GET',
				data: {
					term: req.term,
					tip: 1
				},
				success: function(data) {
					var d=JSON.parse(data);
					resp(d);
				},
				error: function() {
					resp();
				}
			});
		},
		select: function(event,ui) {
			$(varos).val(ui.item.nev);
		}
	});
}

function varosAutocomplete(irszam,varos) {
	$(varos).autocomplete({
		minLength: 4,
		source: function(req,resp) {
			$.ajax({
				url: '/admin/varos',
				type: 'GET',
				data: {
					term: req.term,
					tip: 1
				},
				success: function(data) {
					var d=JSON.parse(data);
					resp(d);
				},
				error: function() {
					resp();
				}
			});
		},
		select: function(event,ui) {
			$(irszam).val(ui.item.szam);
		}
	});
}

function termekAutocompleteRenderer(ul, item) {
    if (item.nemlathato) {
        return $('<li>')
            .append('<a class="nemelerhetovaltozat">' + item.label + '</a>')
            .appendTo( ul );
    }
    else {
        return $('<li>')
            .append('<a>' + item.label + '</a>')
            .appendTo( ul );
    }
}

function termekAutocompleteConfig() {
    return {
        minLength: 4,
        autoFocus: true,
        source: '/admin/bizonylattetel/gettermeklist',
        select: function(event, ui) {
            var termek = ui.item;
            if (termek) {
                var $this = $(this),
                    sorid = $this.attr('name').split('_')[1];
                $this.siblings().val(termek.id);
            }
        }
    };
}


$(document).ready(function(){
	var dialogcenter = $('#dialogcenter');
	var partner={
			container:'#mattkarb',
			viewUrl:'/admin/partner/getkarb',
			newWindowUrl:'/admin/partner/viewkarb',
			saveUrl:'/admin/partner/save',
			beforeShow:function() {
				var szuletesiidoedit=$('#SzuletesiidoEdit'),
                    termekcsoportkedvezmenytab = $('#KedvezmenyTab'),
                    termekkedvezmenytab = $('#TermekKedvezmenyTab'),
                    doktab = $('#DokTab'),
                    mijszokleveltab = $('#MIJSZOklevelTab');

                szuletesiidoedit.datepicker($.datepicker.regional['hu']);
                szuletesiidoedit.datepicker('option','dateFormat','yy.mm.dd');
                szuletesiidoedit.datepicker('setDate',szuletesiidoedit.attr('data-datum'));

                $('#EmailEdit').on('change', function(e) {
                    $('.js-email').text($(this).val());
                });
				$('#cimkekarbcontainer').mattaccord({
					header:'',
					page:'.js-cimkekarbpage',
					closeUp:'.js-cimkekarbcloseupbutton'
				})
				.on('click','.js-cimkekarb',function(e) {
					e.preventDefault();
					$(this).toggleClass('js-selectedcimke ui-state-hover');
				});
				$('.js-cimkeadd').on('click',function(e) {
					e.preventDefault();
					var ref=$(this).attr('data-refcontrol');
					var cimkenev=$(ref).val(),
						katkod=ref.split('_')[1];
					if (cimkenev.length>0) {
						$.ajax({
							url:'/admin/partnercimke/add',
							type:'POST',
							data:{
								cimkecsoport:katkod,
								nev:cimkenev
							},
							success:function(data) {
								$(ref).val('');
								$(ref).before(data);
							}
						});
					}
				});
                doktab
                    .on('click', '.js-doknewbutton', function (e) {
                        var $this = $(this);
                        e.preventDefault();
                        $.ajax({
                            url: '/admin/rendezvenydok/getemptyrow',
                            type: 'GET',
                            success: function (data) {
                                doktab.append(data);
                                $('.js-doknewbutton,.js-dokdelbutton,.js-dokbrowsebutton,.js-dokopenbutton').button();
                                $this.remove();
                            }
                        });
                    })
                    .on('click', '.js-dokdelbutton', function (e) {
                        e.preventDefault();
                        var $this = $(this);
                        dialogcenter.html('Biztos, hogy törli a dokumentumot?').dialog({
                            resizable: false,
                            height: 140,
                            modal: true,
                            buttons: {
                                'Igen': function () {
                                    $.ajax({
                                        url: '/admin/rendezvenydok/del',
                                        type: 'POST',
                                        data: {
                                            id: $this.attr('data-id')
                                        },
                                        success: function (data) {
                                            $('#doktable_' + data).remove();
                                        }
                                    });
                                    $(this).dialog('close');
                                },
                                'Nem': function () {
                                    $(this).dialog('close');
                                }
                            }
                        });
                    })
                    .on('click', '.js-dokbrowsebutton', function (e) {
                        e.preventDefault();
                        var finder = new CKFinder(),
                            $dokpathedit = $('#DokPathEdit_' + $(this).attr('data-id')),
                            path = $dokpathedit.val();
                        finder.resourceType = 'Images';
                        if (path) {
                            finder.startupPath = path.substring(path.indexOf('/', 1));
                        }
                        finder.selectActionFunction = function (fileUrl, data) {
                            $dokpathedit.val(fileUrl);
                        };
                        finder.popup();
                    });
                $('.js-doknewbutton,.js-dokbrowsebutton,.js-dokdelbutton,.js-dokopenbutton').button();
				termekcsoportkedvezmenytab.on('click', '.js-termekcsoportkedvezmenynewbutton', function(e) {
					var $this = $(this);
					e.preventDefault();
					$.ajax({
						url: '/admin/partnertermekcsoportkedvezmeny/getemptyrow',
						type: 'GET',
						success: function(data) {
							var tbody = $('#KedvezmenyTab');
							tbody.append(data);
							$('.js-termekcsoportkedvezmenynewbutton,.js-termekcsoportkedvezmenydelbutton').button();
							$this.remove();
						}
					});
				})
					.on('click', '.js-termekcsoportkedvezmenydelbutton', function(e) {
						e.preventDefault();
						var argomb = $(this),
							arid = argomb.attr('data-id');
						if (argomb.attr('data-source') === 'client') {
							$('#kedvezmenytable_' + arid).remove();
						}
						else {
							dialogcenter.html('Biztos, hogy törli a kedvezményt?').dialog({
								resizable: false,
								height: 140,
								modal: true,
								buttons: {
									'Igen': function() {
										$.ajax({
											url: '/admin/partnertermekcsoportkedvezmeny/save',
											type: 'POST',
											data: {
												id: arid,
												oper: 'del'
											},
											success: function(data) {
												$('#kedvezmenytable_' + data).remove();
											}
										});
										$(this).dialog('close');
									},
									'Nem': function() {
										$(this).dialog('close');
									}
								}
							});
						}
					});
				$('.js-termekcsoportkedvezmenynewbutton, .js-termekcsoportkedvezmenydelbutton').button();
                termekkedvezmenytab.on('click', '.js-termekkedvezmenynewbutton', function(e) {
                    var $this = $(this);
                    e.preventDefault();
                    $.ajax({
                        url: '/admin/partnertermekkedvezmeny/getemptyrow',
                        type: 'GET',
                        success: function(data) {
                            var tbody = $('#TermekKedvezmenyTab');
                            tbody.append(data);
                            $('.js-termekkedvezmenynewbutton,.js-termekkedvezmenydelbutton').button();
                            $('.js-termekkedvezmenytermekselect').autocomplete(termekAutocompleteConfig())
                                .autocomplete( "instance" )._renderItem = termekAutocompleteRenderer;
                            $this.remove();
                        }
                    });
                })
                    .on('click', '.js-termekkedvezmenydelbutton', function(e) {
                        e.preventDefault();
                        var argomb = $(this),
                            arid = argomb.attr('data-id');
                        if (argomb.attr('data-source') === 'client') {
                            $('#termekkedvezmenytable_' + arid).remove();
                        }
                        else {
                            dialogcenter.html('Biztos, hogy törli a kedvezményt?').dialog({
                                resizable: false,
                                height: 140,
                                modal: true,
                                buttons: {
                                    'Igen': function() {
                                        $.ajax({
                                            url: '/admin/partnertermekkedvezmeny/save',
                                            type: 'POST',
                                            data: {
                                                id: arid,
                                                oper: 'del'
                                            },
                                            success: function(data) {
                                                $('#termekkedvezmenytable_' + data).remove();
                                            }
                                        });
                                        $(this).dialog('close');
                                    },
                                    'Nem': function() {
                                        $(this).dialog('close');
                                    }
                                }
                            });
                        }
                    });
                $('.js-termekkedvezmenynewbutton, .js-termekkedvezmenydelbutton').button();
                $('.js-termekkedvezmenytermekselect').autocomplete(termekAutocompleteConfig())
                    .autocomplete( "instance" )._renderItem = termekAutocompleteRenderer;

                mijszokleveltab.on('click', '.js-mijszoklevelnewbutton', function(e) {
                        var $this = $(this);
                        e.preventDefault();
                        $.ajax({
                            url: '/admin/partnermijszoklevel/getemptyrow',
                            type: 'GET',
                            success: function(data) {
                                var tbody = $('#MIJSZOklevelTab');
                                tbody.append(data);
                                $('.js-mijszoklevelnewbutton,.js-mijszokleveldelbutton').button();
                                $this.remove();
                            }
                        });
                    })
                    .on('click', '.js-mijszokleveldelbutton', function(e) {
                        e.preventDefault();
                        var argomb = $(this),
                            arid = argomb.attr('data-id');
                        if (argomb.attr('data-source') === 'client') {
                            $('#mijszokleveltable_' + arid).remove();
                        }
                        else {
                            dialogcenter.html('Biztos, hogy törli az oklevelet?').dialog({
                                resizable: false,
                                height: 140,
                                modal: true,
                                buttons: {
                                    'Igen': function() {
                                        $.ajax({
                                            url: '/admin/partnermijszoklevel/save',
                                            type: 'POST',
                                            data: {
                                                id: arid,
                                                oper: 'del'
                                            },
                                            success: function(data) {
                                                $('#mijszokleveltable_' + data).remove();
                                            }
                                        });
                                        $(this).dialog('close');
                                    },
                                    'Nem': function() {
                                        $(this).dialog('close');
                                    }
                                }
                            });
                        }
                    });
                $('.js-mijszoklevelnewbutton,.js-mijszokleveldelbutton').button();

				irszamAutocomplete('#IrszamEdit','#VarosEdit');
				varosAutocomplete('#IrszamEdit','#VarosEdit');
				irszamAutocomplete('#SzamlaIrszamEdit','#SzamlaVarosEdit');
				varosAutocomplete('#SzamlaIrszamEdit','#SzamlaVarosEdit');
				irszamAutocomplete('#SzallIrszamEdit','#SzallVarosEdit');
				varosAutocomplete('#SzallIrszamEdit','#SzallVarosEdit');
			},
			beforeSerialize:function(form,opt) {
				var cimkek = [],
                    j1 = $('#Jelszo1Edit').val(),
                    j2 = $('#Jelszo2Edit').val();
				$('.js-cimkekarb').filter('.js-selectedcimke').each(function() {
					cimkek.push($(this).attr('data-id'));
				});
				var x={};
				x['cimkek[]']=cimkek;
				opt['data']=x;
                if ((j1 || j2) && j1 !== j2) {
					dialogcenter.html('A két jelszó nem egyezik meg!').dialog({
						resizable: false,
						height: 140,
						modal: true,
						buttons: {
							'Ok': function() {
								$(this).dialog('close');
							}
						}
					});
                    return false;
                }
			},
			onSubmit:function() {
				$('#messagecenter')
					.html('A mentés sikerült.')
					.hide()
					.addClass('matt-messagecenter ui-widget ui-state-highlight')
					.one('click',messagecenterclick)
					.slideToggle('slow');
				//setTimeout('$("#messagecenter").unbind(messagecenterclick).slideToggle("slow");',5000);
			}
		};

	if ($.fn.mattable) {
		$('#mattable-select').mattable({
			name:'partner',
			filter:{
				fields:[
                    '#nevfilter',
                    '#emailfilter',
                    '#szallitasiirszamfilter',
                    '#szallitasivarosfilter',
                    '#szallitasiutcafilter',
                    '#szamlazasiirszamfilter',
                    '#szamlazasivarosfilter',
                    '#szamlazasiutcafilter',
                    '#beszallitofilter',
                    '#partnertipusfilter',
                    '#orszagfilter'
                ],
				onClear:function() {
					$('.js-cimkefilter').removeClass('ui-state-hover');
				},
				onFilter:function(obj) {
					var cimkek=new Array();
					$('.js-cimkefilter').filter('.ui-state-hover').each(function() {
						cimkek.push($(this).attr('data-id'));
					});
					if (cimkek.length>0) {
						obj['cimkefilter']=cimkek;
					}
				}
			},
			tablebody:{
				url:'/admin/partner/getlistbody',
                onStyle: function() {
                    $('.js-anonym').button();
                },
                onDoEditLink: function() {
                    $('#mattable-table').on('.js-anonym', 'click', function(e) {
                        var $this = $(this);
                        e.preventDefault();
                        dialogcenter.html('Biztos, hogy anonymizálja a partnert?').dialog({
                            resizable: false,
                            height: 140,
                            modal: true,
                            buttons: {
                                'Igen': function() {
                                    $.ajax({
                                        url: '/admin/partner/anonym/check',
                                        type: 'POST',
                                        data: {
                                            id: $this.data('partnerid')
                                        },
                                        success: function(data) {
                                            $('#mijszokleveltable_' + data).remove();
                                        }
                                    });
                                    $(this).dialog('close');
                                },
                                'Nem': function() {
                                    $(this).dialog('close');
                                }
                            }
                        });
                    });

                }
			},
			karb:partner
		});
        $('.mattable-batchbtn').on('click', function(e) {
            var cbs;
            e.preventDefault();
            switch ($('.mattable-batchselect').val()) {
                case 'mijszexportin':
                    cbs = $('.js-egyedcheckbox:checked');
                    if (cbs.length) {
                        var tomb = [],
                            $exportform = $('#exportform');
                        cbs.closest('tr').each(function(index, elem) {
                            tomb.push($(elem).data('egyedid'));
                        });
                        $exportform.attr('action', '/admin/partner/mijszexport');
                        $('input[name="ids"]', $exportform).val(tomb);
                        $('input[name="country"]', $exportform).val('in');
                        $exportform.submit();
                    }
                    else {
                        dialogcenter.html('Válasszon ki legalább egy partnert!').dialog({
                            resizable: false,
                            height: 140,
                            modal: true,
                            buttons: {
                                'OK': function() {
                                    $(this).dialog('close');
                                }
                            }
                        });
                    }
                    break;
                case 'mijszexportus':
                    cbs = $('.js-egyedcheckbox:checked');
                    if (cbs.length) {
                        var tomb = [],
                            $exportform = $('#exportform');
                        cbs.closest('tr').each(function(index, elem) {
                            tomb.push($(elem).data('egyedid'));
                        });
                        $exportform.attr('action', '/admin/partner/mijszexport');
                        $('input[name="ids"]', $exportform).val(tomb);
                        $('input[name="country"]', $exportform).val('us');
                        $exportform.submit();
                    }
                    else {
                        dialogcenter.html('Válasszon ki legalább egy partnert!').dialog({
                            resizable: false,
                            height: 140,
                            modal: true,
                            buttons: {
                                'OK': function() {
                                    $(this).dialog('close');
                                }
                            }
                        });
                    }
                    break;
                case 'megjegyzesexport':
                    cbs = $('.js-egyedcheckbox:checked');
                    if (cbs.length) {
                        var tomb = [],
                            $exportform = $('#exportform');
                        cbs.closest('tr').each(function(index, elem) {
                            tomb.push($(elem).data('egyedid'));
                        });
                        $exportform.attr('action', '/admin/partner/megjegyzesexport');
                        $('input[name="ids"]', $exportform).val(tomb);
                        $exportform.submit();
                    }
                    else {
                        dialogcenter.html('Válasszon ki legalább egy partnert!').dialog({
                            resizable: false,
                            height: 140,
                            modal: true,
                            buttons: {
                                'OK': function() {
                                    $(this).dialog('close');
                                }
                            }
                        });
                    }
                    break;
                case 'roadrecordexport':
                    var tomb = [],
                        $exportform = $('#exportform');
                    cbs = $('.js-egyedcheckbox:checked');
                    if (cbs.length) {
                        cbs.closest('tr').each(function (index, elem) {
                            tomb.push($(elem).data('egyedid'));
                        });
                    }
                    $exportform.attr('action', '/admin/partner/roadrecordexport');
                    if (tomb) {
                        $('input[name="ids"]', $exportform).val(tomb);
                    }
                    $exportform.submit();
                    break;
            }
        });
        $('#mattable-body').on('click', '.js-anonym', function(e) {
            var $this = $(this);
            e.preventDefault();
            dialogcenter.html('Biztos, hogy anonymizálja a partnert? A folyamat NEM fordítható vissza.').dialog({
                resizable: false,
                height: 140,
                modal: true,
                buttons: {
                    'Igen': function() {
                        $.ajax({
                            url: '/admin/partner/anonym/do',
                            type: 'POST',
                            data: {
                                id: $this.data('partnerid')
                            },
                            success: function(data) {
                                dialogcenter.html('Az anonymizálás kész.').dialog({
                                    resizable: false,
                                    height: 140,
                                    modal: true,
                                    buttons: {
                                        'OK': function () {
                                            $(this).dialog('close');
                                        }
                                    }
                                });
                            }
                        });
                        $(this).dialog('close');
                    },
                    'Nem': function() {
                        $(this).dialog('close');
                    }
                }
            });
        });
        $('#cimkefiltercontainer').mattaccord({
            header: '#cimkefiltercontainerhead',
            page: '.accordpage',
            closeUp: '.js-cimkefiltercloseupbutton',
            collapse: '#cimkefiltercollapse'
        });
        $('.js-cimkefilter').on('click', function(e) {
            e.preventDefault();
            $(this).toggleClass('ui-state-hover');
        });
		$('.js-maincheckbox').change(function(){
			$('.js-egyedcheckbox').prop('checked',$(this).prop('checked'));
		});
	}
	else {
		if ($.fn.mattkarb) {
			$('#mattkarb').mattkarb($.extend({},partner,{independent:true}));
		}
	}
});