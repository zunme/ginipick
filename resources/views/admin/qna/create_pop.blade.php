<div x-data="{
    maxwidth:'max-w-lg',
    popid : 'crete_qna_pop',
    closable : true,
    zindex : {pop : 'z-[41]', backdrop : 'z-[40]' },
}" x-cloak >
<template x-teleport="body">
    <div x-data="{
        modal : null,
        list : [],
        datainit(){
            this.showModal();
        },
        closeModal(){
            this.modal.hide()
            //$wire.dispatchSelf('user-created');
        },
        poplistener(detail){
            for (const [key, value] of Object.entries(detail)) {
                if( key != 'type' ) this[key] = value
            }
            this.datainit()
        },
        save(e){
            if( confirm( '생성하시겠습니까?' ) ){
                axios.post('/api/admin/qna' , new FormData( e.target) ).then( res=>{
                    alertcall('생성하였습니다.')
                    window.dispatchEvent(new CustomEvent('qna_reload'))
                    this.closeModal()
                })
            }
        },
        showModal(){
            if( !this.modal){
                const $targetEl = document.getElementById(`${popid}`);
                const options = {
                    placement: 'center-center',
                    backdrop: 'dynamic',
                    backdropClasses: `bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 ${zindex.backdrop}`,
                    closable: closable,
                    onHide: () => {
                        this.modalshow = false
                    },
                    onShow: () => {
                        console.log( 'modal' )
                        this.modalshow = true
                    },
                };
                this.modal = new Modal($targetEl, options);
                this.modal.show();              
            }else this.modal.show();
        },
        init(){
            window.addEventListener('toAlpine', event => {
                if( event.detail && event.detail.type && event.detail.type== popid) {
                    this.poplistener(event.detail)
                }
            });
        }
        }"
        >
        <div :id="popid" tabindex="-1" aria-hidden="true" 
            class="hidden fixed top-0 left-0 right-0 bg-gray-400/40 w-full overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full min-h-[100vh]"
            :class="zindex.pop"
            >
            <div class="relative w-full max-h-full p-2" :class="maxwidth">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="flex items-start justify-between px-5 pt-1 pb-1 border-b rounded-t-lg bg-gray-200 dark:border-gray-600">
                        <div class="text-lg font-semibold text-gray-700">
                            QnA 생성
                        </div>
                        <button type="button" 
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        @click="closeModal()"
                        >
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <div class="overflow-y-auto h-full" :id="`${popid}_cont`" style="max-height: calc(80vh - 110px);" >
                        <div class="_pop_inner p-3">
                            <form @submit.prevent="save(event)">
                                <div class="relative z-0 w-full mb-3 group">
                                    <input type="text" name="q_type" class="block text-wrap break-all py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  required/>
                                    <label class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                        질문타입
                                    </label>
                                </div>
                                <div class="relative z-0 w-full mb-3 group">
                                    <input type="text" name="q" class="block text-wrap break-all py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  required/>
                                    <label class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                        질문
                                    </label>
                                </div>
                                <div class="relative z-0 w-full mb-3 group">
                                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">답변</label>
                                    <textarea id="message" name="a" rows="4" 
                                        class="text-wrap break-all block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                        required
                                        placeholder="Leave a comment..."></textarea>
                                </div>
                                
  
                                <div class="mt-4 flex justify-end">
                                    <button class="px-4 py-2 bg-red-600 text-white rounded">QNA 생성</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
</div>