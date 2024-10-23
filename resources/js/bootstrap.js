import moment from "moment/dist/moment"
import ko from "moment/dist/locale/ko"
moment.locale("ko", ko)
window.moment = moment;

import axios from 'axios';
axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.hiddenaxios = axios.create({
});

window.hiddenaxios.interceptors.request.use((function(config) {
    config.headers.Accept = 'application/json'
    config.responseType = 'json'
    config.responseEncoding = 'utf8'
    return config
}));

axios.interceptors.request.use((function(config) {
    config.headers.Accept = 'application/json'
    config.responseType = 'json'
    config.responseEncoding = 'utf8'
    preloadershow(true)
    return config
}));

axios.interceptors.response.use(
	(t=>(preloadershow(false),t)), 
	(t=>{
		if(typeof preloadershow == 'function' ) preloadershow(false);
		const e = t.response;
		var text ='잠시후에 이용해주세요';
			// V2 
		if (e.status == 401 ){
			_gotoLogin();
			return;
		}
		if( e.data && e.data.message ) text =  e.data.message;
		else if ("object" == typeof e.data && "object" == typeof e.data.errors)
			for (key in e.data.errors) {
				text = e.data.errors[key],
				"object" == typeof text && (text = text[0]);
				break
			}
		else  text = e.data.message ? e.data.message : "잠시후에 이용해주세요";
		return alertcall(text), Promise.reject(t.response)
	})
);
window.axios = axios;
