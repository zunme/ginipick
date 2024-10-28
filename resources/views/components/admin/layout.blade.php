<!DOCTYPE html>
<html lang="ko" dir="ltr" class="fi min-h-screen">
  <head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>ADMIN - ginipick</title>

    <style>
      [x-cloak=""],
      [x-cloak="x-cloak"],
      [x-cloak="1"] {
        display: none !important;
      }

      @media (max-width: 1023px) {
        [x-cloak="-lg"] {
          display: none !important;
        }
      }

      @media (min-width: 1024px) {
        [x-cloak="lg"] {
          display: none !important;
        }
      }
    </style>

    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/483598c605.js" crossorigin="anonymous"></script>

    <link href="http://tall.taqcloud.xyz/css/filament/forms/forms.css?v=3.2.112.0" rel="stylesheet"  data-navigate-track />
    <link href="http://tall.taqcloud.xyz/css/filament/support/support.css?v=3.2.112.0" rel="stylesheet" data-navigate-track />
    <link href="http://tall.taqcloud.xyz/css/filament/filament/app.css?v=3.2.112.0" rel="stylesheet" data-navigate-track />
    
    <tallstackui:script /> 
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/default.js'])

    <style>
      :root {
        --danger-50: 254, 242, 242;
        --danger-100: 254, 226, 226;
        --danger-200: 254, 202, 202;
        --danger-300: 252, 165, 165;
        --danger-400: 248, 113, 113;
        --danger-500: 239, 68, 68;
        --danger-600: 220, 38, 38;
        --danger-700: 185, 28, 28;
        --danger-800: 153, 27, 27;
        --danger-900: 127, 29, 29;
        --danger-950: 69, 10, 10;
        --gray-50: 250, 250, 250;
        --gray-100: 244, 244, 245;
        --gray-200: 228, 228, 231;
        --gray-300: 212, 212, 216;
        --gray-400: 161, 161, 170;
        --gray-500: 113, 113, 122;
        --gray-600: 82, 82, 91;
        --gray-700: 63, 63, 70;
        --gray-800: 39, 39, 42;
        --gray-900: 24, 24, 27;
        --gray-950: 9, 9, 11;
        --info-50: 239, 246, 255;
        --info-100: 219, 234, 254;
        --info-200: 191, 219, 254;
        --info-300: 147, 197, 253;
        --info-400: 96, 165, 250;
        --info-500: 59, 130, 246;
        --info-600: 37, 99, 235;
        --info-700: 29, 78, 216;
        --info-800: 30, 64, 175;
        --info-900: 30, 58, 138;
        --info-950: 23, 37, 84;
        --primary-50: 255, 251, 235;
        --primary-100: 254, 243, 199;
        --primary-200: 253, 230, 138;
        --primary-300: 252, 211, 77;
        --primary-400: 251, 191, 36;
        --primary-500: 245, 158, 11;
        --primary-600: 217, 119, 6;
        --primary-700: 180, 83, 9;
        --primary-800: 146, 64, 14;
        --primary-900: 120, 53, 15;
        --primary-950: 69, 26, 3;
        --success-50: 240, 253, 244;
        --success-100: 220, 252, 231;
        --success-200: 187, 247, 208;
        --success-300: 134, 239, 172;
        --success-400: 74, 222, 128;
        --success-500: 34, 197, 94;
        --success-600: 22, 163, 74;
        --success-700: 21, 128, 61;
        --success-800: 22, 101, 52;
        --success-900: 20, 83, 45;
        --success-950: 5, 46, 22;
        --warning-50: 255, 251, 235;
        --warning-100: 254, 243, 199;
        --warning-200: 253, 230, 138;
        --warning-300: 252, 211, 77;
        --warning-400: 251, 191, 36;
        --warning-500: 245, 158, 11;
        --warning-600: 217, 119, 6;
        --warning-700: 180, 83, 9;
        --warning-800: 146, 64, 14;
        --warning-900: 120, 53, 15;
        --warning-950: 69, 26, 3;
        --font-family: "Inter";
        --sidebar-width: 16rem;
        --collapsed-sidebar-width: 4.5rem;
        --default-theme-mode: system;
      }
    </style>
    <script>
      const theme = localStorage.getItem("theme") ?? "system";
      if (
        theme === "dark" ||
        (theme === "system" &&
          window.matchMedia("(prefers-color-scheme: dark)").matches)
      ) {
        document.documentElement.classList.add("dark");
      }
    </script>
  </head>

  <body
    class="fi-body fi-panel-admin min-h-screen bg-gray-50 font-normal text-gray-950 antialiased dark:bg-gray-950 dark:text-white"
  >
    <div
      class="fi-layout flex min-h-screen w-full flex-row-reverse overflow-x-clip"
    >
      <!-- right -->
      <div
        x-data="{}"
        x-bind:style="'display: flex; opacity:1;'"
        class="fi-main-ctn w-screen flex-1 flex-col opacity-0"
      >
        <!-- nav -->
        <livewire:admin.navigation />
        <!-- / nav -->

        <main>{{$slot}}</main>
      </div>
      <!-- / right -->
      <div
        x-cloak
        x-data="{}"
        x-on:click="$store.sidebar.close()"
        x-show="$store.sidebar.isOpen"
        x-transition.opacity.300ms
        class="fi-sidebar-close-overlay fixed inset-0 z-30 bg-gray-950/50 transition duration-500 dark:bg-gray-950/75 lg:hidden"
      ></div>
      <!-- left -->
      <livewire:admin.side />
      <!-- / left -->
      <script>
        document.addEventListener("DOMContentLoaded", () => {
          setTimeout(() => {
            let activeSidebarItem = document.querySelector(
              ".fi-main-sidebar .fi-sidebar-item.fi-active"
            );

            if (!activeSidebarItem || activeSidebarItem.offsetParent === null) {
              activeSidebarItem = document.querySelector(
                ".fi-main-sidebar .fi-sidebar-group.fi-active"
              );
            }

            if (!activeSidebarItem || activeSidebarItem.offsetParent === null) {
              return;
            }

            const sidebarWrapper = document.querySelector(
              ".fi-main-sidebar .fi-sidebar-nav"
            );

            if (!sidebarWrapper) {
              return;
            }

            sidebarWrapper.scrollTo(
              0,
              activeSidebarItem.offsetTop - window.innerHeight / 2
            );
          }, 10);
        });
      </script>
    </div>
    <!--
    <div
      wire:snapshot='{
        "data":{
          "isFilamentNotificationsComponent":true,
          "notifications":[
            [],
            {
              "class":"Filament\\Notifications\\Collection",
              "s":"wrbl"
            }
          ]
        },
        "memo": {
          "id":"0Xvw4djQYkyEy6Aj8aCi",
          "name":"filament.livewire.notifications",
          "path":"admin",
          "method":"GET",
          "children":[],
          "scripts":[],
          "assets":[],
          "errors":[],
          "locale":"ko"
         },"checksum":"e799b9626ace12f06d148048deaa4da322a5132987bf6681a9785dbf43291bca"
      }'
      wire:effects='{"listeners":["notificationsSent","notificationSent","notificationClosed"]}'
      wire:id="0Xvw4djQYkyEy6Aj8aCi3"
      id="123"
      >
      <div
        class="fi-no pointer-events-none fixed inset-4 z-50 mx-auto flex gap-3 items-end flex-col-reverse justify-end"
        role="status"
        >
      </div>
      <div
        x-data="{}"
        x-init="
            window.addEventListener('EchoLoaded', () => {
                window.Echo.private('App.Models.User.1').notification((notification) => {
                    setTimeout(() => $wire.handleBroadcastNotification(notification), 500)
                })
            })

            if (window.Echo) {
                window.dispatchEvent(new CustomEvent('EchoLoaded'))
            }
        "
        >
      </div>
    </div>
    -->
    <div id="preloadshow" class="hidden" style="background-color: rgb(55 65 81 / 0.5);position:fixed; top:0; bottom:0; left:0;right:0;z-index:999999">
			<div class="loader_wrap"><span class="loader"></span></div>
		</div>
    <script>
        function _gotoLogin (){
          alertcall('권한이 없습니다.')
        }
        window.toast = function(payload){
            console.log( {
              text: payload.toast.title,
              duration: payload.toast.timeout,
              destination: "https://github.com/apvarun/toastify-js",
              newWindow: true,
              close: true,
              gravity: "top", // `top` or `bottom`
              position: "right", // `left`, `center` or `right`
              stopOnFocus: true, // Prevents dismissing of toast on hover
              
              style: {
                background: "white",
                color : "#333"
              },
              
              onClick: function(){} // Callback after click
            } )
            Toastify({
              text: payload.toast.title,
              duration: payload.toast.timeout,
              //destination: "https://github.com/apvarun/toastify-js",
              newWindow: true,
              close: true,
              gravity: "top", // `top` or `bottom`
              position: "right", // `left`, `center` or `right`
              stopOnFocus: true, // Prevents dismissing of toast on hover
              
              style: {
                background: "white",
                color : "#333"
              },
              
              onClick: function(){} // Callback after click
            }).showToast();
        }

        document.addEventListener('livewire:init', () => {
            Livewire.hook('request', ({fail}) => {
                fail(({status, content, preventDefault}) => {
                    try {
                        let result = JSON.parse(content);

                        if (result?.toast && typeof window.toast === "function") {
                            window.toast(result);
                        }

                        if ((result?.prevent_default ?? false) === true) {
                            preventDefault();
                        }
                    } catch (e) {
                        console.log(e)
                    }
                })
            })
        })
    </script>

    <script>
      window.filamentData = [];
    </script>

    <!-- x-ts-toast /  --> 
    @livewire('notifications')
    <!--
      new FilamentNotification()
      .title('Saved successfully')
      .send()
      -->
    <script src="http://tall.taqcloud.xyz/js/filament/notifications/notifications.js?v=3.2.112.0"></script>
    <script src="http://tall.taqcloud.xyz/js/filament/support/async-alpine.js?v=3.2.112.0"></script>
    <script src="http://tall.taqcloud.xyz/js/filament/support/support.js?v=3.2.112.0"></script>
    <script src="http://tall.taqcloud.xyz/js/filament/filament/echo.js?v=3.2.112.0"></script>
    <script src="http://tall.taqcloud.xyz/js/filament/filament/app.js?v=3.2.112.0"></script>

    <!-- Livewire Scripts -->

    @livewireScriptConfig 
  </body>
</html>
