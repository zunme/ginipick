@props([
    'tableid'=>\Str::random(10),
    'popindex'=>'z-[41]',
    'maxwidth'=>'max-w-lg',
    'title'=>null,
    'closable'=>'true'
])

<div
    x-data="{
        modal_show:false,
        list : [],
        info : {},
        closable : {{$closable}} ,
        @if( isset($script) )
            {{$script}}
        @endif
        @if( isset($datainit) )
            {{ $datainit }}
        @else
        test(){
            window.dispatchEvent(new CustomEvent('testpop_open', {detail:{'id' : '123'}}));
            globalevent( {e_name:'testpop_open' ,qnano: 13 } )
        },
        datainit(){
            this.openModal()
        },
        @endif
        @if( isset($afterclose) )
            {{ $afterclose }}
        @else
        afterclose(){},
        @endif
        poplistener(e){
            if( e.detail ){
                console.log( e.detail)
                for (const [key, value] of Object.entries(e.detail)) {
                    if( key != 'type' ) this[key] = value
                }
            }
            this.datainit()
        },
        outsideclicked(){
            if( this.closable ) this.closeModal()
        },
        closeModal(){
            this.modal_show = false
            this.afterclose()
        },
        openModal(){
            this.modal_show = true
        },
        showModal(){
            this.modal_show = true
        },
    }"
    {{'@'.$tableid}}_open.window="poplistener(event);"
    {{'@'.$tableid}}_refresh.window="refresh();"
	{{'@'.$tableid}}_reload.window="reload();"
    x-cloak
    >
    <div 
        class="fixed {{$popindex}} top-0 left-0 right-0 bg-gray-900/50 w-full overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full min-h-[100vh] justify-center items-center flex"
        x-show="modal_show"
        >
        <div class="relative w-full max-h-full p-2 {{$maxwidth}} m-auto" @click.outside="outsideclicked()">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                @if( $title)
                <div 
                    class="flex items-end justify-between px-5 pt-1 pb-1 border-b rounded-t-lg bg-gray-200 dark:border-gray-600"
                    >
                    <div class="text-lg font-semibold text-gray-700">
                        {{$title}}
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
                @endif
                <div class="overflow-y-auto h-full max-h-[calc(95vh-100px)] pb-2">
                    <div class="_pop_inner p-3">
                        {{$slot}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>