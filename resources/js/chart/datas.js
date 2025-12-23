import { Utils } from './utils.js'

const labels = Utils.labels;
const chart_bar = document.getElementById('chart_bar') || null;
let bar_data = {};
let line_data = {};
if (chart_bar) {

    bar_data = {
        labels: labels,
        datasets: [
            {
                label: 'számlák száma',
                data: JSON.parse(chart_bar.dataset.invoices) || "[]",
                backgroundColor: Utils.CHART_COLORS.red,
            },
            {
                label: 'sztornó számlák',
                data: JSON.parse(chart_bar.dataset.storno) || "[]",
                backgroundColor: Utils.CHART_COLORS.blue,
            },
        ]
    };
    line_data = {
        labels: labels,
        datasets: [
            {
                label: 'számlák száma',
                data: JSON.parse(chart_bar.dataset.invoices),
                backgroundColor: Utils.CHART_COLORS.red,
            },
            {
                label: 'sztornó számlák',
                data: JSON.parse(chart_bar.dataset.storno),
                backgroundColor: Utils.CHART_COLORS.blue,
            },




        ]
    };

}
export { bar_data, line_data }