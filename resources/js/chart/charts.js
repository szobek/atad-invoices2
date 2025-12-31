
import { Chart, registerables } from 'chart.js';
Chart.register(...registerables);
import {config_bar,config_line,config_amount,config_donut} from './config'

document.addEventListener('DOMContentLoaded', function () {
    const chart_bar = document.getElementById('chart_bar');
    const chart_line = document.getElementById('chart_line');
    const chart_amount = document.getElementById('chart_amount');
    const chart_donut = document.getElementById('chart_donut');

    if (!chart_bar||!chart_line||!chart_amount||!chart_donut) {
        return;
    }
   
    if (chart_bar) {
        new Chart(chart_bar, config_bar);
    }

    if (chart_line) {
        new Chart(chart_line, config_line);
    }

    if (chart_amount) {
        new Chart(chart_amount, config_amount);
    }
    if (chart_donut) {
        new Chart(chart_donut, config_donut);
    }
})