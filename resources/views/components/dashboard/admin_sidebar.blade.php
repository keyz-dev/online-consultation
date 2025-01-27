<aside id="sidebar" class="sticky overflow-auto h-100vh top-0 bg-white"> 
    <ul>
        <li>
            <a href="{{route('dashboard.admin')}}" class="">
                <x-logo :logo="$logo" />
            </a>
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
        route='dashboard.admin.doctors'
        title='Doctors'
        svg='doctor'
        />
        
        <x-dashboard.sidebar_list
        route='dashboard.admin.patients'
        title='Patients'
        svg='patient'
        />

        @php
            $anchors = [
                'All' => 'dashboard.admin.specialties',
                'Create' => 'dashboard.admin.specialty.create',
                'Edit' => 'dashboard.admin.specialty.create'
            ]
        @endphp

        <x-dashboard.sidebar_btn
            title='Specialites'
            svg='category'
            :anchors="$anchors"
        />

        <x-dashboard.sidebar_list
            route='dashboard.admin.appointments'
            title='Appointments'
            svg='calendar_month'
        />

        @php
            $anchors = [
                'All' => 'dashboard.admin.q_and_as',
                'Create' => 'dashboard.admin.q_and_as.create',
                'Edit' => 'dashboard.admin.q_and_as.create'
            ]
        @endphp
         <x-dashboard.sidebar_btn
            title='Q and As'
            svg='help'
            :anchors="$anchors"
        />

        <x-dashboard.sidebar_list
            route='dashboard.admin.consultations'
            title='Consultations'
            svg='monitoring'
        />

        <x-dashboard.sidebar_list
            route='dashboard.admin.chats'
            title='Chats'
            svg='checklist'
        />

        @php
            $anchors = [
                'All' => 'dashboard.admin.symptoms',
                'Create' => 'dashboard.admin.symptoms.create',
                'Edit' => 'dashboard.admin.symptoms.create'
            ]
        @endphp
        <x-dashboard.sidebar_btn
            title='Common Symptoms'
            svg='cognition'
            :anchors="$anchors"
        />

        <x-dashboard.sidebar_list
            route='dashboard.admin.notifications'
            title='Notifications'
            svg='notifications'
        />
        
        <x-dashboard.sidebar_list
            route='dashboard.admin.testimonials'
            title='Testimonials'
            svg='drafts'
        />

        <x-dashboard.sidebar_list
            route='dashboard.admin.profile'
            title='Profile'
            svg='profile'
        />
    </ul>
</aside>