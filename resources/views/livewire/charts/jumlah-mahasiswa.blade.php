<div id="chart"></div>

@script
<script>
    document.addEventListener('livewire:initialized', () => {
        window.chartData = {
            data: @json($data),
            data_2: @json($data_2),
        };
        window.renderChart1();
    });

    Livewire.on('refreshData', (data, data_2) => {
        window.chartData = data;
        window.renderChart1();
    });

</script>
@endscript