import { setBarData, setLineData, setAmountData, setDonutData } from './datas.js';

// Helper függvények - DRY principle
const createTooltipLabel = (context, unit) => {
    let label = context.dataset.label || '';
    
    if (label) {
        label += ': ';
    }
    
    if (context.parsed.y !== null) {
        const value = unit === 'Ft' 
            ? new Intl.NumberFormat('hu-HU').format(context.parsed.y)
            : context.parsed.y;
        label += `${value} ${unit}`;
    }
    
    return label;
};

const createBaseConfig = (type, dataFn, title, tooltipUnit = 'db', stacked = false) => ({
    type,
    data: dataFn(),
    options: {
        plugins: {
            tooltip: {
                callbacks: {
                    label: (context) => createTooltipLabel(context, tooltipUnit)
                }
            },
            title: {
                display: true,
                text: title,
            },
        },
        responsive: true,
        ...(stacked && {
            scales: {
                x: { stacked: true },
                y: { stacked: true }
            }
        })
    }
});

// Egyszerűsített config függvények
const setBarConfig = () => createBaseConfig(
    'bar',
    setBarData,
    'Számlák és sztornó számlák havi bontásban',
    'db',
    true
);

const setLineConfig = () => createBaseConfig(
    'line',
    setLineData,
    'Számlák és sztornó számlák havi bontásban',
    'db'
);

const setAmountConfig = () => createBaseConfig(
    'bar',
    setAmountData,
    'Számlák és sztornó számlák összege havi bontásban',
    'Ft',
    true
);

const setDonutConfig = () => ({
    type: 'doughnut',
    data: setDonutData(),
    options: {
        plugins: {
            title: {
                display: true,
                text: 'Számlák összege',
            },
        },
        responsive: true,
    }
});

export { setBarConfig, setLineConfig, setAmountConfig, setDonutConfig };