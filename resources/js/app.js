import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

import { Chart, registerables } from 'chart.js';
Chart.register(...registerables);

document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('chart_transactions');

    const Utils = {
        CHART_COLORS: {
            red: 'rgb(255, 99, 132)',
            blue: 'rgb(54, 162, 235)',
            green: 'rgb(75, 192, 192)',
            yellow: 'rgb(255, 205, 86)',
            purple: 'rgb(153, 102, 255)',
            orange: 'rgb(255, 159, 64)',
        },
        labels: ['Január', 'Február', 'Március', 'Április', 'Május', 'Június', 'Július', 'Augusztus', 'Szeptember', 'Október', 'November', 'December']
    }

    const labels = Utils.labels;
    if (!ctx) {
        return;
    }
    const data = {
        labels: labels,
        datasets: [
            {
                label: 'számlák száma',
                data: JSON.parse(ctx.dataset.values),
                backgroundColor: Utils.CHART_COLORS.red,
            },
            {
                label: 'sztornó számlák',
                data: JSON.parse(ctx.dataset.storno),
                backgroundColor: Utils.CHART_COLORS.blue,
            },
            
            {
                label: 'lorem ipsum',
                data: JSON.parse(ctx.dataset.lorem),
                backgroundColor: Utils.CHART_COLORS.green,
            },


        ]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Számlák és sztornó számlák havi bontásban',
                },
            },
            responsive: true,
            scales: {
                x: {
                    stacked: true,
                },
                y: {
                    stacked: true
                }
            }
        }
    };
    if (ctx) {
        new Chart(ctx, config);
    }
})