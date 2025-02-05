<aside id="sidebar" class="sticky overflow-auto h-100vh top-0 bg-white rounded-r-lg"> 
    <ul>
        <h2 class="text-lg py-2 text-secondary">Main</h2>
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
            ]
        @endphp

        <x-dashboard.sidebar_btn
            title='Specialites'
            svg='category'
            route='dashboard.admin.specialties*'
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
                'Create' => 'dashboard.admin.q_and_a.create',
            ]
        @endphp
         <x-dashboard.sidebar_btn
            title='Q and As'
            svg='help'
            route='dashboard.admin.q_and_as*'
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
            svg='chats'
        />

        <x-dashboard.sidebar_list
            route='dashboard.admin.calls'
            title='Calls'
            svg='phone'
        />

        @php
            $anchors = [
                'All' => 'dashboard.admin.symptoms',
                'Create' => 'dashboard.admin.symptom.create',
            ]
        @endphp
        <x-dashboard.sidebar_btn
            title='Health Symptoms'
            svg='cognition'
            route='dashboard.admin.symptom*'
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