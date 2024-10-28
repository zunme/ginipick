<div x-data="{
    maxwidth:'max-w-lg',
    popid : 'crete_user_pop',
    closable : true,
    zindex : {pop : 'z-[41]', backdrop : 'z-[40]' },
}" x-cloak >
<template x-teleport="body">
    <div x-data="{
        modal : null,
        list : [],
        test(){
            eventToAlpine( {type:'chatqnapop' ,qnano: 13 } )
        },
        datainit(){
            this.showModal();
        },
        scroll() { 
            var div = document.getElementById(`${popid}_cont`);
            div.scrollTo(0, div.scrollHeight)
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
                            title
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
                            <span @click="test()">test</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
</div>