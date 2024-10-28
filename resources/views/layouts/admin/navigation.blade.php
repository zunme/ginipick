<nav class="fixed z-30 w-full bg-gray-50">
	<div class="py-3 px-3 lg:px-5 lg:pl-3">
		<div class="flex justify-between items-center">
			<div class="flex justify-start items-center"
				 >
				
				<button
					id="toggleSidebarMobile"
					aria-expanded="true"
					aria-controls="sidebar"
					class="p-2 mr-2 text-gray-600 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100"
				>
					<svg
						id="toggleSidebarMobileHamburger"
						class="w-6 h-6"
						fill="currentColor"
						viewBox="0 0 20 20"
						xmlns="http://www.w3.org/2000/svg"
						 x-show="!open_menu"
						 @click="open_menu=true"
					>
						<path
							fill-rule="evenodd"
							d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
							clip-rule="evenodd"
						></path>
					</svg>
					<svg
						id="toggleSidebarMobileClose"
						class="w-6 h-6"
						fill="currentColor"
						viewBox="0 0 20 20"
						xmlns="http://www.w3.org/2000/svg"
						x-show="open_menu"
						@click="open_menu=false"
					>
						<path
							fill-rule="evenodd"
							d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
							clip-rule="evenodd"
						></path>
					</svg>
				</button>
				<a
					href="/djemals"
					class="text-md font-semibold flex items-center lg:mr-1.5"
				>
					<span
						class="hidden md:inline-block self-center text-xl font-bold whitespace-nowrap"
						>{{ config('app.name', 'Admin') }} 관리자</span
					>
				</a>

			</div>
			<div class="flex items-center">

				<button x-data="{
						notification:[],
						notiInterval : null,
						getNoti(){
							if( this.use_noti ){
								fetch('/api/admin/noti').then(res=>{
									console.log( res )	
								}).catch( err =>{
									console.log(err)	
								})
							}
						},
						init(){
							this.getNoti();
						}
					}"
					type="button"
					data-dropdown-toggle="notification-dropdown"
					class="p-2  rounded-2xl relative"
					:class="{'text-red-500 hover:text-red-900 hover:bg-red-100':notification.length>0, 'text-gray-500 hover:text-gray-900 hover:bg-gray-100': notification.length==0}"
					x-show="use_noti"
				>
					<span class="sr-only">View notifications</span>
					<svg
						class="w-6 h-6"
						fill="currentColor"
						viewBox="0 0 20 20"
						xmlns="http://www.w3.org/2000/svg"
					>
						<path
							d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"
						></path>
					</svg>
					<span
						  class="bg-green-600/70 flex h-[20px] items-center justify-center min-w-[20px] right-0 rounded-xl text-white text-xs absolute top-0 right-0"
						  x-show="notification.length>0"
						  x-text="notification.length"
						  ></span>
				</button>
				<div
					class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg shadow-gray-300"
					id="notification-dropdown"
					data-popper-placement="bottom"
					style="
						position: absolute;
						inset: 0px auto auto 0px;
						margin: 0px;
						transform: translate(979px, 65px);
					"
				>
					<div
						class="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50"
					>
						Notifications
					</div>
					<div>
						<span class="flex py-3 px-4 border-b hover:bg-gray-100">
							<div class="pl-3 w-full">
								<div class="text-gray-500 font-normal text-sm mb-1.5">
									<span class="font-semibold text-gray-900">알림이 없습니다.</span>:
								</div>
							</div>
						</span>
						<!--
						<a href="#" class="flex py-3 px-4 border-b hover:bg-gray-100">
							<div class="flex-shrink-0">
								<img
									class="w-11 h-11 rounded-full"
									src="https://demos.creative-tim.com/soft-ui-flowbite-pro/images/users/bonnie-green.png"
									alt="Jese image"
								/>
								<div
									class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-fuchsia-600 rounded-full border border-white"
								>
									<svg
										class="w-3 h-3 text-white"
										fill="currentColor"
										viewBox="0 0 20 20"
										xmlns="http://www.w3.org/2000/svg"
									>
										<path
											d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"
										></path>
										<path
											d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"
										></path>
									</svg>
								</div>
							</div>
							<div class="pl-3 w-full">
								<div class="text-gray-500 font-normal text-sm mb-1.5">
									New message from
									<span class="font-semibold text-gray-900">Bonnie Green</span>:
									"Hey, what's up? All set for the presentation?"
								</div>
								<div class="text-xs font-medium text-fuchsia-500">
									a few moments ago
								</div>
							</div>
						</a>
						-->

					</div>
				</div>
				<button
					type="button"
					data-dropdown-toggle="apps-dropdown"
					class="p-2 text-gray-500 rounded-2xl hover:text-gray-900 hover:bg-gray-100"
				>
					<span class="sr-only">View notifications</span>
					<svg
						class="w-6 h-6"
						fill="currentColor"
						viewBox="0 0 20 20"
						xmlns="http://www.w3.org/2000/svg"
					>
						<path
							d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
						></path>
					</svg>
				</button>
				<div
					class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg shadow-gray-300"
					id="apps-dropdown"
					data-popper-placement="bottom"
					style="
						position: absolute;
						inset: 0px auto auto 0px;
						margin: 0px;
						transform: translate(1019px, 65px);
					"
				>
					<div
						class="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50"
					>
						LINKS
					</div>
					<div class="grid grid-cols-3 gap-4 p-4">
						<template x-for="item in app_box">
							<a :href="item.link" class="block p-4 text-center rounded-2xl hover:bg-gray-100"
							   x-bind:target="item.target ? '_blank':'_self'"
							   >
								<i class="mx-auto mb-1 w-7 h-7 text-gray-500 text-xl" :class="item.icon"></i>
								<div class="text-sm font-medium text-gray-900" x-text="item.label"></div>
							</a>
						</template>
					</div>
				</div>
				<div class="ml-3">
					<div>
						<button
							type="button"
							class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300"
							id="user-menu-button-2"
							aria-expanded="false"
							data-dropdown-toggle="dropdown-2"
						>
							<span class="sr-only">Open user menu</span>
							
							<span class="w-8 h-8 rounded-full flex justify-center items-center">
								<i class="fa-solid fa-user-tie text-white"></i>
							</span>
						</button>
					</div>
					<!-- app menu -->
					<div
						class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg shadow-gray-300"
						id="dropdown-2"
						data-popper-placement="bottom"
						style="
							position: absolute;
							inset: 0px auto auto 0px;
							margin: 0px;
							transform: translate(1067px, 61px);
						"
					>
						<div class="py-3 px-4" role="none">
							<p class="text-sm" role="none">{{ Auth::user()->name }}</p>
							<p class="text-sm font-medium text-gray-900 truncate" role="none">
								{{ Auth::user()->userid }}
							</p>
						</div>
						<ul class="py-1" role="none">
							<li>
								<span
									class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 cursor-pointer"
									@click.prevent="logout()"
									role="menuitem"
									>Sign out</span>
							</li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</div>
</nav>