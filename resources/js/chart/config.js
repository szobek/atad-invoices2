import { setBarData, setLineData, setAmountData,setDonutData } from './datas.js'

const setBarConfig = () => {
    return {
        type: 'bar',
        data: setBarData(),
        options: {
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            let label = context.dataset.label || '';

                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed.y !== null) {
                                label += context.parsed.y + ' db';
                            }
                            return label;
                        }
                    }
                },
                title: {
                    display: true,
                    text: 'Számlák és sztornó számlák havi bontásban',
                },
            },
            responsive: true,
            scales: {
                x: {
                    stacked: true,
                },
                y: {
                    stacked: true
                }
            }
        }
    };
}

const setLineConfig = () => {
    return {
        type: 'line',
        data: setLineData(),
        options: {
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            let label = context.dataset.label || '';

                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed.y !== null) {
                                label += context.parsed.y + ' db';
                            }
                            return label;
                        }
                    }
                },
                title: {
                    display: true,
                    text: 'Számlák és sztornó számlák havi bontásban',
                },
            },
            responsive: true,
        }
    }
}
const setAmountConfig = () => {
    return {
        type: 'bar',
        data: setAmountData(),
        options: {
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            let label = context.dataset.label || '';

                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed.y !== null) {
                                label += new Intl.NumberFormat('hu-HU').format(context.parsed.y) + ' Ft';
                            }
                            return label;
                        }
                    }
                },
                title: {
                    display: true,
                    text: 'Számlák és sztornó számlák összege havi bontásban',
                },
            },
            responsive: true,
            scales: {
                x: {
                    stacked: true,
                },
                y: {
                    stacked: true
                }
            }
        }
    };
}

const setDonutConfig = () => {
    return {
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
}
}
// const config_donut = {
//     type: 'doughnut',
//     data: donut_data,
//     options: {
//         plugins: {
//             title: {
//                 display: true,
//                 text: 'Számlák összege',
//             },
//         },
//         responsive: true,
//     }
// };

export { setBarConfig, setLineConfig, setAmountConfig,setDonutConfig }