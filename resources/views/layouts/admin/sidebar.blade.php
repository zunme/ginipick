<aside id="sidebar"
    class="flex fixed top-0 left-0 z-30 flex-col flex-shrink-0 pt-16 h-full duration-200 transition-width"
	   :class="{'w-64':(open_menu || show_menu),'w-16':(!open_menu &&!show_menu)}"
	   @mouseover="show_menu=true"
	   @mouseover.away="show_menu=false"
    aria-label="Sidebar">
    <div class="flex relative flex-col flex-1 pt-0 min-h-0 bg-gray-50" id="sidebarwrap">
        <div class="flex overflow-y-auto overflow-x-hidden relative flex-col flex-1 pt-8 pb-4" id="sidebarinner">
            <div class="flex-1 bg-gray-50 pl-1.5" id="sidebar-items">
                <ul class="py-1">
					<template x-for="menu in menus">
						<li class="min-w-[200px]">
							<template x-if="menu.hassub === false">
								<a 	x-bind:href="menu.link"
									x-bind:target="menu.target ? '_blank':'_self'"
									class="flex items-center py-1.5 px-4 text-base font-normal text-dark-500 rounded-lg hover:bg-gray-200 group transition-all duration-200"
									sidebar-toggle-collapse=""
									wire:navigate
									>
									<div class="mr-1">
										<div class="w-[32px] h-[32px] bg-white shadow-lg shadow-gray-300  text-dark-700 reounded rounded-lg flex justify-center place-items-center"
											 :class="{ 'bg-blue-100': menu.admin_omly , 'bg-red-300' : menu.selected }"
											 >
											<i class="text-sm" :class="menu.icon"></i>
										</div>
									</div>

									<span class="ml-3 text-dark-500 text-sm  !overflow-y-hidden" 
										  :class="{'!text-red-600 !font-bold' : menu.selected }"  
										  sidebar-toggle-item="" x-text="menu.label"></span>
								</a>
							</template>
							<template x-if="menu.hassub">
								<li>
									<button type="button"
										class="w-full flex items-center py-1.5 px-4 text-base font-normal text-dark-500 rounded-lg hover:bg-gray-200 group transition-all duration-200"
										sidebar-toggle-collapse=""
										x-bind:aria-controls="menu.id"
										x-bind:data-collapse-toggle="menu.id">
										<div class="mr-1">
											<div class="w-[32px] h-[32px] bg-white shadow-lg shadow-gray-300  text-dark-700 reounded rounded-lg flex justify-center place-items-center"
												:class="{'bg-red-300' : menu.selected }"
												 >
												<i class="text-sm" :class="menu.icon"></i>
											</div>
										</div>

										<span class="ml-3 text-dark-500 text-sm !overflow-y-hidden" 
											  :class="{'!text-red-600 !font-medium' : menu.selected }"
											  sidebar-toggle-item="" x-text="menu.label"></span>
										<svg sidebar-toggle-item="" class="w-4 h-4 ml-auto text-gray-700" fill="currentColor"
											viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd"
												d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
												clip-rule="evenodd"></path>
										</svg>
									</button>
									<ul :id="menu.id" sidebar-toggle-list="" class="pb-2 pt-1 pl-5"
										:class="{'hidden' : !menu.selected }"
										>
										<template x-for="submenu in menu.sub">
											<li>
												<a 	x-bind:href="submenu.link"
												   	x-bind:target="submenu.target ? '_blank':'_self'"
													class="text-sm text-dark-500 rounded-lg flex items-center p-2 group hover:bg-gray-200 transition duration-75 pl-11"
													:class="{'!text-red-600 !font-bold' : submenu.selected , '!text-black': !submenu.selected }"
													wire:navigate
												   >
													<span class="" x-text="submenu.label"></span><span class="hidden">P</span>
												</a>
											</li>
										</template>
									</ul>
								</li>
							</template>
						</li>
					</template>
                </ul>
                <hr class="border-0 h-px bg-gradient-to-r from-gray-300 via-gray-500 to-gray-300 mt-1 mb-1">
                <ul class="pt-1">
					<template x-for="menu in menus_bottom">
						<li class="min-w-[200px]">
							<template x-if="menu.hassub === false">
								<a x-bind:href="menu.link"
								   x-bind:target="menu.target ? '_blank':'_self'"
								class="flex items-center py-1.5 px-4 text-base font-normal text-dark-500 rounded-lg hover:bg-gray-200 group transition-all duration-200"
								sidebar-toggle-collapse="">
									<div class="mr-1">
										<div class="w-[32px] h-[32px] bg-white shadow-lg shadow-gray-300  text-dark-700 reounded rounded-lg flex justify-center place-items-center"
											 :class="{ 'bg-blue-100': menu.admin_omly , 'bg-red-300' : menu.selected }"
											 >
											<i class="text-sm" :class="menu.icon"></i>
										</div>
									</div>

									<span class="ml-3 text-dark-500 text-sm  !overflow-y-hidden" 
										  :class="{'!text-red-600 !font-bold' : menu.selected }"  
										  sidebar-toggle-item="" x-text="menu.label"></span>
								</a>
							</template>
							<template x-if="menu.hassub">
								<li>
									<button type="button"
										class="w-full flex items-center py-1.5 px-4 text-base font-normal text-dark-500 rounded-lg hover:bg-gray-200 group transition-all duration-200"
										sidebar-toggle-collapse=""
										x-bind:aria-controls="menu.id"
										x-bind:data-collapse-toggle="menu.id">
										<div class="mr-1">
											<div class="w-[32px] h-[32px] bg-white shadow-lg shadow-gray-300  text-dark-700 reounded rounded-lg flex justify-center place-items-center"
												:class="{'bg-red-300' : menu.selected }"
												 >
												<i class="text-sm" :class="menu.icon"></i>
											</div>
										</div>

										<span class="ml-3 text-dark-500 text-sm !overflow-y-hidden" 
											  :class="{'!text-red-600 !font-medium' : menu.selected }"
											  sidebar-toggle-item="" x-text="menu.label"></span>
										<svg sidebar-toggle-item="" class="w-4 h-4 ml-auto text-gray-700" fill="currentColor"
											viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd"
												d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
												clip-rule="evenodd"></path>
										</svg>
									</button>
									<ul :id="menu.id" sidebar-toggle-list="" class="pb-2 pt-1 pl-5"
										:class="{'hidden' : !menu.selected }"
										>
										<template x-for="submenu in menu.sub">
											<li>
												<a x-bind:href="submenu.link"
												   x-bind:target="submenu.target ? '_blank':'_self'"
													class="text-sm text-dark-500 rounded-lg flex items-center p-2 group hover:bg-gray-200 transition duration-75 pl-11"
													:class="{'!text-red-600 !font-bold' : submenu.selected , '!text-black': !submenu.selected }"
												   >
													<span class="" x-text="submenu.label"></span><span class="hidden">P</span>
												</a>
											</li>
										</template>
									</ul>
								</li>
							</template>
						</li>
					</template>
                </ul>

            </div>
        </div>
        <div class="relative bottom-0 left-0 justify-center w-full flex bg-gray-100"
			 :class="{'flex-col':(!open_menu &&!show_menu)}"
            sidebar-bottom-menu="">
            <a href="#"
                class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-dark-500 hover:bg-gray-200">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z">
                    </path>
                </svg>
            </a>
			<div class="text-center"
				x-data="{ 
					modalOpen: false ,
					info : null,
					open(){
						axios.get('/api/admin/siteconfigs').then(res=>{
							this.info = res.data
							$nextTick(() => {
								this.modalOpen = true
							})
						})
					}
				}"
				@keydown.escape.window="modalOpen = false"
				>
				<span @click="open()"
					class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-dark-500 hover:bg-gray-200">
					<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd"
							d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
							clip-rule="evenodd"></path>
					</svg>
				</span>
				<template x-teleport="body">
					<div x-show="modalOpen" class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen" x-cloak>
						<div x-show="modalOpen" 
							x-transition:enter="ease-out duration-300"
							x-transition:enter-start="opacity-0"
							x-transition:enter-end="opacity-100"
							x-transition:leave="ease-in duration-300"
							x-transition:leave-start="opacity-100"
							x-transition:leave-end="opacity-0"
							@click="modalOpen=false" class="absolute inset-0 w-full h-full bg-black bg-opacity-40"></div>
						<div x-show="modalOpen"
							x-trap.inert.noscroll="modalOpen"
							x-transition:enter="ease-out duration-300"
							x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
							x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
							x-transition:leave="ease-in duration-200"
							x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
							x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
							class="relative w-full py-6 bg-white px-7 sm:max-w-[90vw] sm:rounded-lg">
							<div class="flex items-center justify-between pb-2">
								<h3 class="text-lg font-semibold">기본설정</h3>
								<button @click="modalOpen=false" class="!outline-none absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
									<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>  
								</button>
							</div>
							<div class="relative w-auto">
								<template x-if="info">
									<div>
										<table class="border border-gray-400 w-full mb-4 !text-sm">
											<tr>
												<th class="px-2 py-1 whitespace-nowrap dark:text-blue-100 border-b border-r last:border-r-0 border-gray-400">
													App URL
												</th>
												<td class="px-2 py-1 whitespace-nowrap dark:text-blue-100  border-b border-r last:border-r-0 border-gray-400 font-normal">
													<span x-text="info.app.url"></span>
												</td>
											</tr>
											<tr>
												<th class="px-2 py-1 whitespace-nowrap dark:text-blue-100 border-b border-r last:border-r-0 border-gray-400">
													기본 추천
												</th>
												<td class="px-2 py-1 whitespace-nowrap dark:text-blue-100  border-b border-r last:border-r-0 border-gray-400 font-normal">
													<span x-text="info.config.default_serial_name"></span>
												</td>
											</tr>
											<tr>
												<th class="px-2 py-1 whitespace-nowrap dark:text-blue-100 border-b border-r last:border-r-0 border-gray-400">
													SMS 발신전화번호
												</th>
												<td class="px-2 py-1 whitespace-nowrap dark:text-blue-100  border-b border-r last:border-r-0 border-gray-400 font-normal">
													<span x-text="info.config.onoff_sms.smsFrom"></span>
												</td>
											</tr>
											<tr>
												<th class="px-2 py-1 whitespace-nowrap dark:text-blue-100 border-b border-r last:border-r-0 border-gray-400">
													SMS NOTI 전화번호
												</th>
												<td class="px-2 py-1 whitespace-nowrap dark:text-blue-100  border-b border-r last:border-r-0 border-gray-400 font-normal">
													<span x-text="info.config.smsTo"></span>
												</td>
											</tr>
											<tr>
												<th class="px-2 py-1 whitespace-nowrap dark:text-blue-100 border-b border-r last:border-r-0 border-gray-400">
													회원가입시 전화검증
												</th>
												<td class="px-2 py-1 whitespace-nowrap dark:text-blue-100  border-b border-r last:border-r-0 border-gray-400 font-normal">
													<span x-text="info.config.use_tel_verify ? 'Y':'N'"></span>
												</td>
											</tr>
											<tr>
												<th class="px-2 py-1 whitespace-nowrap dark:text-blue-100 border-b border-r last:border-r-0 border-gray-400">
													회원가입시 추천인시리얼받기
												</th>
												<td class="px-2 py-1 whitespace-nowrap dark:text-blue-100  border-b border-r last:border-r-0 border-gray-400 font-normal">
													<span x-text="info.config.register_use_serial ? 'Y':'N'"></span>
												</td>
											</tr>
											<tr>
												<th class="px-2 py-1 whitespace-nowrap dark:text-blue-100 border-b border-r last:border-r-0 border-gray-400">
													무통장입금 사용
												</th>
												<td class="px-2 py-1 whitespace-nowrap dark:text-blue-100  border-b border-r last:border-r-0 border-gray-400 font-normal">
													<span x-text="info.config.use_bank ? 'Y':'N'"></span>
													<template x-if="info.config.use_bank">
														<div class="pl-3">
															<div x-text="info.config.bank_name ?? '은행미설정'"></div>
															<div x-text="info.config.bank_account ?? '계좌미설정'"></div>
															<div x-text="info.config.bank_account_holder ?? '예금주미설정'"></div>
														</div>
													</template>
												</td>
											</tr>

											<tr class="hidden">
												<th class="px-2 py-1 whitespace-nowrap dark:text-blue-100 border-b border-r last:border-r-0 border-gray-400">
													Check
												</th>
												<td class="px-2 py-1 whitespace-nowrap dark:text-blue-100  border-b border-r last:border-r-0 border-gray-400 font-normal">
													<div class="relative" x-data="{show_msg:false}">
														<span class="absolute top-0 right-0 z-index text-red-700 text-sm" @click="show_msg = !show_msg">view</span>
														<pre class="py-1 bg-gray-200 !text-xs">
															<div x-html="syntaxHighlight(info.config.check)" x-show="show_msg">
															</div>
														</pre>
													</div>
												</td>
											</tr>

										</table>
									</div>
								</template>
							</div>
						</div>
					</div>
				</template>
			</div>
        </div>
    </div>
</aside>