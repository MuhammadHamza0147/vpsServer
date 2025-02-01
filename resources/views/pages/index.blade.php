@extends('layout.main')
@section('content')
<div class="page-container">
    @include('component.navigation')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Dashboard</h2>
                        </div>
                    </div>
                </div>
                <div class="row m-t-25">
                    <div class="col-12 card p-4 mb-4">
                        <h3 class="font-weight-bold"><span class="points">0</span> Balance</h3>
                        <a href="{{url('credit')}}" class="text-primary">View balance detail</a>

                        <div class="row mt-3">
                            <div class="col-md-4 col-sm-6 mb-2">
                                <a href="{{url('servers')}}" class="btn btn-light btn-block">&#128187; Create VPS</a>
                            </div>
                            <div class="col-md-4 col-sm-6 mb-2">
                                <a href="{{url('credit')}}" class="btn btn-light btn-block">&#8644; Transaction</a>
                            </div>
                            <div class="col-md-4 col-sm-6 mb-2">
                                <a href="{{url('server/activities')}}" class="btn btn-light btn-block">&#128339; Activity</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row m-t-25">
                    <div class="col-12 card p-3 d-flex flex-row align-items-center justify-content-between">
                        <h3 class="font-weight-bold">My Server</h3>
                        <p>Total No. of VPS: <span class="total-vps">0</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const myHeaders = new Headers();
    myHeaders.append("Authorization", `Bearer ${token}`);

    const requestOptions = {
        method: "GET",
        headers: myHeaders,
        redirect: "follow",
    };

    async function fetchServers() {
        try {
            const response = await fetch(`${BASE_URL}/servers?page=1&pageSize=100`, requestOptions);

            if (!response.ok) {
                throw new Error(`Failed to fetch server data: ${response.statusText}`);
            }

            const data = await response.json();
            var totalServer = data['total'];
            document.querySelector('.total-vps').textContent = totalServer;
        } catch (error) {
            console.error("Error fetching server data:", error);
        }
    }

    async function fetchCredit() {
        try {
            const response = await fetch(`${BASE_URL}/apv/wallet?type=CREDIT`, requestOptions);
            if (response.ok) {
                const  items = await response.json(); 
                var points = items['balance'];
                document.querySelector('.points').textContent = points.toLocaleString();
            } else {
                console.error("Error:", response.statusText);
            }
        } catch (error) {
            console.error("Fetch error:", error);
        }
    }

    fetchCredit();
    fetchServers();
</script>
@endsection