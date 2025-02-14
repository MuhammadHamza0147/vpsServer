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
                            <h2 class="title-1">Server Activities</h2>
                        </div>
                    </div>
                </div>

                <div class="row m-t-30">
                    <div class="col-md-12">
                        <!-- DATA TABLE-->
                        <div class="table-responsive m-b-40 ">
                            <table class="table table-striped table-data3 table-act ">
                                <thead class="">
                                    <tr>
                                        <th>ID</th>
                                        <th>Server ID</th>
                                        <th>User ID</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
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

    async function fetchServerDetail() {
        try {
            const response = await fetch(`${BASE_URL}/server-activities?page=1&pageSize=100`, requestOptions);
            if (response.ok) {
                const result = await response.json();
                populateTable(result.items);
            } else {
                console.error("Error:", response.statusText);
            }
        } catch (error) {
            console.error("Fetch error:", error);
        }
    }

    function populateTable(data) {
        const tableBody = document.querySelector(".table-act tbody");
        tableBody.innerHTML = "";
        data.forEach((item, index) => {
            const row = `
                <tr class="bg-primary text-white">
                    <td >${item.id ?? '-'}</td>
                    <td >${item.serverId ?? '-'}</td>
                    <td>${item.userId ?? '-'}</td>
                    <td class="text-uppercase">${item.type ?? '-'}</td>
                    <td class="text-uppercase">${item.status ?? '-'}</td>
                    <td>${item.title ?? '-'}</td>
                    <td>${item.description ?? '-'}</td>
                    <td>${item.createdDate ?? '-'}</td>
                </tr>
            `;
            tableBody.insertAdjacentHTML("beforeend", row);
        });
    }

    function toggleDetails(index) {
        const detailsRow = document.getElementById(`details-${index}`);
        if (detailsRow.style.display === "none") {
            detailsRow.style.display = "table-row";
        } else {
            detailsRow.style.display = "none";
        }
    }

    fetchServerDetail();
</script>

@endsection