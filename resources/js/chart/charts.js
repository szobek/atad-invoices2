import { Chart, registerables } from 'chart.js';
import { setBarConfig, setLineConfig, setAmountConfig, setDonutConfig } from './config';

Chart.register(...registerables);

const chartContainer = document.getElementById('chart-container');

document.addEventListener('DOMContentLoaded', function () {
     if (!chartContainer || typeof chartData === 'undefined') {
        console.warn('Chart container or chartData is missing');
        return;
    }

    const charts = [
        {
            id: 'chart_bar',
            config: setBarConfig,
            data: {
                invoices: chartData.bar_chart.normal,
                storno: chartData.bar_chart.storno
            }
        },
        {
            id: 'chart_line',
            config: setLineConfig,
            data: {
                invoices: chartData.bar_chart.normal,
                storno: chartData.bar_chart.storno
            }
        },
        {
            id: 'chart_amount',
            config: setAmountConfig,
            data: {
                invoices: chartData.amount_chart_data.normal,
                storno: chartData.amount_chart_data.storno
            }
        },
        {
            id: 'chart_donut',
            config: setDonutConfig,
            data: {
                invoices: chartData.donut_chart.invoices,
                storno: chartData.donut_chart.storno
            }
        }
    ];

    charts.forEach(({ id, config, data }) => {
        const canvas = createChartElement(id, data);
        try {
            new Chart(canvas, config());
        } catch (error) {
            console.error(`Failed to create chart ${id}:`, error);
        }
    });
});

const createChartElement = (id, dataObj) => {
    const chartCol = document.createElement('div');
    const chartDiv = document.createElement('div');
    const canvas = document.createElement('canvas');

    chartCol.className = 'col-md-6';
    chartDiv.className = 'chart';
    chartDiv.style.maxHeight = "300px";

    canvas.id = id;

    Object.entries(dataObj).forEach(([key, value]) => {
        canvas.dataset[key] = JSON.stringify(value);
    });

    chartDiv.appendChild(canvas);
    chartCol.appendChild(chartDiv);
    chartContainer.appendChild(chartCol);

    return canvas;
};