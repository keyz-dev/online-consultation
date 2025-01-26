<aside id="sidebar" class="sticky overflow-auto h-100vh top-0 bg-white"> 
    <ul>
        <li>
            <x-logo :logo="$logo" />
            <button onclick=toggleSideBar() id="toggle-btn">
                {!! file_get_contents(public_path('icons/keyboard_double_arrow_left.svg')) !!}
            </button>
        </li>
        
        <x-dashboard.sidebar_list
            route='dashboard.admin'
            title='Dashboard'
            svg='dashboard'
        />
        
        <x-dashboard.sidebar_list
        route='home.index'
        title='Home'
        svg='home'
        />
        
        <x-dashboard.sidebar_list
        route='home.index'
        title='Doctors'
        svg='doctor'
        />
        
        <x-dashboard.sidebar_list
        route='home.index'
        title='Patients'
        svg='patient'
        />

        @php
            $anchors = [
                'All' => 'dashboard.admin',
                'Create' => 'dashboard.admin',
                'Edit' => 'dashboard.admin'
            ]
        @endphp

        <x-dashboard.sidebar_btn
            title='Specialites'
            svg='category'
            :anchors="$anchors"
        />

        <x-dashboard.sidebar_list
            route='home.index'
            title='Appointments'
            svg='calendar_month'
        />

        <x-dashboard.sidebar_list
            route='home.index'
            title='Q and As'
            svg='help'
        />

        <x-dashboard.sidebar_list
            route='home.index'
            title='Consultations'
            svg='monitoring'
        />

        <x-dashboard.sidebar_list
            route='home.index'
            title='Chats'
            svg='checklist'
        />

        <x-dashboard.sidebar_list
            route='home.index'
            title='Common Symptoms'
            svg='cognition'
        />

        <x-dashboard.sidebar_list
            route='home.index'
            title='Notifications'
            svg='notifications'
        />
        
        <x-dashboard.sidebar_list
            route='home.index'
            title='Testimonials'
            svg='drafts'
        />

        <x-dashboard.sidebar_list
            route='home.index'
            title='Settings'
            svg='setting'
        />
        
        <x-dashboard.sidebar_list
            route='home.index'
            title='Profile'
            svg='profile'
        />

        {{-- <li title="Products">
           <button onclick=toggleSubMenu(this) class="dropdown-btn">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M520-600v-240h320v240H520ZM120-440v-400h320v400H120Zm400 320v-400h320v400H520Zm-400 0v-240h320v240H120Zm80-400h160v-240H200v240Zm400 320h160v-240H600v240Zm0-480h160v-80H600v80ZM200-200h160v-80H200v80Zm160-320Zm240-160Zm0 240ZM360-280Z"/></svg>
            <span>Products</span>
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z"/></svg>
           </button>
           <ul class="sub-menu">
                <div>
                    <li class={{Route::is('dashboard.admin') ? 'active': ''}}>
                        <a href="{{route('dashboard.admin')}}">All</a>
                    </li>
                    <li class={{Route::is('product.create') ? 'active': ''}}>
                        <a href="{{route('product.create')}}">Create</a>
                    </li>
                </div>
           </ul>
        </li>

        <li class="{{Route::is('dashboard.users') ? 'active' : ''}}" title="Users">
            <a href="{{route('dashboard.users')}}">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M40-160v-112q0-34 17.5-62.5T104-378q62-31 126-46.5T360-440q66 0 130 15.5T616-378q29 15 46.5 43.5T680-272v112H40Zm720 0v-120q0-44-24.5-84.5T666-434q51 6 96 20.5t84 35.5q36 20 55 44.5t19 53.5v120H760ZM360-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm400-160q0 66-47 113t-113 47q-11 0-28-2.5t-28-5.5q27-32 41.5-71t14.5-81q0-42-14.5-81T544-792q14-5 28-6.5t28-1.5q66 0 113 47t47 113ZM120-240h480v-32q0-11-5.5-20T580-306q-54-27-109-40.5T360-360q-56 0-111 13.5T140-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T440-640q0-33-23.5-56.5T360-720q-33 0-56.5 23.5T280-640q0 33 23.5 56.5T360-560Zm0 320Zm0-400Z"/></svg>
                <span>Users</span>
            </a>
        </li>
        <li class="{{Route::is('dashboard.orders')? 'active' : ''}}" title="Orders">
            <a href="{{route('dashboard.orders')}}">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="m260-520 220-360 220 360H260ZM700-80q-75 0-127.5-52.5T520-260q0-75 52.5-127.5T700-440q75 0 127.5 52.5T880-260q0 75-52.5 127.5T700-80Zm-580-20v-320h320v320H120Zm580-60q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29Zm-500-20h160v-160H200v160Zm202-420h156l-78-126-78 126Zm78 0ZM360-340Zm340 80Z"/></svg>
                <span>Orders</span>
            </a>
        </li>
        <li title="Categories">
            <button onclick=toggleSubMenu(this) class="dropdown-btn">
             <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M222-200 80-342l56-56 85 85 170-170 56 57-225 226Zm0-320L80-662l56-56 85 85 170-170 56 57-225 226Zm298 240v-80h360v80H520Zm0-320v-80h360v80H520Z"/></svg>
             <span>Categories</span>
             <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z"/></svg>
            </button>
            
            <ul class="sub-menu">
                 <div>
                     <li class="{{Route::is('dashboard.categories')? 'active' : ''}}">
                         <a href="{{route('dashboard.categories')}}">All</a>
                     </li>
                     <li>
                         <a href="#">Human Hair</a>
                     </li>
                     <li>
                         <a href="">Virgin Hair</a>
                     </li>
                     <li>
                         <a href="">Capless Wigs</a>
                     </li>
                 </div>
            </ul>
         </li> --}}
        
    </ul>
</aside>