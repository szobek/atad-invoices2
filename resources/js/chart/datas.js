import { Utils } from './utils.js'

const labels = Utils.labels;
const chart_bar = document.getElementById('chart_bar') || null;
const chart_amount = document.getElementById('chart_amount') || null;
let bar_data = {};
let line_data = {};
let amount_data={};
if (chart_bar) {

    bar_data = {
        labels: labels,
        datasets: [
            {
                label: 'kimenő számlák száma',
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
                label: 'kimenő számlák száma',
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
    amount_data={
        labels,
        datasets: [
            {
                label: 'kimenő számlák összege',    
                data: JSON.parse(chart_amount.dataset.invoices_amount) || "[]",
                backgroundColor: Utils.CHART_COLORS.red,
            },
            {
                label: 'sztornó számlák összege',
                data: JSON.parse(chart_amount.dataset.storno_amount) || "[]",
                backgroundColor: Utils.CHART_COLORS.blue,
            },
        ]
    };
}
export { bar_data, line_data, amount_data }