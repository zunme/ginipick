const daum_element_layer = document.getElementById('daumlayer');
function closeDaum() {
    daum_element_layer.style.display = 'none';
}
function openDaum(target) {
    new daum.Postcode({
        oncomplete: function(data) {
            var addr = ''; // 주소 변수
            var extraAddr = ''; // 참고항목 변수
            var zonecode = '';
            var road = {
                addr:'',
                extraAddr:'',
            }
            var oldAddr = {
                addr:'',
                extraAddr:'',
            }
            console.log( data )
            road.addr = data.roadAddress;
            oldAddr.addr = data.jibunAddress;

            if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                road.extraAddr += data.bname;
            }
            // 건물명이 있고, 공동주택일 경우 추가한다.
            if(data.buildingName !== '' && data.apartment === 'Y'){
                road.extraAddr += (road.extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
            }
            // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
            if(road.extraAddr !== ''){
                road.extraAddr = ' (' + road.extraAddr + ')';
            }
            zonecode = data.zonecode

            if (data.userSelectedType === 'R') { 
                addr = road.addr
                extraAddr = road.extraAddr
            }else addr = oldAddr.addr

            daum_element_layer.style.display = 'none'
            
            var ret = {
                'target' : target,
                'zipcode' : zonecode,
                'addr' : addr,
                'extraAddr' : extraAddr,
                'address_type' : data.userSelectedType, 
                'addrs' : {
                    'road' : road,
                    'jibun' : oldAddr,
                },
                'data' : data
            }
            /* TODO */
            //hiddenaxios.get('')
            
            if( typeof getDaumAddr == 'function'){
                getDaumAddr( ret )
            }
            if( typeof eventToAlpine == 'function'){
                eventToAlpine({'type':'daumpost','data':ret})
            }
        },
        width : '100%',
        height : '100%',
        maxSuggestItems : 5
    }).embed(daum_element_layer);

    // iframe을 넣은 element를 보이게 한다.
    daum_element_layer.style.display = 'block';

    // iframe을 넣은 element의 위치를 화면의 가운데로 이동시킨다.
    initDaumLayerPosition();
}
function initDaumLayerPosition(){
    var width = 300; //우편번호서비스가 들어갈 element의 width
    var height = 400; //우편번호서비스가 들어갈 element의 height
    var borderWidth = 1; //샘플에서 사용하는 border의 두께

    // 위에서 선언한 값들을 실제 element에 넣는다.
    daum_element_layer.style.width = width + 'px';
    daum_element_layer.style.height = height + 'px';
    daum_element_layer.style.border = borderWidth + 'px solid';
    // 실행되는 순간의 화면 너비와 높이 값을 가져와서 중앙에 뜰 수 있도록 위치를 계산한다.
    daum_element_layer.style.left = (((window.innerWidth || document.documentElement.clientWidth) - width)/2 - borderWidth) + 'px';
    daum_element_layer.style.top = (((window.innerHeight || document.documentElement.clientHeight) - height)/2 - borderWidth) + 'px';
}
function syntaxHighlight(obj) {
    if( !obj ) return '';
    json = JSON.stringify(obj, undefined, 4);
    json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
    return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function (match) {
        var cls = 'number';
        if (/^"/.test(match)) {
            if (/:$/.test(match)) {
                cls = 'key';
            } else {
                cls = 'string';
            }
        } else if (/true|false/.test(match)) {
            cls = 'boolean';
        } else if (/null/.test(match)) {
            cls = 'null';
        }
        return '<span class="' + cls + '">' + match + '</span>';
    });
}

function _multipleString(n , str){
    return Array(n).fill( str ).join('')
}
function _recursiveOption( cate , i , is_use ) {
    var temp = [];
    ++i;
    is_use =  !is_use ? false : ( cate.is_use =='N' ? false : true ) 
    if(cate.depth > 0) temp.push( {depth:cate.depth, cursor: i , id: cate.id, name:cate.name ,name_space: _multipleString(cate.depth*3 ,'\xa0')+cate.name , is_use : is_use } )
    if( cate.children ){
        for( children of cate.children ){
            var ret = _recursiveOption(children , i , is_use )
            temp = temp.concat( [...ret])
        }
    }
    return temp
}
function toDateString( date ){
    if( !date) return ''
    return moment(date).format('YYYY-MM-DD')
}
function toDateTimeString( date ){
    if( !date) return ''
    return moment(date).format('YYYY-MM-DD HH:mm:ss')
}
function eventToAlpine(data){
    window.dispatchEvent(new CustomEvent("toAlpine", {detail: data }));
}