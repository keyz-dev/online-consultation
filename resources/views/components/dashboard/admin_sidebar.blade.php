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
    </ul>
</aside>