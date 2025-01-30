<aside id="sidebar" class="h-[100vh] top-0 bg-white">
    <ul>
        <li>
            <x-logo :logo="$logo" />
            <button onclick=toggleSideBar() id="toggle-btn">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                    <path d="M440-240 200-480l240-240 56 56-183 184 183 184-56 56Zm264 0L464-480l240-240 56 56-183 184 183 184-56 56Z" />
                </svg>
            </button>
        </li>

        <x-dashboard.sidebar_list
            route="dashboard.doctor"
            title="Dashboard"
            svg="dashboard" />
        <x-dashboard.sidebar_list
            route="/"
            title="Home"
            svg="home" />
        <x-dashboard.sidebar_list
            route="home.index"
            title="My Appointment"
            svg="patient" />
        <x-dashboard.sidebar_list
            route="home.index"
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
