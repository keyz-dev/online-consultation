<aside id="sidebar" class="h-[100vh] top-0 bg-white">
    <ul>
        <h2 class="text-lg py-2 text-secondary">Main</h2>
        <x-dashboard.sidebar_list
            route="dashboard.patient"
            title="Dashboard"
            svg="dashboard" />
        <x-dashboard.sidebar_list
            route="home.index"
            title="Home"
            svg="home" />
        <x-dashboard.sidebar_list
            route="dashboard.patient"
            title="My Appointment"
            svg="patient" />
        <x-dashboard.sidebar_list
            route="dashboard.patient"
            title="Chats"
            svg="error" />
        <x-dashboard.sidebar_list
            route="dashboard.patient"
            title="Calls"
            svg="lock_open" />
        <x-dashboard.sidebar_list
            route="dashboard.patient"
            title="Profile"
            svg="profile" />
    </ul>
</aside>
