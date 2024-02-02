<div>
   

    <div class="row">
   
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Per Tahun</h5>
                    <h5 class="card-text">{{ $totalPerYear }}</h5>
                </div>
            </div>
        </div>
        

      
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Avg Per Bulan</h5>
                    <h5 class="card-text">{{ $averagePerMonth }}</h5>
                </div>
            </div>
        </div>

       
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Avg Per Hari</h5>
                    <h5 class="card-text">{{ $averagePerDay }}</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Canvas -->
    <canvas id="myChart" width="500" height="400"></canvas>

    <script>
        document.addEventListener('livewire:load', function () {
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($bulan),
                    datasets: [
                        {
                            label: 'Member',
                            data: @json($data),
                            backgroundColor: 'rgba(0, 0, 255, 0.2)',
                            borderColor: 'rgba(0, 0, 255, 1)',
                            borderWidth: 1
                        },
                        {
                            type: 'line',
                            label: 'Line Dataset',
                            data: @json($data),
                            backgroundColor: 'rgba(255, 0, 0, 0.2)', // Ganti dengan warna latar belakang yang sesuai
                            borderColor: 'rgba(255, 0, 0, 1)', // Ganti dengan warna garis yang sesuai
                            borderWidth: 1
                        }
                    ],
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Total Member CRM Greenfields',
                            font: {
                                size: 25
                            },
                            padding: {
                                top: 10,
                                bottom: 30
                            }
                        },
                    }
                }
            });
        });
    </script>
    
    
</div>
