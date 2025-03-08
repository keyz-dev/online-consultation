<aside id="sidebar" class="h-[100vh] top-0 bg-white">
    <ul>
        <h2 class="text-lg py-2 text-secondary">Main</h2>
        <x-dashboard.sidebar_list
            route="dashboard.doctor"
            title="Dashboard"
            svg="dashboard" />
        <x-dashboard.sidebar_list
            route="home.index"
            title="Home"
            svg="home" />
        <x-dashboard.sidebar_list
            route="dashboard.doctor.appointments"
            title="My Appointment"
            svg="calendar_month" />
        <x-dashboard.sidebar_list
            route="dashboard.doctor.patients"
            title="My Patients"
            svg="patient" />
        <x-dashboard.sidebar_list
            route="dashboard.doctor.availability"
            title="Availability"
            svg="timer" />
        <x-dashboard.sidebar_list
            route="dashboard.doctor.chats"
            title="Chats"
            svg="chats" />
        <x-dashboard.sidebar_list
            route="dashboard.doctor.calls"
            title="Calls"
            svg="phone" />
        <x-dashboard.sidebar_list
            route="dashboard.doctor.profile"
            title="Profile"
            svg="profile" />
    </ul>
</aside>
