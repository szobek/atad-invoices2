
import { Chart, registerables } from 'chart.js';
Chart.register(...registerables);
import {config_bar,config_line} from './config'

document.addEventListener('DOMContentLoaded', function () {
    const chart_bar = document.getElementById('chart_bar');
    const chart_line = document.getElementById('chart_line');

    if (!chart_bar||!chart_line) {
        return;
    }
   
    if (chart_bar) {
        new Chart(chart_bar, config_bar);
    }

    if (chart_line) {
        new Chart(chart_line, config_line);
    }
})