<script>
    const token = localStorage.getItem('token');
    const API_URL = '{{ env("API_BASE_URL") }}/apv';
    const BASE_URL = '{{ env("API_BASE_URL") }}';

    if (!token) window.location = '/login';

    async function getProfile() {
        try {
            if (!token) {
                console.error('Token is missing!');
                return;
            }

            const response = await fetch(`${API_URL}/profile`, {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${token}`,
                }
            });

            if (response.ok) {
                const data = await response.json();
                const profile = data.profile || {};

                const nameElement = document.querySelector('.name');
                const emailElement = document.querySelector('.email_address');
                const firstNameInput = document.getElementById('firstName');
                const genderInput = document.getElementById('gender');

                if (nameElement) nameElement.innerHTML = profile.firstName || '-';
                if (emailElement) emailElement.innerHTML = data.email || '-';
                if (firstNameInput) firstNameInput.value = profile.firstName || '';
                if (genderInput) {
                    let gender = 0;
                    if (profile.gender === 'FEMALE') gender = 1;
                    if (profile.gender === 'OTHER') gender = 2;
                    genderInput.value = gender;
                }
            } else {
                const error = await response.json();
                showAlert(`Error: ${error.message}`);
            }
        } catch (err) {
            console.error('Error fetching profile:', err);
        }
    }

    getProfile();

    function logout() {
        localStorage.removeItem('token');
        window.location = '/login';
    }

    async function handleSearch(event) {
        event.preventDefault();
        const query = document.querySelector('input[name="query"]').value.trim();

        if (!query) {
            alert('Please enter a search query.');
            return;
        }

        try {
            const response = await fetch(`${API_URL}/search?query=${encodeURIComponent(query)}`, {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${token}`,
                }
            });

            if (response.ok) {
                const results = await response.json();
                console.log('Search Results:', results);
                // You can display results here (e.g., redirect to a results page or show them in a dropdown)
                alert(`Search results for "${query}" have been fetched. Check console for details.`);
            } else {
                const error = await response.json();
                console.error('Search Error:', error.message);
                alert('Error fetching search results.');
            }
        } catch (err) {
            console.error('Error during search:', err);
        }
    }
</script>

<!-- HEADER DESKTOP-->
<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap d-flex justify-content-between align-items-center">
                <!-- Search Bar -->
                <div class="search-bar">
                    <form class="d-flex align-items-center" onsubmit="handleSearch(event)">
                        <input 
                            type="text" 
                            class="form-control" 
                            name="query" 
                            placeholder="Search..." 
                            style="border-radius: 20px; padding: 5px 15px; width: 300px;"
                        />
                        <button 
                            type="submit" 
                            class="btn btn-primary ml-2" 
                            style="border-radius: 20px; height: 38px;"
                        >
                            <i class="zmdi zmdi-search"></i>
                        </button>
                    </form>
                </div>

                <div class="header-button">
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="{{asset('asset/images/icon/avatar-01.jpg')}}" alt="John Doe" />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn name" href="{{url('profile')}}"></a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="{{url('profile')}}">
                                            <img src="{{asset('asset/images/icon/avatar-01.jpg')}}" alt="John Doe" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <a href="{{url('profile')}}">
                                            <span class="email email_address"></span>
                                        </a>
                                    </div>
                                </div>

                                <div class="account-dropdown__footer">
                                    <a href="#" id="logout" onclick="logout()">
                                        <i class="zmdi zmdi-power"></i>
                                        Logout
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- HEADER DESKTOP-->



<!-- <script>
    const token = localStorage.getItem('token');
    const API_URL = '{{ env("API_BASE_URL") }}/apv';
    const BASE_URL = '{{ env("API_BASE_URL")}}';
    if(!token) window.location = '/login';
    
    async function getProfile() {
        try {
            if (!token) {
                console.error('Token is missing!');
                return;
            }

            const response = await fetch(`${API_URL}/profile`, {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${token}`,
                }
            });

            if (response.ok) {
                const data = await response.json();
                const profile = data.profile || {};

                const nameElement = document.querySelector('.name');
                const emailElement = document.querySelector('.email_address');
                const firstNameInput = document.getElementById('firstName');
                const genderInput = document.getElementById('gender');

                if (nameElement) nameElement.innerHTML = profile.firstName || '-';
                if (emailElement) emailElement.innerHTML = data.email || '-';
                if (firstNameInput) firstNameInput.value = profile.firstName || '';
                if (genderInput) {
                    let gender = 0;
                    if (profile.gender === 'FEMALE') gender = 1;
                    if (profile.gender === 'OTHER') gender = 2;
                    genderInput.value = gender;
                }
            } else {
                const error = await response.json();
                showAlert(`Error: ${error.message}`);
            }
        } catch (err) {
            console.error('Error fetching profile:', err);
        }
    }

    getProfile();

    function logout(){
        localStorage.removeItem('token');
        window.location = '/login';
    }
</script> -->

<!-- HEADER DESKTOP-->
<!-- <header class="header-desktop">
<div class="section__content section__content--p30">
        <div class="container-fluid">          
             <div class="header-wrap justify-content-between align-items-center"> -->
                 <!-- Search Bar -->
                 <!-- <div class="search-bar">
                    <form class="d-flex align-items-center" action="/search" method="GET">
                        <input 
                            type="text" 
                            class="form-control" 
                            name="query" 
                            placeholder="Search..." 
                            style="border-radius: 20px; padding: 5px 15px; width: 300px;"
                        />
                        <button 
                            type="submit" 
                            class="btn btn-primary ml-2" 
                            style="border-radius: 20px; height: 38px;"
                        >
                            <i class="zmdi zmdi-search"></i>
                        </button>
                    </form>
                </div>
                
                <div class="header-button">
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="{{asset('asset/images/icon/avatar-01.jpg')}}" alt="John Doe" />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn name" href="{{url('profile')}}"></a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="{{url('profile')}}">
                                            <img src="{{asset('asset/images/icon/avatar-01.jpg')}}" alt="John Doe" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <a href="{{url('profile')}}">
                                            <span class="email email_address"></span>
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="account-dropdown__footer">
                                    <a href="#" id="logout" onclick="logout()">
                                        <i class="zmdi zmdi-power"></i>
                                        Logout
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header> -->
<!-- HEADER DESKTOP -->