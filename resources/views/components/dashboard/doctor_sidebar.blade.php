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
            route="home.index"
            title="My Appointment"
            svg="patient" />
        <x-dashboard.sidebar_list
            route="dashboard.doctor.availability"
            title="Availability"
            svg="doctor" />
        <x-dashboard.sidebar_list
            route="home.index"
            title="Chats"
            svg="error" />
        <x-dashboard.sidebar_list
            route="home.index"
            title="Calls"
            svg="lock_open" />
        <x-dashboard.sidebar_list
            route="home.index"
            title="Profile"
            svg="profile" />
    </ul>
</aside>
