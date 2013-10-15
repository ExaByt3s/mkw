$(document).ready(function(){
	var dialogcenter=$('#dialogcenter');

	function createImageSelectable(n,m) {
		$(n).selectable({
			unselected: function(){
				$('.ui-state-highlight', this).removeClass('ui-state-highlight');
			},
			selected: function(){
				$('.ui-selected', this).each(function(){
					var $this=$(this);
					$this.addClass('ui-state-highlight');
					$(m+$this.attr('data-valtozatid')).val($this.attr('data-value'));
				});
			}
		});
	}

	function getSorNetto(o,n) {
		var id=$('#mattkarb-form').attr('data-id');
		var sorid=o.attr('name').split('_')[1]||'';
		$.ajax({
			url:'/admin/termek/getnetto',
			type:'GET',
			data:{
				id:id,
				value:o.val(),
				afakod:$('#AfaEdit').val()
			},
			success:function(data) {
				$('input[name="'+n+sorid+'"]').val(data);
			}
		});
	}

	function getSorBrutto(o,n) {
		var id=$('#mattkarb-form').attr('data-id');
		var sorid=o.attr('name').split('_')[1]||'';
		$.ajax({
			url:'/admin/termek/getbrutto',
			type:'GET',
			data:{
				id:id,
				value:o.val(),
				afakod:$('#AfaEdit').val()
			},
			success:function(data) {
				$('input[name="'+n+sorid+'"]').val(data);
			}
		});
	}

	function getNetto(o,n) {
		var id=$('#mattkarb-form').attr('data-id');
		$.ajax({
			url:'/admin/termek/getnetto',
			type:'GET',
			data:{
				id:id,
				value:o.val(),
				afakod:$('#AfaEdit').val()
			},
			success:function(data) {
				$(n).val(data);
			}
		});
	}

	function getBrutto(o,n) {
		var id=$('#mattkarb-form').attr('data-id');
		$.ajax({
			url:'/admin/termek/getbrutto',
			type:'GET',
			data:{
				id:id,
				value:o.val(),
				afakod:$('#AfaEdit').val()
			},
			success:function(data) {
				$(n).val(data);
			}
		});
	}

	var termek={
			container:'#mattkarb',
			viewUrl:'/admin/termek/getkarb',
			newWindowUrl:'/admin/termek/viewkarb',
			saveUrl:'/admin/termek/save',
			beforeShow:function() {
				var keptab=$('#KepTab');
				var recepttab=$('#RecepturaTab');
				var kapcsolodotab=$('#KapcsolodoTab');
				var valtozattab=$('#ValtozatTab');
				var akciostartedit=$('#AkcioStartEdit'),
					akciostopedit=$('#AkcioStopEdit');
				keptab.on('click','#FoKepDelButton',function(e) {
					e.preventDefault();
					dialogcenter.html('Biztos, hogy törli a képet?').dialog({
						resizable: false,
						height:140,
						modal: true,
						buttons: {
							'Igen': function() {
								$('#KepUrlEdit').val('');
								$('#KepLeirasEdit').val('');
								$(this).dialog('close');
							},
							'Nem':function() {
								$(this).dialog('close');
							}
						}
					});
				})
				.on('click','#FoKepBrowseButton',function(e){
					e.preventDefault();
					var finder=new CKFinder(),
						$kepurl=$('#KepUrlEdit'),
						path=$kepurl.val();
					if (path) {
						finder.startupPath='Images:'+path.substring(path.indexOf('/',1));
					}
					finder.selectActionFunction = function( fileUrl, data ) {
						$kepurl.val(fileUrl);
					};
					finder.popup();
				})
				.on('click','.js-kepnewbutton',function(e) {
					var $this=$(this);
					e.preventDefault();
					$.ajax({
						url:'/admin/termekkep/getemptyrow',
						type:'GET',
						success:function(data) {
							keptab.append(data);
							$('.js-kepnewbutton,.js-kepdelbutton,.js-kepbrowsebutton').button();
							$this.remove();
						}
					});
				})
				.on('click','.js-kepdelbutton',function(e){
					e.preventDefault();
					var $this=$(this);
					dialogcenter.html('Biztos, hogy törli a képet?').dialog({
						resizable: false,
						height:140,
						modal: true,
						buttons: {
							'Igen': function() {
								$.ajax({
									url:'/admin/termekkep/del',
									type:'POST',
									data:{
										id:$this.attr('data-id')
									},
									success:function(data) {
										$('#keptable_'+data).remove();
									}
								});
								$(this).dialog('close');
							},
							'Nem':function() {
								$(this).dialog('close');
							}
						}
					});
				})
				.on('click','.js-kepbrowsebutton',function(e){
					e.preventDefault();
					var finder=new CKFinder(),
						$kepurledit=$('#KepUrlEdit_'+$(this).attr('data-id')),
						path=$kepurledit.val();
					if (path) {
						finder.startupPath='Images:'+path.substring(path.indexOf('/',1));
					}
					finder.selectActionFunction = function( fileUrl, data ) {
						$kepurledit.val(fileUrl);
					};
					finder.popup();
				});
				$('#FoKepDelButton,#FoKepBrowseButton,.js-kepnewbutton,.js-kepbrowsebutton,.js-kepdelbutton').button();
				if (!$.browser.mobile) {
					$('.js-toflyout').flyout();
				}
				$('#cimkekarbcontainer').mattaccord({
					header:'#cimkekarbcontainerhead',
					page:'.js-cimkekarbpage',
					closeUp:'.js-cimkekarbcloseupbutton',
					collapse:'#cimkekarbcollapse'
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
							url:'/admin/termekcimke/add',
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
				recepttab.on('click','.js-receptnewbutton',function(e) {
					var $this=$(this);
					e.preventDefault();
					$.ajax({
						url:'/admin/termekrecept/getemptyrow',
						type:'GET',
						success:function(data) {
							var tbody=$('#RecepturaTab');
							tbody.append(data);
							$('.js-receptnewbutton,.js-receptdelbutton').button();
							$this.remove();
						}
					});
				})
				.on('click','.js-receptdelbutton',function(e) {
					e.preventDefault();
					var receptgomb=$(this),
						receptid=receptgomb.attr('data-id');
					if (receptgomb.attr('data-source')==='client') {
						$('#recepttable_'+receptid).remove();
					}
					else {
						dialogcenter.html('Biztos, hogy törli az árat?').dialog({
							resizable: false,
							height:140,
							modal: true,
							buttons: {
								'Igen': function() {
									$.ajax({
										url:'/admin/termekrecept/save',
										type:'POST',
										data:{
											id:receptid,
											oper:'del'
										},
										success:function(data) {
											$('#recepttable_'+data).remove();
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
				$('.js-receptnewbutton,.js-receptdelbutton').button();
				kapcsolodotab.on('click','.js-kapcsolodonewbutton',function(e) {
					var $this=$(this);
					e.preventDefault();
					$.ajax({
						url:'/admin/termekkapcsolodo/getemptyrow',
						type:'GET',
						success:function(data) {
							var tbody=$('#KapcsolodoTab');
							tbody.append(data);
							$('.js-kapcsolodonewbutton,.js-kapcsolododelbutton').button();
							$this.remove();
						}
					});
				})
				.on('click','.js-kapcsolododelbutton',function(e) {
					e.preventDefault();
					var kapcsgomb=$(this),
						kapcsid=kapcsgomb.attr('data-id');
					if (kapcsgomb.attr('data-source')==='client') {
						$('#kapcsolodotable_'+kapcsid).remove();
					}
					else {
						dialogcenter.html('Biztos, hogy törli a kapcsolódó terméket?').dialog({
							resizable: false,
							height:140,
							modal: true,
							buttons: {
								'Igen': function() {
									$.ajax({
										url:'/admin/termekkapcsolodo/save',
										type:'POST',
										data:{
											id:kapcsid,
											oper:'del'
										},
										success:function(data) {
											$('#kapcsolodotable_'+data).remove();
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
				$('.js-kapcsolodonewbutton,.js-kapcsolododelbutton').button();
				valtozattab.on('click','.js-valtozatnewbutton',function(e) {
					var $this=$(this);
					e.preventDefault();
					$.ajax({
						url:'/admin/termekvaltozat/getemptyrow',
						type:'GET',
						data:{
							termekid:$this.attr('data-termekid')
						},
						success:function(data) {
							var tbody=$('#ValtozatTab');
							tbody.append(data);
							$('.js-valtozatnewbutton,.js-valtozatdelbutton').button();
							createImageSelectable('.js-valtozatkepedit','#ValtozatKepId_');
							$this.remove();
						}
					});
				})
				.on('click','.js-valtozatdelbutton',function(e) {
					e.preventDefault();
					var gomb=$(this),
						vid=gomb.attr('data-id');
					if (gomb.attr('data-source')==='client') {
						$('#valtozattable_'+vid).remove();
					}
					else {
						dialogcenter.html('Biztos, hogy törli a változatot?').dialog({
							resizable: false,
							height:140,
							modal: true,
							buttons: {
								'Igen': function() {
									$.ajax({
										url:'/admin/termekvaltozat/save',
										type:'POST',
										data:{
											id:vid,
											oper:'del'
										},
										success:function(data) {
											$('#valtozattable_'+data).remove();
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
				})
				.on('blur','.js-valtozatnetto',function(e) {
					e.preventDefault();
					getSorBrutto($(this),'valtozatbrutto_');
				})
				.on('blur','.js-valtozatbrutto',function(e) {
					e.preventDefault();
					getSorNetto($(this),'valtozatnetto_');
				})
				.on('blur','.js-valtozatnettogen',function(e) {
					e.preventDefault();
					getSorBrutto($(this),'valtozatbruttogen');
				})
				.on('blur','.js-valtozatbruttogen',function(e) {
					e.preventDefault();
					getSorNetto($(this),'valtozatnettogen');
				})
				.on('click','input[name^="valtozatelerheto_"]',function(e) {
					var $this=$(this);
					if (!$this.prop('checked')) {
						return !$('input[name="valtozatlathato_'+$this.attr('name').split('_')[1]+'"]').prop('checked');
					}
					return true;
				})
				.on('click','input[name^="valtozatlathato_"]',function(e) {
					var $this=$(this);
					if ($this.prop('checked')) {
						return $('input[name="valtozatelerheto_'+$this.attr('name').split('_')[1]+'"]').prop('checked');
					}
					return true;
				})
				.on('click','input[name="valtozatelerheto"]',function(e) {
					var $this=$(this);
					if (!$this.prop('checked')) {
						return !$('input[name="valtozatlathato"]').prop('checked');
					}
					return true;
				})
				.on('click','input[name="valtozatlathato"]',function(e) {
					var $this=$(this);
					if ($this.prop('checked')) {
						return $('input[name="valtozatelerheto"]').prop('checked');
					}
					return true;
				});
				$('#valtozatgeneratorform').ajaxForm({
					type:'POST',
					beforeSubmit:function(arr,form,opt) {
//						pleaseWait();
						arr.push({name:'termekid',value:form.data('id')});
					},
					success:function(data) {
						$('.valtozattable').remove();
						$('#valtozatgenerator').after(data);
						$('.js-valtozatdelbutton').button();
					}
				});
				$('.js-valtozatdelallbutton').button().on('click',function(e) {
					var $this=$(this);
					dialogcenter.html('Biztos, hogy törli az összes változatot?').dialog({
						resizable: false,
						height:140,
						modal: true,
						buttons: {
							'Igen': function() {
//								pleaseWait();
								$.ajax({
									url:'/admin/termekvaltozat/delall',
									type:'POST',
									data:{
										termekid:$this.data('termekid')
									},
									success:function() {
										$('.valtozattable').remove();
									}
								});
								$(this).dialog('close');
							},
							'Nem': function() {
								$(this).dialog('close');
							}
						}
					});
					return false;
				});
				createImageSelectable('.js-valtozatkepedit','#ValtozatKepId_');
				$('.js-valtozatnewbutton,.js-valtozatdelbutton,#valtozatgeneratorbutton').button();

				$('#NettoEdit').on('blur',function(e) {
					e.preventDefault();
					getBrutto($(this),'#BruttoEdit');
				});
				$('#BruttoEdit').on('blur',function(e) {
					e.preventDefault();
					getNetto($(this),'#NettoEdit');
				});
				$('#AkciosNettoEdit').on('blur',function(e) {
					e.preventDefault();
					getBrutto($(this),'#AkciosBruttoEdit');
				});
				$('#AkciosBruttoEdit').on('blur',function(e) {
					e.preventDefault();
					getNetto($(this),'#AkciosNettoEdit');
				});
				$('#NemkaphatoCheck').on('click',function(e) {
					var $this=$(this);
					if ($this.prop('checked')) {
						dialogcenter.html('Biztos, hogy nem kaphatóvá teszi a terméket? A változatok automatikusan nem elérhetők lesznek.').dialog({
							resizable: false,
							height:200,
							modal: true,
							buttons: {
								'Igen': function() {
									$('input[name^="valtozatelerheto_"]').prop('checked',false);
									$(this).dialog('close');
								},
								'Nem':function() {
									$this.prop('checked',false);
									$(this).dialog('close');
								}
							}
						});
					}
					else {
						dialogcenter.html('Ne felejtse el beállítani az elérhető változatokat!').dialog({
							resizable: false,
							height:200,
							modal: true,
							buttons: {
								'OK': function() {
									$(this).dialog('close');
								}
							}
						});
					}
				});
				akciostartedit.datepicker($.datepicker.regional['hu']);
				akciostartedit.datepicker('option','dateFormat','yy.mm.dd');
				akciostartedit.datepicker('setDate',akciostartedit.attr('data-datum'));
				akciostopedit.datepicker($.datepicker.regional['hu']);
				akciostopedit.datepicker('option','dateFormat','yy.mm.dd');
				akciostopedit.datepicker('setDate',akciostopedit.attr('data-datum'));

				$('.js-termekfabutton').on('click',function(e) {
					var edit=$(this);
					e.preventDefault();
					dialogcenter.jstree({
						core:{animation:100},
						plugins:['themeroller','json_data','ui'],
						themeroller:{item:''},
						json_data:{
							ajax:{url:'/admin/termekfa/jsonlist'}
						},
						ui:{select_limit:1}
					})
					.bind('loaded.jstree',function(event,data) {
						dialogcenter.jstree('open_node',$('#termekfa_1',dialogcenter).parent());
					});
					dialogcenter.dialog({
						resizable: true,
						height:340,
						modal: true,
						buttons: {
							'Töröl':function() {
								edit.attr('data-value',0);
								$('span',edit).text(edit.attr('data-text'));
								$(this).dialog('close');
							},
							'OK': function() {
								dialogcenter.jstree('get_selected').each(function() {
									var treenode=$(this).children('a');
									edit.attr('data-value',treenode.attr('id').split('_')[1]);
									$('span',edit).text(treenode.text());
								});
								$(this).dialog('close');
							},
							'Bezár': function() {
								$(this).dialog('close');
							}
						}
					});
				})
				.button();
				if (!$.browser.mobile) {
					CKFinder.setupCKEditor( null, '/ckfinder/' );
					$('#LeirasEdit').ckeditor();
				}
			},
			beforeSerialize:function(form,opt) {
				var cimkek=new Array();
				$('.js-cimkekarb').filter('.js-selectedcimke').each(function() {
					cimkek.push($(this).attr('data-id'));
				});
				var x={};
				x['cimkek[]']=cimkek;
				$('.js-termekfabutton').each(function() {
					$this=$(this);
					x[$this.attr('data-name')]=$this.attr('data-value');
				});
				opt['data']=x;
			},
			beforeHide:function() {
				if (!$.browser.mobile) {
					editor=$('#LeirasEdit').ckeditorGet();
					if (editor) {
						editor.destroy();
					}
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
			name:'termek',
			onGetTBody:function() {
				if (!$.browser.mobile) {
					$('.js-toflyout').flyout();
				}
			},
			filter:{
				fields:['#nevfilter'],
				onClear:function() {
					$('.js-cimkefilter').removeClass('ui-state-hover');
					$('#termekfa').jstree('uncheck_all');
				},
				onFilter:function(obj) {
					var cimkek=new Array(),fak=new Array();
					$('.js-cimkefilter').filter('.ui-state-hover').each(function() {
						cimkek.push($(this).attr('data-id'));
					});
					if (cimkek.length>0) {
						obj['cimkefilter']=cimkek;
					}
					$('#termekfa').jstree('get_checked').each(function() {
						var x=$('a',this).attr('id');
						if (x) {
							fak.push(x.split('_')[1]);
						}
					});
					if (fak.length>0) {
						obj['fafilter']=fak;
					}
				}
			},
			tablebody:{
				url:'/admin/termek/getlistbody'
			},
			karb:termek
		});

		$('.js-maincheckbox').change(function(){
			$('.js-egyedcheckbox').prop('checked',$(this).prop('checked'));
		});
		$('#mattable-body').on('click','.js-flagcheckbox',function(e) {
			function doit(succ) {
				if (succ) {
					succ();
				}
				$.ajax({
					url:'/admin/termek/setflag',
					type:'POST',
					data:{
						id:$this.attr('data-id'),
						flag:$this.attr('data-flag'),
						kibe:!$this.is('.ui-state-hover')
					},
					success:function() {
						$this.toggleClass('ui-state-hover');
					}
				});
			}
			e.preventDefault();
			var $this=$(this);
			if ($this.attr('data-flag')==='nemkaphato') {
				if (!$this.is('.ui-state-hover')) {
					dialogcenter.html('Biztos, hogy nem kaphatóvá teszi a terméket? A változatok automatikusan nem elérhetők lesznek.').dialog({
						resizable: false,
						height:200,
						modal: true,
						buttons: {
							'Igen': function() {
								doit(function(){dialogcenter.dialog('close');});
							},
							'Nem':function() {
								$(this).dialog('close');
							}
						}
					});
				}
				else {
					dialogcenter.html('Ne felejtse el beállítani az elérhető változatokat!').dialog({
						resizable: false,
						height:200,
						modal: true,
						buttons: {
							'OK': function() {
								doit(function(){dialogcenter.dialog('close');});
							}
						}
					});
				}
			}
			else {
				doit();
			}
		});
		$('#cimkefiltercontainer').mattaccord({
			header:'#cimkefiltercontainerhead',
			page:'.accordpage',
			closeUp:'.js-cimkefiltercloseupbutton',
			collapse:'#cimkefiltercollapse'
		});
		$('.js-cimkefilter').on('click',function(e) {
			e.preventDefault();
			$(this).toggleClass('ui-state-hover');
		});
		$('#termekfa').jstree({
			core:{animation:100},
			plugins:['themeroller','json_data','contextmenu','ui','checkbox'],
			themeroller:{item:''},
			json_data:{
				ajax:{url:'/admin/termekfa/jsonlist'}
			},
			ui:{select_limit:1},
			contextmenu:{
				select_node:true,
				items:{
					create:false,rename:false,remove:false,ccp:false
				}
			}
		})
		.bind('change_state.jstree',function(e,data) {
			$termekfa=$(this);
			$('li',$termekfa).each(function(i) {
				$this=$(this);
				if ($this.hasClass('jstree-unchecked')) {
					$('ins.jstree-checkbox',$this).removeClass('ui-icon ui-icon-circle-check ui-icon-check');
				}
				else if ($this.hasClass('jstree-checked')) {
					$('ins.jstree-checkbox',$this).removeClass('ui-icon ui-icon-circle-check ui-icon-check').addClass('ui-icon ui-icon-circle-check');
				}
				else if ($this.hasClass('jstree-undetermined')) {
					$('ins.jstree-checkbox',$this).removeClass('ui-icon ui-icon-circle-check ui-icon-check').addClass('ui-icon ui-icon-check');
				}
			});
		});
	}
	else {
		if ($.fn.mattkarb) {
			$('#mattkarb').mattkarb($.extend({},termek,{independent:true}));
		}
	}
});