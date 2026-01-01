
import { Chart, registerables } from 'chart.js';
Chart.register(...registerables);
import { setBarConfig, setLineConfig, setAmountConfig,setDonutConfig } from './config'
const chartContainer = document.getElementById('chart-container') || null;

document.addEventListener('DOMContentLoaded', function () {

    createChartElement('chart_bar', [
        { key: 'invoices', value: `[${chartData.bar_chart.normal}]` },
        { key: 'storno', value: `[${chartData.bar_chart.storno}]` }
    ]);

    createChartElement('chart_line', [
        { key: 'invoices', value: `[${chartData.bar_chart.normal}]` },
        { key: 'storno', value: `[${chartData.bar_chart.storno}]` }
    ]);

    createChartElement('chart_amount', [
        { key: 'invoices', value: `[${chartData.amount_chart_data.normal}]` },
        { key: 'storno', value: `[${chartData.amount_chart_data.storno}]` }
    ]);

    createChartElement('chart_donut',[
         { key: 'invoices', value: `[${chartData.donut_chart.invoices}]` },
        { key: 'storno', value: `[${chartData.donut_chart.storno}]` }
    ])


    waitForElement('#chart_bar').then((chart_bar) => {
        new Chart(chart_bar, setBarConfig());
    });
    waitForElement('#chart_line').then((chart_line) => {
        new Chart(chart_line, setLineConfig());
    });
    waitForElement('#chart_amount').then((chart_amount) => {
        new Chart(chart_amount, setAmountConfig());
    });
    waitForElement('#chart_donut').then((chartDonut)=>{
        new Chart(chartDonut,setDonutConfig())
    })

})

const waitForElement = (selector) => {
    return new Promise((resolve) => {
        if (document.querySelector(selector)) {
            return resolve(document.querySelector(selector));
        }

        const observer = new MutationObserver(() => {
            if (document.querySelector(selector)) {
                resolve(document.querySelector(selector));
                observer.disconnect();
            }
        });

        observer.observe(document.body, {
            childList: true,
            subtree: true
        });
    });
};

const createChartElement = (id, data,style=null) => {
    const chartCol=document.createElement('div')
    const chartdiv = document.createElement('div');
    const canvas = document.createElement('canvas');

    chartCol.classList.add('col-md-6');
    chartdiv.classList.add('chart')
    if(style){
         Object.assign(chartdiv.style, style);
    }
    canvas.id = id;
    chartdiv.style.maxHeight="300px"
    for (const row of data) {
        canvas.dataset[row.key] = row.value;
    }

    chartCol.appendChild(chartdiv)
    chartdiv.appendChild(canvas);
    chartContainer.appendChild(chartCol);
}