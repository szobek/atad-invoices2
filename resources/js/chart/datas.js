import { Utils } from './utils.js'

const labels = Utils.labels;
const bar_data = {
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

        {
            label: 'lorem ipsum',
            data: JSON.parse(chart_bar.dataset.lorem),
            backgroundColor: Utils.CHART_COLORS.green,
        },


    ]
};
const line_data = {
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

export { bar_data,line_data }