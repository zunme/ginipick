 @php
	$menuclass = new \App\Classes\MenuClass();
	$menu = $menuclass->get();
 @endphp
 x-data="{
	open_menu :false,
	show_menu : false,
	use_noti : true,
	app_box:[
		{ icon:'fa-solid fa-users' , label:'회원', link:'/djemals/users'},
		{ icon:'fa-solid fa-house' , label:'홈', link:'/', target:true},
	],
	menus:{{ Js::from($menu) }},
	menus_bottom:[
		
	],
	logout(){
		 axios.post('/logout').then(res=>{
			location.replace('/')
		 })
	},
	setMenuActive(){
		var cur_url = window.location.pathname
		var params = window.location.search
		var menus = [...this.menus]
		for ( main_ind  in menus ){
			var menu = menus[main_ind];
			if( !menu.hassub){
				if( menu.link == cur_url ) {
					menus[main_ind].selected = true;
					break;
				}
			}else {
				for ( sub_ind  in menu.sub ){
					var sub = menu.sub[sub_ind]
					if ( (sub.link == cur_url) || (sub.use_param && sub.link == this.cur_url + params) ) {
						menus[main_ind].selected = true;
						menus[main_ind].sub[sub_ind].selected = true;
						break;
					}
				}
			}
		 }
		 this.menus = menus;

		 var menus_bottom = [...this.menus_bottom]
		for ( main_ind  in menus_bottom ){
			var menu = menus_bottom[main_ind];
			if( !menu.hassub){
				if( menu.link == cur_url ) {
					menus_bottom[main_ind].selected = true;
					break;
				}
			}else {
				for ( sub_ind  in menu.sub ){
					var sub = menu.sub[sub_ind]
					if ( (sub.link == cur_url) || (sub.use_param && sub.link == this.cur_url + params) ) {
						menus_bottom[main_ind].selected = true;
						menus_bottom[main_ind].sub[sub_ind].selected = true;
						break;
					}
				}
			}
		 }
		 this.menus_bottom = menus_bottom;
	},
	init(){
		//const pctscinner = new PerfectScrollbar(document.querySelector('#sidebarinner'));
		 //const pctsmain = new PerfectScrollbar(document.querySelector('#main-item'),{scrollYMarginOffset:30,suppressScrollX:true});
		 this.setMenuActive()
	}
}"