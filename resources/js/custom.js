import Toastify from 'toastify-js';
import Swiper from 'swiper/bundle';
window.Swiper = Swiper

const alertcall = function(text){
		Toastify({
			text: text,
			gravity:'bottom',
			position:'center',
			newWindow: true,
			close:true,
			offset: {
				x: 0,
				y: '40vh'
			  },
			style: {
				background: "#334155",
				color:"white"
			},
			duration: 2000
		}).showToast();
	}
window.alertcall = alertcall;


//alpine js strage extend
//showpop : $persist(true).using(cookieStorageExpiretionDay).as( `notipop_${item.id}` )
window.cookieStorageExpiretionDay = {
  getItem(key) {
      let cookies = document.cookie.split(";");
      for (let i = 0; i < cookies.length; i++) {
          let cookie = cookies[i].split("=");
          if (key == cookie[0].trim()) {
              return decodeURIComponent(cookie[1]);
          }
      }
      return null;
  },
  setItem(key, value) {
      var date = new Date(),  expires = 'expires=';
      date.setDate(date.getDate() + 1);
      expires += date.toGMTString();
      document.cookie = key + '=' + encodeURIComponent(value) + '; ' + expires + '; path=/';
      //document.cookie = key+' = '+encodeURIComponent(value)
  }
}

//showpop : $persist(true).using(localStorageExpiretionDay).as( `notipop_${item.id}` )
//setTimeout( localExpiretionClear(), 5000)
window.localStorageExpiretionDay = {
	getItem(key) {
			var temp = localStorage?.[key] ? JSON.parse(localStorage[key]) : {};
			if( Object.keys(temp).length === 0 ) {
				return null
			}
			if( temp.expset ){
					if( temp.expset < moment().format() ){
							localStorage.removeItem(key);
							return null  
					}else {
							return temp.d
					}
					return null
			}else return null;
	},
	setItem(key, value) {
			var temp = localStorage?.[key] ? JSON.parse(localStorage[key]) : {};
			if( value != null && Object.keys(temp).length === 0 ) {
				localStorage[key] = JSON.stringify({'d':value,'expset':moment().add(1 ,'days').format()});
			}
			else if( value != null && value != temp.d ) {
				localStorage[key] = JSON.stringify({'d':value,'expset':moment().add(1 ,'days').format()});
			}
	}
}
window.localExpiretionClear =()=>{
	var now =  moment().format()
	for( key of Object.keys( localStorage) ) {
			try{
					var obj = JSON.parse(localStorage[key])
					if( typeof obj =='object' && obj.expset) {
							if( temp.expset < now ){
									localStorage.removeItem(key);
							}
					}
			}catch (err) {
					;
			}
	}
}
// http 엑셀 생서시 사용
/*
	const worksheet = XLSX.utils.json_to_sheet(xlsxdata);
	const workbook = XLSX.utils.book_new();
	XLSX.utils.book_append_sheet(workbook, worksheet, 'Dates');
	try{
		XLSX.writeFile(workbook, 'sell.xlsx', { compression: true });
	} catch ( error){
		var wbout = XLSX.write(workbook, {bookType:'xlsx',  type: 'binary'});
		saveAs(new Blob([_custom_s2ab(wbout)],{type:'application/octet-stream'}), '주문.xlsx')
	}
*/
window._custom_s2ab =(s)=>{
	var buf = new ArrayBuffer(s.length);
	var view = new Uint8Array(buf);
	for (var i=0; i<s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
	return buf;
}