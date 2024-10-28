<div class="fi-topbar sticky top-0 z-20 overflow-x-clip">
    <nav
        class="flex h-16 items-center gap-x-4 bg-white px-4 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10 md:px-6 lg:px-8"
    >  
        <button
            style="
            --c-300: var(--gray-300);
            --c-400: var(--gray-400);
            --c-500: var(--gray-500);
            --c-600: var(--gray-600);
            "
            class="fi-icon-btn relative flex items-center justify-center rounded-lg outline-none transition duration-75 focus-visible:ring-2 -m-1.5 h-9 w-9 text-gray-400 hover:text-gray-500 focus-visible:ring-primary-600 dark:text-gray-500 dark:hover:text-gray-400 dark:focus-visible:ring-primary-500 fi-color-gray fi-topbar-open-sidebar-btn lg:hidden"
            title="사이드바 펼치기"
            type="button"
            x-cloak="x-cloak"
            x-data="{}"
            x-on:click="$store.sidebar.open()"
            x-show="! $store.sidebar.isOpen"
        >
            <span class="sr-only"> 사이드바 펼치기 </span>
            <svg
            class="fi-icon-btn-icon h-6 w-6"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            aria-hidden="true"
            data-slot="icon"
            >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
            />
            </svg>
        </button>

        <button
            style="
            --c-300: var(--gray-300);
            --c-400: var(--gray-400);
            --c-500: var(--gray-500);
            --c-600: var(--gray-600);
            "
            class="fi-icon-btn relative flex items-center justify-center rounded-lg outline-none transition duration-75 focus-visible:ring-2 -m-1.5 h-9 w-9 text-gray-400 hover:text-gray-500 focus-visible:ring-primary-600 dark:text-gray-500 dark:hover:text-gray-400 dark:focus-visible:ring-primary-500 fi-color-gray fi-topbar-close-sidebar-btn lg:hidden"
            title="사이드바 접기"
            type="button"
            x-cloak="x-cloak"
            x-data="{}"
            x-on:click="$store.sidebar.close()"
            x-show="$store.sidebar.isOpen"
        >
            <span class="sr-only"> 사이드바 접기 </span>
            <svg
            class="fi-icon-btn-icon h-6 w-6"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            aria-hidden="true"
            data-slot="icon"
            >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M6 18 18 6M6 6l12 12"
            />
            </svg>
        </button>

        <div
            x-persist="topbar.end"
            class="ms-auto flex items-center gap-x-4"
        >
            <div
            x-data="{
                                toggle: function (event) {
                                    $refs.panel.toggle(event)
                                },

                                open: function (event) {
                                    $refs.panel.open(event)
                                },

                                close: function (event) {
                                    $refs.panel.close(event)
                                },
                            }"
            class="fi-dropdown fi-user-menu"
            >
            <div
                x-on:click="toggle"
                class="fi-dropdown-trigger flex cursor-pointer"
            >
                <button
                    aria-label="사용자 메뉴"
                    type="button"
                    class="shrink-0"
                >
                    <img
                        class="fi-avatar object-cover object-center fi-circular rounded-full h-8 w-8 fi-user-avatar"
                        src="https://ui-avatars.com/api/?name=a&amp;color=FFFFFF&amp;background=09090b"
                        alt="admin 아바타"
                    />
                </button>
            </div>

            <div
                x-cloak
                x-float.placement.bottom-end.flip.teleport.offset="{ offset: 8,  }"
                x-ref="panel"
                x-transition:enter-start="opacity-0"
                x-transition:leave-end="opacity-0"
                class="fi-dropdown-panel absolute z-10 w-screen divide-y divide-gray-100 rounded-lg bg-white shadow-lg ring-1 ring-gray-950/5 transition dark:divide-white/5 dark:bg-gray-900 dark:ring-white/10 !max-w-[14rem]"
                style=""
            >
                <div
                class="fi-dropdown-header flex w-full gap-2 p-3 text-sm fi-dropdown-header-color-gray fi-color-gray"
                >
                <svg
                    class="fi-dropdown-header-icon h-5 w-5 text-gray-400 dark:text-gray-500"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                    aria-hidden="true"
                    data-slot="icon"
                >
                    <path
                    fill-rule="evenodd"
                    d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-5.5-2.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0ZM10 12a5.99 5.99 0 0 0-4.793 2.39A6.483 6.483 0 0 0 10 16.5a6.483 6.483 0 0 0 4.793-2.11A5.99 5.99 0 0 0 10 12Z"
                    clip-rule="evenodd"
                    />
                </svg>

                <span
                    class="fi-dropdown-header-label flex-1 truncate text-start text-gray-700 dark:text-gray-200"
                >
                    {{ auth()->user()->name }}
                </span>
                </div>
                <!--div class="fi-dropdown-list p-1">
                    <div
                        x-data="{ theme: null }"
                        x-init="
                                                $watch('theme', () => {
                                                    $dispatch('theme-changed', theme)
                                                })

                                                theme = localStorage.getItem('theme') || 'system'    "
                        class="fi-theme-switcher grid grid-flow-col gap-x-1"
                    >
                        <button
                        aria-label="라이트 모드"
                        type="button"
                        x-on:click="(theme = 'light') && close()"
                        x-tooltip="{
                                                    content: '\ub77c\uc774\ud2b8 \ubaa8\ub4dc',
                                                    theme: $store.theme,
                                                }"
                        class="fi-theme-switcher-btn flex justify-center rounded-md p-2 outline-none transition duration-75 hover:bg-gray-50 focus-visible:bg-gray-50 dark:hover:bg-white/5 dark:focus-visible:bg-white/5"
                        x-bind:class="
                                                    theme === 'light'            ? 'fi-active bg-gray-50 text-primary-500 dark:bg-white/5 dark:text-primary-400'
                                                        : 'text-gray-400 hover:text-gray-500 focus-visible:text-gray-500 dark:text-gray-500 dark:hover:text-gray-400 dark:focus-visible:text-gray-400'
                                                "
                        >
                        <svg
                            class="h-5 w-5"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            aria-hidden="true"
                            data-slot="icon"
                        >
                            <path
                            d="M10 2a.75.75 0 0 1 .75.75v1.5a.75.75 0 0 1-1.5 0v-1.5A.75.75 0 0 1 10 2ZM10 15a.75.75 0 0 1 .75.75v1.5a.75.75 0 0 1-1.5 0v-1.5A.75.75 0 0 1 10 15ZM10 7a3 3 0 1 0 0 6 3 3 0 0 0 0-6ZM15.657 5.404a.75.75 0 1 0-1.06-1.06l-1.061 1.06a.75.75 0 0 0 1.06 1.06l1.06-1.06ZM6.464 14.596a.75.75 0 1 0-1.06-1.06l-1.06 1.06a.75.75 0 0 0 1.06 1.06l1.06-1.06ZM18 10a.75.75 0 0 1-.75.75h-1.5a.75.75 0 0 1 0-1.5h1.5A.75.75 0 0 1 18 10ZM5 10a.75.75 0 0 1-.75.75h-1.5a.75.75 0 0 1 0-1.5h1.5A.75.75 0 0 1 5 10ZM14.596 15.657a.75.75 0 0 0 1.06-1.06l-1.06-1.061a.75.75 0 1 0-1.06 1.06l1.06 1.06ZM5.404 6.464a.75.75 0 0 0 1.06-1.06l-1.06-1.06a.75.75 0 1 0-1.061 1.06l1.06 1.06Z"
                            />
                        </svg>
                        </button>

                        <button
                        aria-label="다크 모드"
                        type="button"
                        x-on:click="(theme = 'dark') && close()"
                        x-tooltip="{
                                                    content: '\ub2e4\ud06c \ubaa8\ub4dc',
                                                    theme: $store.theme,
                                                }"
                        class="fi-theme-switcher-btn flex justify-center rounded-md p-2 outline-none transition duration-75 hover:bg-gray-50 focus-visible:bg-gray-50 dark:hover:bg-white/5 dark:focus-visible:bg-white/5"
                        x-bind:class=" theme === 'dark' 
                                                                ? 'fi-active bg-gray-50 text-primary-500 dark:bg-white/5 dark:text-primary-400'
                                                                : 'text-gray-400 hover:text-gray-500 focus-visible:text-gray-500 dark:text-gray-500 dark:hover:text-gray-400 dark:focus-visible:text-gray-400'
                                                            "
                        >
                        <svg
                            class="h-5 w-5"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            aria-hidden="true"
                            data-slot="icon"
                        >
                            <path
                            fill-rule="evenodd"
                            d="M7.455 2.004a.75.75 0 0 1 .26.77 7 7 0 0 0 9.958 7.967.75.75 0 0 1 1.067.853A8.5 8.5 0 1 1 6.647 1.921a.75.75 0 0 1 .808.083Z"
                            clip-rule="evenodd"
                            />
                        </svg>
                        </button>

                        <button
                        aria-label="시스템 테마 사용"
                        type="button"
                        x-on:click="(theme = 'system') && close()"
                        x-tooltip="{
                                                    content: '\uc2dc\uc2a4\ud15c \ud14c\ub9c8 \uc0ac\uc6a9',
                                                    theme: $store.theme,
                                                }"
                        class="fi-theme-switcher-btn flex justify-center rounded-md p-2 outline-none transition duration-75 hover:bg-gray-50 focus-visible:bg-gray-50 dark:hover:bg-white/5 dark:focus-visible:bg-white/5"
                        x-bind:class=" theme === 'system' 
                                                    ? 'fi-active bg-gray-50 text-primary-500 dark:bg-white/5 dark:text-primary-400'
                                                    : 'text-gray-400 hover:text-gray-500 focus-visible:text-gray-500 dark:text-gray-500 dark:hover:text-gray-400 dark:focus-visible:text-gray-400'
                                                "
                        >
                        <svg
                            class="h-5 w-5"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            aria-hidden="true"
                            data-slot="icon"
                        >
                            <path
                            fill-rule="evenodd"
                            d="M2 4.25A2.25 2.25 0 0 1 4.25 2h11.5A2.25 2.25 0 0 1 18 4.25v8.5A2.25 2.25 0 0 1 15.75 15h-3.105a3.501 3.501 0 0 0 1.1 1.677A.75.75 0 0 1 13.26 18H6.74a.75.75 0 0 1-.484-1.323A3.501 3.501 0 0 0 7.355 15H4.25A2.25 2.25 0 0 1 2 12.75v-8.5Zm1.5 0a.75.75 0 0 1 .75-.75h11.5a.75.75 0 0 1 .75.75v7.5a.75.75 0 0 1-.75.75H4.25a.75.75 0 0 1-.75-.75v-7.5Z"
                            clip-rule="evenodd"
                            />
                        </svg>
                        </button>
                    </div>
                </div-->

                <div class="fi-dropdown-list p-1">
                    <div
                        action="/logout"
                        method="post"
                        >
                        <button
                            wire:click="logout"
                            class="fi-dropdown-list-item flex w-full items-center gap-2 whitespace-nowrap rounded-md p-2 text-sm transition-colors duration-75 outline-none disabled:pointer-events-none disabled:opacity-70 hover:bg-gray-50 focus-visible:bg-gray-50 dark:hover:bg-white/5 dark:focus-visible:bg-white/5 fi-dropdown-list-item-color-gray fi-color-gray"
                            >
                            <svg
                                class="fi-dropdown-list-item-icon h-5 w-5 text-gray-400 dark:text-gray-500"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                                aria-hidden="true"
                                data-slot="icon"
                            >
                                <path
                                fill-rule="evenodd"
                                d="M3 4.25A2.25 2.25 0 0 1 5.25 2h5.5A2.25 2.25 0 0 1 13 4.25v2a.75.75 0 0 1-1.5 0v-2a.75.75 0 0 0-.75-.75h-5.5a.75.75 0 0 0-.75.75v11.5c0 .414.336.75.75.75h5.5a.75.75 0 0 0 .75-.75v-2a.75.75 0 0 1 1.5 0v2A2.25 2.25 0 0 1 10.75 18h-5.5A2.25 2.25 0 0 1 3 15.75V4.25Z"
                                clip-rule="evenodd"
                                />
                                <path
                                fill-rule="evenodd"
                                d="M19 10a.75.75 0 0 0-.75-.75H8.704l1.048-.943a.75.75 0 1 0-1.004-1.114l-2.5 2.25a.75.75 0 0 0 0 1.114l2.5 2.25a.75.75 0 1 0 1.004-1.114l-1.048-.943h9.546A.75.75 0 0 0 19 10Z"
                                clip-rule="evenodd"
                                />
                            </svg>
                            <span
                                class="fi-dropdown-list-item-label flex-1 truncate text-start text-gray-700 dark:text-gray-200"
                            >
                                로그아웃
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </nav>
</div>
