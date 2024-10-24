<script>
    let callData = @json($callData);
	try{
        if( callData.data.success =='OK'){
            window.opener.eventToAlpine( callData)
            setTimeout( self.close(), 300)
        }else {
            if( typeof callData.data.message != 'undefined') alert( callData.data.message );
            else if( typeof callData.data.msg != 'undefined') alert( callData.data.msg );
            else alert('오류가 발생하였습니다.');
            self.close();
        }
	}catch(e){
		alert('오류가 발생하였습니다.');
        self.close();
	}
</script>