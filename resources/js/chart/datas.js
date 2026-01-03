import { Utils } from './utils.js';

const labels = Utils.labels;

// Helper függvény a biztonságos JSON parse-hoz
const parseDataset = (element, key, fallback = []) => {
    if (!element || !element.dataset[key]) return fallback;
    try {
        return JSON.parse(element.dataset[key]);
    } catch (error) {
        console.warn(`Failed to parse dataset.${key}:`, error);
        return fallback;
    }
};

// Helper a dataset létrehozásához
const createDataset = (label, data, backgroundColor, extraProps = {}) => ({
    label,
    data,
    backgroundColor,
    ...extraProps
});

const setBarData = () => {
    const chartBar = document.getElementById('chart_bar');
    
    return {
        labels,
        datasets: [
            createDataset(
                'kimenő számlák száma',
                parseDataset(chartBar, 'invoices'),
                Utils.CHART_COLORS.red
            ),
            createDataset(
                'sztornó számlák',
                parseDataset(chartBar, 'storno'),
                Utils.CHART_COLORS.blue
            ),
        ]
    };
};

const setLineData = () => {
    const chartLine = document.getElementById('chart_line');
    
    return {
        labels,
        datasets: [
            createDataset(
                'kimenő számlák száma',
                parseDataset(chartLine, 'invoices'),
                Utils.CHART_COLORS.red,
                { lineTension: 0.1 }
            ),
            createDataset(
                'sztornó számlák',
                parseDataset(chartLine, 'storno'),
                Utils.CHART_COLORS.blue,
                { lineTension: 0.1 }
            ),
        ]
    };
};

const setAmountData = () => {
    const chartAmount = document.getElementById('chart_amount');
    
    return {
        labels,
        datasets: [
            createDataset(
                'kimenő számlák összege',
                parseDataset(chartAmount, 'invoices'),
                Utils.CHART_COLORS.green
            ),
            createDataset(
                'sztornó számlák összege',
                parseDataset(chartAmount, 'storno'),
                Utils.CHART_COLORS.orange
            ),
        ]
    };
};

const setDonutData = () => {
    const chartDonut = document.getElementById('chart_donut');
    
    return {
        labels: ['Kimenő számlák', 'Sztornó számlák'],
        datasets: [
            {
                label: 'Számlák',
                data: [
                    parseDataset(chartDonut, 'invoices', 0),
                    parseDataset(chartDonut, 'storno', 0)
                ],
                backgroundColor: [
                    Utils.CHART_COLORS.red,
                    Utils.CHART_COLORS.green,
                ],
            },
        ]
    };
};

export { setBarData, setLineData, setAmountData, setDonutData };