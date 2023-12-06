
<div class="antialiased bg-gray-100 dark-mode:bg-gray-900">
  <div class="w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800">
    <div x-data="{ open: true }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
      <div class="flex flex-row items-center justify-between p-4">
        <a href="#" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">Online Download</a>
        
        
        
        <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
          <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
            <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
          </svg>
        </button>
      </div>
      
      <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow hidden pb-4 md:pb-0 md:flex md:justify-end md:flex-row">
    <div x-data="{ openSearch: false }" class="md:flex md:items-center md:justify-end">
            <!-- Search field for desktop -->
            <div class=" md:block">
                <input type="text" class="p-2 border rounded" placeholder="Search...">
            </div>
        </div>


        <ul class="flex flex-wrap items-center font-medium text-sm">
                <?php foreach ($mainNav as $mainNav): ?>
                    <li class="p-4 lg:px-8 relative flex items-center space-x-1" x-data="{ open: false }"
                    @mouseenter="open = true" @mouseleave="open = false">
                    <a class="text-slate-800 hover:text-slate-900" href="#0" :aria-expanded="open"><?php echo $mainNav["nav_title"]; ?></a>
                    <button class="shrink-0 p-1" :aria-expanded="open" @click.prevent="open = !open">
                        <span class="sr-only">Show submenu for "<?php echo $mainNav["nav_title"]; ?>"</span>
                        <svg class="w-3 h-3 fill-slate-500" xmlns="http://www.w3.org/2000/svg" width="12" height="12">
                            <path d="M10 2.586 11.414 4 6 9.414.586 4 2 2.586l4 4z" />
                        </svg>
                    </button>
                    <!-- 2nd level menu -->
                    <ul
                        class="origin-top-right absolute top-full left-1/2 -translate-x-1/2 min-w-[240px] bg-white border border-slate-200 p-2 rounded-lg shadow-xl [&[x-cloak]]:hidden"
                        x-show="open" x-transition:enter="transition ease-out duration-200 transform"
                        x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-out duration-200" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0" x-cloak
                        @focusout="await $nextTick();!$el.contains($focus.focused()) && (open = false)">
                            <?php foreach ($mainNav["subnav"] as $subnavItem): ?>
                                <li>
                                <a class="text-slate-800 hover:bg-slate-50 flex items-center p-2" href="<?php echo base_url('Welcome/product/') . urlencode(str_replace(' ', '-', $subnavItem["subnav_title"])); ?>">
                                        <div class="flex items-center justify-center bg-white border border-slate-200 rounded shadow-sm h-7 w-7 shrink-0 mr-3">
                                            <svg class="fill-indigo-500" xmlns="http://www.w3.org/2000/svg" width="12" height="12">
                                                <!-- Add your SVG path here -->
                                            </svg>
                                        </div>
                                        <span class="whitespace-nowrap"><?php echo $subnavItem["subnav_title"]; ?></span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
        </div>
    </div>
    </div>