import { Utils } from './utils.js'

const labels = Utils.labels;
const setBarData = () => {
    const chartBar = document.getElementById('chart_bar') || null;
    return {
        labels: labels,
        datasets: [
            {
                label: 'kimenő számlák száma',
                data: JSON.parse(chartBar.dataset.invoices||"[]"),
                backgroundColor: Utils.CHART_COLORS.red,
            },
            {
                label: 'sztornó számlák',
                data: JSON.parse(chartBar.dataset.storno||"[]"),
                backgroundColor: Utils.CHART_COLORS.blue,
            },
        ]
    };
}
const setLineData = () => {
    const chartBar = document.getElementById('chart_bar') || null;
    return {
        labels: labels,
        datasets: [
            {
                label: 'kimenő számlák száma',
                data: JSON.parse(chartBar.dataset.invoices||"[]"),
                backgroundColor: Utils.CHART_COLORS.red,
                lineTension: 0.1,
            },
            {
                label: 'sztornó számlák',
                data: JSON.parse(chartBar.dataset.storno||"[]"),
                backgroundColor: Utils.CHART_COLORS.blue,
                lineTension: 0.1,
            },
        ]
    };
}
const setAmountData = () => {
    const chartAmount = document.getElementById('chart_amount') || null;
    return {
        labels: labels,
        datasets: [
            {
                label: 'kimenő számlák összege',
                data: JSON.parse(chartAmount.dataset.invoices||"[]"),
                backgroundColor: Utils.CHART_COLORS.green,
            },
            {
                label: 'sztornó számlák összege',
                data: JSON.parse(chartAmount.dataset.storno||"[]"),
                backgroundColor: Utils.CHART_COLORS.orange,
            },
        ]
    };
}

const setDonutData =()=>{
    const chartDonut=document.getElementById('chart_donut')
    return {
        labels: ['Kimenő számlák', 'Sztornó számlák'],
        datasets: [
            {
                label: 'Számlák ',
                data: [JSON.parse(chartDonut.dataset.invoices) || 0, JSON.parse(chartDonut.dataset.storno) || 0],
                backgroundColor: [
                    Utils.CHART_COLORS.red,
                    Utils.CHART_COLORS.green,
                ],
            },
        ]
    };
}


export { setBarData, setLineData, setAmountData,setDonutData }