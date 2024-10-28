<div {{ $attributes->merge([
	'class'=>'pagenate-list relative'
	]) }}
	 x-data="{
		initload : true,
		checkedlist : [],
		form_id : '{{$tableid ? $tableid.'_search': 'search'}}_form',
		url : `{{ $url }}`,
		list : [],
		alldata:{},
		pagenate : null,
		page : {{isset($page) ? $page : 1}},
		clicked : null,
		click_row(id){
			 this.clicked=id
		},
		@if(isset($script))
			 {{ $script }}
		@endif
		getList(page){
			if( typeof page =='undefined') page = 1
			var formdata = new FormData( $refs.search_form );
			formdata.append('page',page)

			 axios.get( this.url ,{ params : serialize(formdata) }).then(res=>{
				var paginate = Pagination(res.data.current_page, res.data.last_page, {{ $side }})
				this.checkedlist = []
				this.list = res.data.data
				this.pagenate = paginate
				window.pagenate = paginate
				this.alldata = res.data
				if( typeof this.afterget === 'function'){
					this.afterget()
				}
				this.page = page
			 })
		},
		defaultDownloadXlsx(){
			var formdata = new FormData( $refs.search_form );
			formdata.append('down_mode','xls');
			axios.get(this.url,{ params : serialize(formdata) }).then(res=>{
				if( res.data.length < 1){
					alertcall('데이터가 없습니다.');
					return;
				}else if( typeof this.makeXls === 'function'){
					this.makeXls( res.data)
				}else console.log( 'makeXls is not function ')
			})
		},
		defaultXlsxFile( data, name){
			const worksheet = XLSX.utils.json_to_sheet(data);
			const workbook = XLSX.utils.book_new();
			var filename = `${name}_` + moment().format('YYMMDDHHmmss');
			XLSX.utils.book_append_sheet(workbook, worksheet, name);

			try{
				XLSX.writeFile(workbook, `${filename}.xlsx`, { compression: true });
			} catch ( error){
				var wbout = XLSX.write(workbook, {bookType:'xlsx',  type: 'binary'});
				saveAs(new Blob([_custom_s2ab(wbout)],{type:'application/octet-stream'}), `${filename}.xlsx`)
			}
		},
		defaultFromCallBack(e){

		},
		refresh(){
			var page = this.pagenate  && this.pagenate.current_page ? this.pagenate.current_page : this.page;
			this.getList(page)
		},
		reload(){
			this.getList(1)
		},
		init(){
			if(this.initload !==false ) this.getList(  {{isset($page) ? $page : 1}} );

			@if(isset($initalpine))
			 {{ $initalpine }}
			@endif
		 }
	 }"
	{{'@'.$tableid}}_refresh.window="refresh();"
	{{'@'.$tableid}}_reload.window="reload();"
	
	 >
	<div class="{{ $innerclass }}">
		@if(isset($header))
				{{ $header }}
		@endif
		<form id="{{$tableid ? $tableid.'_search': 'search'}}_form" @submit.prevent="getList(1)" x-ref="search_form">
			@if(isset($form))
				{{ $form }}
			@endif
		</form>
		<form id="{{$tableid ?? 'pagebody_list'}}_form" @submit.prevent="{{$formcall && $formcall !='' ? $formcall :'defaultFromCallBack'}}(event)"  x-ref="table_form">
			{{ $slot }}
			@if(isset($footer))
				{{ $footer }}
			@endif
		</form>
		<x-alpine.pagenate />
	</div>
</div>