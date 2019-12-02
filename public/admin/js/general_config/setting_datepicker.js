/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 27-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

(function($){

	var EYE=window.EYE=function(){

		var _registered={
			init:[]
		};

		return{
			init:function(){
				$.each(_registered.init,function(nr,fn){
					fn.call();
				});
			},
			extend:function(prop){
				for(var i in prop){
					if(prop[i] != undefined)
						this[i]=prop[i];
				}
			},
			register:function(fn,type){
				if(!_registered[type])
					_registered[type]=[];
				_registered[type].push(fn);
			}
		};
	}();

	$(EYE.init);

	var initLayout=function(){

		var now=new Date();
		$('#datepicker').DatePicker({
			flat:true,
			date:[new Date(now)],
			current:new Date(now),
			format:'Y-m-d',
			calendars:1,
			mode:'multiple',
			onChange:function(formated,dates){
			},
			starts:0
		});
	};
	EYE.register(initLayout,'init');
})(jQuery);