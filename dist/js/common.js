var common = function(){
	var urllink = location.toString();
	var caseType = urllink.substring(urllink.lastIndexOf('\/')+1, urllink.lastIndexOf('.'));
	var len = urllink.lastIndexOf('#') == -1 ? urllink.length : urllink.lastIndexOf('#');
	if(urllink.lastIndexOf('\/') == urllink.length-1) caseType = '';
	var searchFiled = 'search.php',Easing = 'easeInOutQuart',EasingB = 'easeInOutBack',obj = {};
	var hasChanged = true;
	$(document).ready(function(){

		$('body').fadeIn(600,Easing);
		
	});
	var isHover = false;
	return{
		init: function(){
            
            /*switch(caseType){
				case 'index': case '':

					
				break;
            };*/
        },

		no_submit_btn: function(form){
			if(event.keyCode == 13 && document.activeElement.tagName.toLowerCase() != 'textarea') $(form).find('[rel=submit]').trigger('click');
		},

		
		verifyField : function(target){
			var inputs = (typeof(target) == 'string' ? $('#'+target) : $(target)).find('[rel*="*"]');
			for(var i=0;i<inputs.length;i++){
				var v = inputs.get(i).value;
				var t = inputs.get(i).title == '' ? '此欄位' : inputs.get(i).title;
				 switch(inputs.get(i).name){

					case 'eMail':
						var mail_format = /^(\w+)([\-+.\'][\w]+)*@(\w[\-\w]*\.){1,5}([A-Za-z]){2,6}$/;
						if(!mail_format.test(v)) return this.errorStatus(inputs[i], 'Email格式有誤'); 
						break;
				}
				
				if(inputs.get(i).value == '') return this.errorStatus(inputs.get(i), t+'不得為空!!');

			}
			return true;
		},

		errorStatus : function(f, text){
			alert(text);
			if(f) f.focus();
			return false;
		},

		destroyItem: function(b,id){
			if (confirm($(b).data('confirm'))) {
			var o = {};
       		o['id']=id;
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
				}
			})
			$.ajax({
				url: '../api/cart/removeToCart',
				type: "POST",
				dataType: "json",
				data: o,
				success: function(data){
					location.reload();
					//return 
				},complete:function(){
					
					//console.log(o);
				},error:function(e){
					toastr.error('伺服器無法回應,請稍候再試','Inconceivable!');
					console.log(o);
				}
			});
			}
		},

		

		submitForm: function(b,id,r){
			if(id){
				var o = {};
				o['size'] = id;
				o['qty'] = $(b).siblings('.amount').find($("select[name='qty']")).val();
				$('.loader').fadeIn();
				//if(r && r == 'reload')o['reload'] = r;
			}else{
				var form = (b.tagName.toLowerCase() == 'form') ? b : $(b).parents('form').get(0);
				if(!this.verifyField(form)) return false;
				//tinyMCE.triggerSave();
				var o = this.getFormsData(form);
			}
			//o['qty'] = 1;
			$.ajaxSetup({
	            headers: {
	                'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
	            }
	        })
			$.ajax({
				url: '../../api/cart/addToCart',
				type: "POST",
				dataType: "json",
				data: o,
				success: function(data){
					//$('.cart-btn').addClass('active');
					$('.carquantity').text(data.count);
					alert('已加入購物車');
					console.log(data);
					
				},complete:function(data){
					if(r && r == 'reload'){
						location.reload();
					}else{
						$('.loader').fadeOut();
					}
	
				},error:function(e){
					alert('伺服器無法回應,請稍候再試');
					//toastr.error('伺服器無法回應,請稍候再試','Inconceivable!');
					console.log(o);
					$('.loader').fadeOut();
				}
			});
		},
		
		resetForm : function(b){
			var form = $(b).parents('form').get(0);
			$('.sex span').removeClass('active');
			for(var i=0;i<form.length;i++){
				switch(form.elements[i].tagName.toUpperCase()){
					case 'SELECT': form.elements[i].selectedIndex = 0; break;
					default: form.elements[i].value = '';
				};
			};	
			return false;
		},

		gotoTag : function(id,val){
			if(val == undefined) val = 0;
			var id = (id)?$(id).offset().top:0,str = id - val;
			$('html, body').animate({scrollTop: str}, 800);
		},
		
		getFormsData: function(form){
			var o = {};
			var tag = [];
			for(var i=0;i<form.length;i++){
				var f = form.elements[i];
				console.log(f.type.toUpperCase());
				if(f.value == '') continue;
				
				switch(f.type.toUpperCase()){
					case 'RADIO': if(f.checked) o[f.name] = f.value; break;

					case 'SELECT': 
						if(f.selected)o[f.name]= f.value;
					break;

					case 'CHECKBOX': 
						if(f.checked){
							o[f.name]= 1;
						}else{
							o[f.name]= 0;
						};


						//if(!o[f.name]){
						//	o[f.name] = f.value;
						//}else{
						//	o[f.name] += ','+f.value;
						//};
						break;
					case 'SELECT-MULTIPLE': 
						o[f.name] = $('select[name="'+f.name+'"]').val() || [];
						o[f.name] = o[f.name].join();
					break;
					
					default:
						o[f.name] = f.value;
				};
			};
			
			return o;
		},
		
		finalExcute: function(o){
			if (o.notice) o.target ? this.errorStatus($('#' + o.target).get(0), o.notice) : alert(o.notice);
			
			switch(o.url){
				case 'reload': location.reload(); break;
				default:
					if(o.url) location.href = o.url;
			}
			if(o.log) console.log(o.log);
			if(o.eval) eval(o.eval);
		},
		
		

	};
}();

$(document).ready(common.init);


