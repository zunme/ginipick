//array 순서 변경
Array.prototype._move = function (from, to) {
	this.splice(to, 0, this.splice(from, 1)[0]);
};
// key == val remove
window._array_remove= function (arr, key, val){
	const idx = arr.findIndex(function(item) {return item[key] === val}) // findIndex = find + indexOf
	if (idx > -1) arr.splice(idx, 1)
	return arr
}

//array sort
Array.prototype._sortDown=function(ind){
	var temp = [... this ]
	if( this.length == ind+1 ) return temp;
	temp._move( ind, ind + 1)
	return temp
};

Array.prototype._sortUp=function(ind){
	var temp = [... this ]
	if(  ind == 0 ) return temp;
	temp._move( ind, ind - 1)
	return temp
};

window.preloadershow = function(show){
	var element = document.querySelector("#preloadshow")
	if( show ) element.classList.remove("hiddenforce")
	else {
		setTimeout(() => {
			var element = document.querySelector("#preloadshow")
			element.classList.add("hiddenforce")   
		}, 200);
	}
}

window.stripslashes = function(str){
  return  (str + '')
    .replace(/\\(.?)/g, function (s, n1) {
      switch (n1) {
        case '\\':
          return '\\'
        case '0':
          return '\u0000'
        case '':
          return ''
        default:
          return n1
      }
    })
}

window.serialize = function(data) {
	let obj = {};
	for (let [key, value] of data) {
		if (obj[key] !== undefined) {
			if (!Array.isArray(obj[key])) {
				obj[key] = [obj[key]];
			}
			obj[key].push(value);
		} else {
			obj[key] = value;
		}
	}
	return obj;
}

window.pluck = function (arrayOfObject, property) {
  return arrayOfObject.map(function (item) {
    return item[property];
  });
}

window.getStamp = function( c, cut ){
	c = (typeof c =='undefined') ? '' : c;
	if( typeof cut =='undefined' || ( parseInt(cut)|0) < 1 ) {
		return c + moment().format('x')
	}else return c + moment().format('x').slice( cut * -1 ) //-9
}

window.generateRandomString = function(num){
  const characters ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
  let result = '';
  const charactersLength = characters.length;
  for (let i = 0; i < num; i++) {
	  result += characters.charAt(Math.floor(Math.random() * charactersLength));
  }

  return result;
}

window.getMathRandomString = function(num){
	if( typeof num == 'undefined') num = 11;
	else if( typeof num == "string" || typeof num == "number" ) num = parseInt( num )|0
	else num = 11
	if ( num < 1) num = 11
	else if( num > 11 ) num =11
	return Math.random().toString(36).substr(2,num)
}

window.nl2br= function(str, is_xhtml) {   
	if( typeof str != 'string') return null
	var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';    
	return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1'+ breakTag +'$2');
}

window.Pagination = function( current_page, last_page, each_side ){
	var toStart , toLast , toPrev ,toNext ,maxStartPage ,minEndPage ,startPage ,endPage ;
	toStart = toLast = toPrev = toNext = maxStartPage = minEndPage = startPage = endPage = 0;

	if( typeof each_side =='undefined') each_side = 1
	each_side = ( parseInt(each_side)|0 )
	if( each_side < 1 ) each_side = 1

	toStart = current_page !=1 && current_page >1 ? 1 : false;
	toLast = current_page < last_page && current_page > 0 ? last_page : false;;
	toPrev = current_page > 1 ? (current_page - 1) : false;
	toNext = current_page < last_page  && current_page > 0 ?  current_page + 1 : false;

	maxStartPage = last_page - ( each_side*2 )
	maxStartPage = maxStartPage < 1 ? 1 : maxStartPage

	minEndPage = ( each_side*2 ) + 1
	minEndPage = minEndPage > last_page ? last_page : minEndPage

	startPage = current_page - each_side;
	startPage = startPage < 1 ? 1 : startPage
	startPage = startPage > maxStartPage ? maxStartPage : startPage

	endPage = current_page + each_side;
	endPage = endPage > last_page ? last_page : endPage
	endPage = endPage < minEndPage ? minEndPage : endPage
		var pages = []
	for(var i= startPage; i <= endPage; i++){
		pages.push(i)
	}
	return {
		current_page : current_page, 
		last_page : last_page,
		each_side : each_side,
		toStart : toStart,
		toLast :  toLast,
		toPrev: toPrev,
		toNext: toNext,
		maxStartPage: maxStartPage, 
		minEndPage:minEndPage ,
		startPage: startPage,
		endPage: endPage,
		pages:pages,
	}
}