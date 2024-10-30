<x-alpine-pop-v2 tableid="qna_create_pop" closable="false">
    <x-slot name="script">
        save(e){
            if( confirm( '생성하시겠습니까?' ) ){
                axios.post('/api/admin/qna' , new FormData( e.target) ).then( res=>{
                    alertcall('생성하였습니다.')
                    window.dispatchEvent(new CustomEvent('qna_reload'))
                    this.closeModal()
                })
            }
        },
    </x-slot>
    <x-slot name="title">Qna 생성</x-slot>
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

</x-alpine-pop-v2>