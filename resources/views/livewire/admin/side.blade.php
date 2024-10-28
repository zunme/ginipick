    <aside
        x-data="{}"
        x-cloak="-lg"
        x-bind:class="
                $store.sidebar.isOpen
                ? 'fi-sidebar-open w-[--sidebar-width] translate-x-0 shadow-xl ring-1 ring-gray-950\/5 dark:ring-white\/10 rtl:-translate-x-0 lg:sticky'                    : 'w-[--sidebar-width] -translate-x-full rtl:translate-x-full lg:sticky'
                "
        class="fi-sidebar fixed inset-y-0 start-0 z-30 flex flex-col h-screen content-start bg-white transition-all dark:bg-gray-900 lg:z-0 lg:bg-transparent lg:shadow-none lg:ring-0 lg:transition-none dark:lg:bg-transparent lg:translate-x-0 rtl:lg:-translate-x-0 fi-main-sidebar"
        >
        <div class="overflow-x-clip">
          <header
            class="fi-sidebar-header flex h-16 items-center bg-white px-6 ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10 lg:shadow-sm"
          >
            <div>
              <a href="http://ai.taqcloud.xyz/admin">
                <div
                  class="fi-logo flex text-xl font-bold leading-5 tracking-tight text-gray-950 dark:text-white"
                >
                  {{ config('app.name') }}
                </div>
              </a>
            </div>
          </header>
        </div>

        <nav
          class="fi-sidebar-nav flex-grow flex flex-col gap-y-2 overflow-y-auto overflow-x-hidden px-6 py-8"
          style="scrollbar-gutter: stable"
        >
          <ul class="fi-sidebar-nav-groups -mx-2 flex flex-col gap-y-2">

        <!-- menu -->
            @foreach($menus as $menu)
                @if( $menu->type=='item')
                    <x-admin.sidebar.item :item="$menu"/>
                @else
                    <x-admin.sidebar.group :item="$menu"/>
                @endif
                
            @endforeach
        <!-- /menu -->
          </ul>

          <script>
            collapsedGroups = JSON.parse(
              localStorage.getItem("collapsedGroups")
            );

            document.querySelectorAll(".fi-sidebar-group").forEach((group) => {
              if (!collapsedGroups.includes(group.dataset.groupLabel)) {
                return;
              }

              // Alpine.js loads too slow, so attempt to hide a
              // collapsed sidebar group earlier.
              group.querySelector(".fi-sidebar-group-items").style.display =
                "none";
              group
                .querySelector(".fi-sidebar-group-collapse-button")
                .classList.add("rotate-180");
            });
          </script>
        </nav>
      </aside>