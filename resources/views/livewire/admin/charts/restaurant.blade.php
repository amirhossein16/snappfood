<div>
    <canvas id="RestaurantChart" height="100px"></canvas>

    <script type="text/javascript">

        var Restauranrlabels =  {{ Js::from($RestaurantchartJs['labels']) }};
        var Restaurantusers =  {{ Js::from($RestaurantchartJs['data']) }};

        const Restaurantdata = {
            labels: Restauranrlabels,
            datasets: [{
                label: 'Restaurant Charts',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: Restaurantusers,
            }]
        };

        const Restaurantconfig = {
            type: 'line',
            data: Restaurantdata,
            options: {}
        };

        const myChart = new Chart(
            document.getElementById('RestaurantChart'),
            Restaurantconfig
        );

    </script>
</div>
