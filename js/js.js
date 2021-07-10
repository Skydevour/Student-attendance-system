$(document).ready(function(){
	/* 安卓版本兼容 */
	var brower = {
		versions:function(){
			var u = window.navigator.userAgent;
			var num ;
			if(u.indexOf('Trident') > -1){
			//IE
				return "IE";
			}else if(u.indexOf('Presto') > -1){
			//opera
				return "Opera";
			}else if(u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1){
			//firefox
				return "Firefox";
			}else if(u.indexOf('AppleWebKit' && u.indexOf('Safari') > -1) > -1){
			//苹果、谷歌内核
				if(u.indexOf('Chrome') > -1){
				//chrome
					return "Chrome";
				}else if(u.indexOf('OPR')){
				//webkit Opera
					return "Opera_webkit"
				}else{
				//Safari
					return "Safari";
				}
			}else if(u.indexOf('Mobile') > -1){
			//移动端
				if(!!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/)){
				//ios
					if(u.indexOf('iPhone') > -1){
					//iphone
						return "iPhone"
					}else if(u.indexOf('iPod') > -1){
					//ipod
						return "iPod"
					}else if(u.indexOf('iPad') > -1){
					//ipad
						return "iPad"
					}
				}else if(u.indexOf('Android') > -1 || u.indexOf('Linux') > -1){
				//android
					num = u.substr(u.indexOf('Android') + 8, 3);
					return {"type":"Android", "version": num};
				}else if(u.indexOf('BB10') > -1 ){
				//黑莓bb10系统
					return "BB10";
				}else if(u.indexOf('IEMobile')){
				//windows phone
					return "Windows Phone"
				}
			}
		}
    }
	
	var system=brower.versions();
	
	if(system!="IE"){
		
		
		var scroll_height=270;
		var window_h=$(window).height();
		var window_w=$(window).width();
		var img_min_h=488;
		var img_min_w=863;
		var phone_min_h=547;
		var phone_min_w=1118;
		var phone_set_h=parseInt(547/488*window_h);
		var phone_set_w=parseInt(1118/863*window_w);
		var phone_set_l=parseInt(123/1118*phone_set_w);
		var phone_set_t=parseInt(30/547*phone_set_h);
		var scroll_length=350;
		var ocupy_length=$(".ocupy_area").offset().top;
		var translate_h=600;
		
		$(".main").css({
			"margin-top": scroll_length+110+"px"
		});
		
		$(window).scroll(function(){
			var scroll_num=$(window).scrollTop();
			setPhoneSize(scroll_num);
		});
		
		
		setPhoneSize(0);
		
	}
	else{
		$("body").addClass("version_ie");
	}
	
	function setPhoneSize(num){
		
		
			//背景缩放、偏移
			var param_h=(window_h/1100);
			var param_w=(window_w/700);
			
			var x_t=1834560;
			var y_t=1472;
			var param_a=(x_t/(y_t+window_w))/scroll_length;
			
			var x_s=536;
			var y_s=1040;
			var param_b=(window_w+x_s)/y_s-0.95;
			
			var x_qr=1386000;
			var y_qr=1080;
			var translate_h=x_qr/(y_qr+window_h)-80; //大概80为头部导航菜单栏的高度
			
			if(num>=scroll_length){
				$(".phone_wrap").css({
					"-moz-transform": " translate(0,0) scale(1)",
					"-webkit-transform": " translate(0,0) scale(1)"
				});
			}else{
				$(".phone_wrap").css({
					"-moz-transform": " translate(0,-"+(scroll_length-num)*param_a+"px) scale("+(1+(scroll_length-num)/scroll_length*param_b)+")",
					"-webkit-transform": " translate(0,-"+(scroll_length-num)*param_a+"px) scale("+(1+(scroll_length-num)/scroll_length*param_b)+")"
				});
			}
			
			if(num>=scroll_length){ //二维码悬浮
				$(".qr_code_wrap").css({
					"-moz-transform": " translate(0,0)",
					"-webkit-transform": " translate(0,0)"
				});
			}else{
				$(".qr_code_wrap").css({
					"-moz-transform": " translate(0,"+(translate_h-num*(translate_h/scroll_length))*-1+"px)", 
					"-webkit-transform": " translate(0,"+(translate_h-num*(translate_h/scroll_length))*-1+"px)" 
				});
				
			}
			
	}
});