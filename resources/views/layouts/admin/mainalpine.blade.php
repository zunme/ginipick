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
	logout(){
		 axios.post('/logout').then(res=>{
			location.replace('/')
		 })
	},
	init(){
		//const pctscinner = new PerfectScrollbar(document.querySelector('#sidebarinner'));
		 //const pctsmain = new PerfectScrollbar(document.querySelector('#main-item'),{scrollYMarginOffset:30,suppressScrollX:true});
		 //this.setMenuActive()
	}
}"