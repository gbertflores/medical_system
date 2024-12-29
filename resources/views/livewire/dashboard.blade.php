<div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-2-5 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <img src="{{ asset('assets') }}/img/zppsu-logo.png" class="h-70-p" alt="main_logo">
                        </div>
                        <div class="text-end pt-2">
                            <h5 class="mb-0">3,462</h4>
                            <p class="mb-0 text-xxs">Students Registered</p>
                        </div>
                    </div>
                    <div class="card-footer pt-0 pb-3">
                        <p class="mb-0 text-sm text-bold">Main Campus</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2-5 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <img src="{{ asset('assets') }}/img/zppsu-campuses/kabasalan.png" class="h-70-p" alt="main_logo">
                        </div>
                        <div class="text-end pt-2">
                            <h5 class="mb-0">53k</h4>
                            <p class="mb-0 text-xxs">Students Registered</p>
                        </div>
                    </div>
                    <div class="card-footer pt-0 pb-3">
                        <p class="mb-0 text-sm text-bold">Kabasalan Campus</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2-5 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <img src="{{ asset('assets') }}/img/zppsu-campuses/malangas.png" class="h-70-p" alt="main_logo">
                        </div>
                        <div class="text-end pt-2">
                            <h5 class="mb-0">53k</h4>
                            <p class="mb-0 text-xxs">Students Registered</p>
                        </div>
                    </div>
                    <div class="card-footer pt-0 pb-3">
                        <p class="mb-0 text-sm text-bold">Malangas Campus</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2-5 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <img src="{{ asset('assets') }}/img/zppsu-campuses/siay.png" class="h-70-p" alt="main_logo">
                        </div>
                        <div class="text-end pt-2">
                            <h5 class="mb-0">2,300</h4>
                            <p class="mb-0 text-xxs">Students Registered</p>
                        </div>
                    </div>
                    <div class="card-footer pt-0 pb-3">
                        <p class="mb-0 text-sm text-bold">Siay Campus</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2-5 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <img src="{{ asset('assets') }}/img/zppsu-campuses/vitali.png" class="h-70-p" alt="main_logo">
                        </div>
                        <div class="text-end pt-2">
                            <h5 class="mb-0">3,462</h4>
                            <p class="mb-0 text-xxs">Students Registered</p>
                        </div>
                    </div>
                    <div class="card-footer pt-0 pb-3">
                        <p class="mb-0 text-sm text-bold">Vitali Campus</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
            <div class="card z-index-2">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                    <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                        <div class="chart">
                            <canvas id="chart-bar-stacked" class="chart-canvas" height="170"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="mb-0"> Healthy Students </h6>
                    <hr class="dark horizontal">
                </div>
            </div>
        </div>
        </div>
    </div>
    @if($first_access)
    <div class="modal fade" id="autoOpenModal" tabindex="-1" aria-labelledby="autoOpenModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="autoOpenModalLabel">Welcome to ZPPSU MedEx</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Would you like to book an appointment for a medical examination?
                </div>
                <div class="modal-footer">
                    <!-- Close Button -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    
                    <!-- Book Now Button -->
                    <a href="/book-appointment" class="btn btn-primary">Book Now</a>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

@push('js')
<script src="{{ asset('assets') }}/js/plugins/chartjs.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var myModal = new bootstrap.Modal(document.getElementById('autoOpenModal'));
        myModal.show();
    });
    var ctx = document.getElementById("chart-bar-stacked").getContext("2d");

    new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["M", "T", "W", "T", "F", "S", "S"],
            datasets: [
            {
                label: 'Male',
                tension: 0.4,
                borderWidth: 0,
                borderSkipped: false,
                data: [12, 19, 3, 5, 2, 3, 7],
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                maxBarThickness: 12
            },
            {
                label: 'Female',
                tension: 0.4,
                borderWidth: 0,
                borderSkipped: false,
                data: [8, 11, 7, 6, 4, 5, 8],
                backgroundColor: 'rgba(153, 102, 255, 0.6)',
                maxBarThickness: 12
            },
        ],
        },
        options: {
            plugins: {
                maintainAspectRatio: false,
                legend: {
                    display: true,
                    position: 'top',
                },
            },
            responsive: true,
                scales: {
                    y: {
                    stacked: true,
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: 500,
                            beginAtZero: true,
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                            color: "#fff"
                        },
                    },
                    x: {
                    stacked: true,
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
        }
    });

</script>
@endpush
