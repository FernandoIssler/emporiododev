/**
 * Statistics Cards
 */

'use strict';
(function () {
  let cardColor, borderColor, shadeColor, labelColor, headingColor;

  if (isDarkStyle) {
    cardColor = config.colors_dark.cardColor;
    labelColor = config.colors_dark.textMuted;
    borderColor = config.colors_dark.borderColor;
    headingColor = config.colors_dark.headingColor;
    shadeColor = 'dark';
  } else {
    cardColor = config.colors.cardColor;
    labelColor = config.colors.textMuted;
    borderColor = config.colors.borderColor;
    headingColor = config.colors.headingColor;
    shadeColor = '';
  }

  // Donut Chart Colors
  const chartColors = {
    donut: {
      series1: config.colors.success,
      series2: '#4fddaa',
      series3: '#8ae8c7',
      series4: '#c4f4e3'
    }
  };

  // Conversion - Gradient Line Chart
  // --------------------------------------------------------------------
  const conversationChartEl = document.querySelector('#conversationChart'),
    conversationChartConfig = {
      series: [
        {
          data: [50, 100, 0, 60, 20, 30]
        }
      ],
      chart: {
        height: 40,
        type: 'line',
        zoom: {
          enabled: false
        },
        sparkline: {
          enabled: true
        },
        toolbar: {
          show: false
        }
      },
      dataLabels: {
        enabled: false
      },
      tooltip: {
        enabled: false
      },
      stroke: {
        curve: 'smooth',
        width: 3
      },
      grid: {
        show: false,
        padding: {
          top: 5,
          left: 10,
          right: 10,
          bottom: 5
        }
      },
      colors: [config.colors.primary],
      fill: {
        type: 'gradient',
        gradient: {
          shade: shadeColor,
          type: 'horizontal',
          gradientToColors: undefined,
          opacityFrom: 0,
          opacityTo: 0.9,
          stops: [0, 30, 70, 100]
        }
      },
      xaxis: {
        labels: {
          show: false
        },
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        }
      },
      yaxis: {
        labels: {
          show: false
        }
      }
    };
  if (typeof conversationChartEl !== undefined && conversationChartEl !== null) {
    const conversationChart = new ApexCharts(conversationChartEl, conversationChartConfig);
    conversationChart.render();
  }

  // Income - Gradient Line Chart
  // --------------------------------------------------------------------
  const incomeChartEl = document.querySelector('#incomeChart'),
    incomeChartConfig = {
      series: [
        {
          data: [40, 70, 38, 90, 40, 65]
        }
      ],
      chart: {
        height: 40,
        type: 'line',
        zoom: {
          enabled: false
        },
        sparkline: {
          enabled: true
        },
        toolbar: {
          show: false
        }
      },
      dataLabels: {
        enabled: false
      },
      tooltip: {
        enabled: false
      },
      stroke: {
        curve: 'smooth',
        width: 3
      },
      grid: {
        show: false,
        padding: {
          top: 10,
          left: 10,
          right: 10,
          bottom: 0
        }
      },
      colors: [config.colors.warning],
      fill: {
        type: 'gradient',
        gradient: {
          shade: shadeColor,
          type: 'horizontal',
          gradientToColors: undefined,
          opacityFrom: 0,
          opacityTo: 0.9,
          stops: [0, 30, 70, 100]
        }
      },
      xaxis: {
        labels: {
          show: false
        },
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        }
      },
      yaxis: {
        labels: {
          show: false
        }
      }
    };
  if (typeof incomeChartEl !== undefined && incomeChartEl !== null) {
    const incomeChart = new ApexCharts(incomeChartEl, incomeChartConfig);
    incomeChart.render();
  }

  // Profit - Gradient Line Chart
  // --------------------------------------------------------------------
  const profitChartEl = document.querySelector('#profitChart'),
    profitChartConfig = {
      series: [
        {
          data: [50, 80, 10, 82, 52, 95]
        }
      ],
      chart: {
        height: 40,
        type: 'line',
        zoom: {
          enabled: false
        },
        sparkline: {
          enabled: true
        },
        toolbar: {
          show: false
        }
      },
      dataLabels: {
        enabled: false
      },
      tooltip: {
        enabled: false
      },
      stroke: {
        curve: 'smooth',
        width: 3
      },
      grid: {
        show: false,
        padding: {
          top: 10,
          left: 10,
          right: 10,
          bottom: 0
        }
      },
      colors: [config.colors.success],
      fill: {
        type: 'gradient',
        gradient: {
          shade: shadeColor,
          type: 'horizontal',
          gradientToColors: undefined,
          opacityFrom: 0,
          opacityTo: 0.9,
          stops: [0, 30, 70, 100]
        }
      },
      xaxis: {
        labels: {
          show: false
        },
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        }
      },
      yaxis: {
        labels: {
          show: false
        }
      }
    };
  if (typeof profitChartEl !== undefined && profitChartEl !== null) {
    const profitChart = new ApexCharts(profitChartEl, profitChartConfig);
    profitChart.render();
  }

  // Expenses - Gradient Line Chart
  // --------------------------------------------------------------------
  const expensesLineChartEl = document.querySelector('#expensesLineChart'),
    expensesLineChartConfig = {
      series: [
        {
          data: [80, 40, 85, 5, 80, 35]
        }
      ],
      chart: {
        height: 40,
        type: 'line',
        zoom: {
          enabled: false
        },
        sparkline: {
          enabled: true
        },
        toolbar: {
          show: false
        }
      },
      dataLabels: {
        enabled: false
      },
      tooltip: {
        enabled: false
      },
      stroke: {
        curve: 'smooth',
        width: 3
      },
      grid: {
        show: false,
        padding: {
          top: 5,
          left: 10,
          right: 10,
          bottom: 5
        }
      },
      colors: [config.colors.danger],
      fill: {
        type: 'gradient',
        gradient: {
          shade: shadeColor,
          type: 'horizontal',
          gradientToColors: undefined,
          opacityFrom: 0,
          opacityTo: 0.9,
          stops: [0, 30, 70, 100]
        }
      },
      xaxis: {
        labels: {
          show: false
        },
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        }
      },
      yaxis: {
        labels: {
          show: false
        }
      }
    };
  if (typeof expensesLineChartEl !== undefined && expensesLineChartEl !== null) {
    const expensesLineChart = new ApexCharts(expensesLineChartEl, expensesLineChartConfig);
    expensesLineChart.render();
  }

  // Report Chart
  // --------------------------------------------------------------------

  // Radial bar chart functions
  function radialBarChart(color, value) {
    const radialBarChartOpt = {
      chart: {
        height: 55,
        width: 40,
        type: 'radialBar'
      },
      plotOptions: {
        radialBar: {
          hollow: {
            size: '32%'
          },
          dataLabels: {
            show: false
          },
          track: {
            background: borderColor
          }
        }
      },
      colors: [color],
      grid: {
        padding: {
          top: -10,
          bottom: -10,
          left: -5,
          right: 0
        }
      },
      series: [value],
      labels: ['Progress']
    };
    return radialBarChartOpt;
  }

  const ReportchartList = document.querySelectorAll('.chart-report');
  if (ReportchartList) {
    ReportchartList.forEach(function (ReportchartEl) {
      const color = config.colors[ReportchartEl.dataset.color],
        series = ReportchartEl.dataset.series;
      const optionsBundle = radialBarChart(color, series);
      const reportChart = new ApexCharts(ReportchartEl, optionsBundle);
      reportChart.render();
    });
  }

  // Registrations Bar Chart
  // --------------------------------------------------------------------
  const registrationsBarChartEl = document.querySelector('#registrationsBarChart'),
    registrationsBarChartConfig = {
      chart: {
        height: 70,
        type: 'bar',
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        bar: {
          barHeight: '80%',
          columnWidth: '50%',
          startingShape: 'rounded',
          endingShape: 'rounded',
          borderRadius: 2,
          distributed: true
        }
      },
      tooltip: {
        enabled: false
      },
      grid: {
        show: false,
        padding: {
          top: -20,
          bottom: -12,
          left: 0,
          right: 0
        }
      },
      colors: [
        config.colors_label.warning,
        config.colors_label.warning,
        config.colors_label.warning,
        config.colors_label.warning,
        config.colors.warning,
        config.colors_label.warning,
        config.colors_label.warning
      ],
      dataLabels: {
        enabled: false
      },
      series: [
        {
          data: [30, 55, 45, 95, 70, 50, 65]
        }
      ],
      legend: {
        show: false
      },
      xaxis: {
        categories: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          show: false
        }
      },
      yaxis: {
        labels: {
          show: false
        }
      }
    };
  if (typeof registrationsBarChartEl !== undefined && registrationsBarChartEl !== null) {
    const registrationsBarChart = new ApexCharts(registrationsBarChartEl, registrationsBarChartConfig);
    registrationsBarChart.render();
  }

  // Visits Bar Chart
  // --------------------------------------------------------------------
  const visitsBarChartEl = document.querySelector('#visitsBarChart'),
    visitsBarChartConfig = {
      chart: {
        height: 70,
        type: 'bar',
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        bar: {
          barHeight: '80%',
          columnWidth: '50%',
          startingShape: 'rounded',
          endingShape: 'rounded',
          borderRadius: 2,
          distributed: true
        }
      },
      tooltip: {
        enabled: false
      },
      grid: {
        show: false,
        padding: {
          top: -20,
          bottom: -12,
          left: 0,
          right: 0
        }
      },
      colors: [
        config.colors_label.success,
        config.colors_label.success,
        config.colors_label.success,
        config.colors_label.success,
        config.colors.success,
        config.colors_label.success,
        config.colors_label.success
      ],
      dataLabels: {
        enabled: false
      },
      series: [
        {
          data: [15, 42, 33, 54, 98, 48, 37]
        }
      ],
      legend: {
        show: false
      },
      xaxis: {
        categories: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          show: false
        }
      },
      yaxis: {
        labels: {
          show: false
        }
      }
    };
  if (typeof visitsBarChartEl !== undefined && visitsBarChartEl !== null) {
    const visitsBarChart = new ApexCharts(visitsBarChartEl, visitsBarChartConfig);
    visitsBarChart.render();
  }

  // Registrations - Line Chart
  // --------------------------------------------------------------------
  const registrationChartEl = document.querySelector('#registrationsChart'),
    registrationChartConfig = {
      series: [
        {
          data: [57, 25, 94, 32, 98, 81, 125]
        }
      ],
      chart: {
        height: 120,
        parentHeightOffset: 0,
        parentWidthOffset: 0,
        type: 'line',
        toolbar: {
          show: false
        }
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: 3,
        curve: 'straight'
      },
      grid: {
        show: false,
        padding: {
          top: -30,
          left: 2,
          right: 0,
          bottom: -10
        }
      },
      colors: [config.colors.success],
      xaxis: {
        show: false,
        categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        axisBorder: {
          show: true,
          color: borderColor
        },
        axisTicks: {
          show: true,
          color: borderColor
        },
        labels: {
          show: true,
          style: {
            fontSize: '0.813rem',
            fontFamily: 'IBM Plex Sans',
            colors: labelColor
          }
        }
      },
      yaxis: {
        labels: {
          show: false
        }
      }
    };
  if (typeof registrationChartEl !== undefined && registrationChartEl !== null) {
    const registrationChart = new ApexCharts(registrationChartEl, registrationChartConfig);
    registrationChart.render();
  }

  // Expenses - Line Chart
  // --------------------------------------------------------------------
  const expensesChartEl = document.querySelector('#expensesChart'),
    expensesChartConfig = {
      series: [
        {
          data: [115, 70, 105, 34, 122, 21, 62]
        }
      ],
      chart: {
        height: 120,
        parentHeightOffset: 0,
        parentWidthOffset: 0,
        type: 'line',
        toolbar: {
          show: false
        }
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: 3,
        curve: 'straight'
      },
      grid: {
        show: false,
        padding: {
          top: -30,
          left: 2,
          right: 0,
          bottom: -10
        }
      },
      colors: [config.colors.danger],
      xaxis: {
        show: false,
        categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        axisBorder: {
          show: true,
          color: borderColor
        },
        axisTicks: {
          show: true,
          color: borderColor
        },
        labels: {
          show: true,
          style: {
            fontSize: '0.813rem',
            fontFamily: 'IBM Plex Sans',
            colors: labelColor
          }
        }
      },
      yaxis: {
        labels: {
          show: false
        }
      }
    };
  if (typeof expensesChartEl !== undefined && expensesChartEl !== null) {
    const expensesChart = new ApexCharts(expensesChartEl, expensesChartConfig);
    expensesChart.render();
  }

  // Users - Line Chart
  // --------------------------------------------------------------------
  const usersChartEl = document.querySelector('#usersChart'),
    usersChartConfig = {
      series: [
        {
          data: [58, 27, 141, 60, 98, 31, 165]
        }
      ],
      chart: {
        height: 120,
        parentHeightOffset: 0,
        parentWidthOffset: 0,
        type: 'line',
        toolbar: {
          show: false
        }
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: 3,
        curve: 'straight'
      },
      grid: {
        show: false,
        padding: {
          top: -30,
          left: 2,
          right: 0,
          bottom: -10
        }
      },
      colors: [config.colors.primary],
      xaxis: {
        show: false,
        categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        axisBorder: {
          show: true,
          color: borderColor
        },
        axisTicks: {
          show: true,
          color: borderColor
        },
        labels: {
          show: true,
          style: {
            fontSize: '0.813rem',
            fontFamily: 'IBM Plex Sans',
            colors: labelColor
          }
        }
      },
      yaxis: {
        labels: {
          show: false
        }
      }
    };
  if (typeof usersChartEl !== undefined && usersChartEl !== null) {
    const usersChart = new ApexCharts(usersChartEl, usersChartConfig);
    usersChart.render();
  }

  // Order Area Chart
  // --------------------------------------------------------------------
  const orderAreaChartEl = document.querySelector('#orderChart'),
    orderAreaChartConfig = {
      chart: {
        height: 80,
        type: 'area',
        toolbar: {
          show: false
        },
        sparkline: {
          enabled: true
        }
      },
      markers: {
        size: 6,
        colors: 'transparent',
        strokeColors: 'transparent',
        strokeWidth: 4,
        discrete: [
          {
            fillColor: cardColor,
            seriesIndex: 0,
            dataPointIndex: 6,
            strokeColor: config.colors.success,
            strokeWidth: 2,
            size: 6,
            radius: 8
          }
        ],
        hover: {
          size: 7
        }
      },
      grid: {
        show: false,
        padding: {
          right: 8
        }
      },
      colors: [config.colors.success],
      fill: {
        type: 'gradient',
        gradient: {
          shade: shadeColor,
          shadeIntensity: 0.8,
          opacityFrom: 0.8,
          opacityTo: 0.25,
          stops: [0, 85, 100]
        }
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: 2,
        curve: 'smooth'
      },
      series: [
        {
          data: [180, 175, 275, 140, 205, 190, 295]
        }
      ],
      xaxis: {
        show: false,
        lines: {
          show: false
        },
        labels: {
          show: false
        },
        stroke: {
          width: 0
        },
        axisBorder: {
          show: false
        }
      },
      yaxis: {
        stroke: {
          width: 0
        },
        show: false
      }
    };
  if (typeof orderAreaChartEl !== undefined && orderAreaChartEl !== null) {
    const orderAreaChart = new ApexCharts(orderAreaChartEl, orderAreaChartConfig);
    orderAreaChart.render();
  }

  // Revenue Bar Chart
  // --------------------------------------------------------------------
  const revenueBarChartEl = document.querySelector('#revenueChart'),
    revenueBarChartConfig = {
      chart: {
        height: 80,
        type: 'bar',
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        bar: {
          barHeight: '80%',
          columnWidth: '75%',
          startingShape: 'rounded',
          endingShape: 'rounded',
          borderRadius: 2,
          distributed: true
        }
      },
      grid: {
        show: false,
        padding: {
          top: -20,
          bottom: -12,
          left: -10,
          right: 0
        }
      },
      colors: [
        config.colors_label.primary,
        config.colors_label.primary,
        config.colors_label.primary,
        config.colors_label.primary,
        config.colors.primary,
        config.colors_label.primary,
        config.colors_label.primary
      ],
      dataLabels: {
        enabled: false
      },
      series: [
        {
          data: [40, 95, 60, 45, 90, 50, 75]
        }
      ],
      legend: {
        show: false
      },
      xaxis: {
        categories: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          style: {
            colors: labelColor,
            fontSize: '13px'
          }
        }
      },
      yaxis: {
        labels: {
          show: false
        }
      }
    };
  if (typeof revenueBarChartEl !== undefined && revenueBarChartEl !== null) {
    const revenueBarChart = new ApexCharts(revenueBarChartEl, revenueBarChartConfig);
    revenueBarChart.render();
  }

  // Profit Bar Chart
  // --------------------------------------------------------------------
  const profitBarChartEl = document.querySelector('#profitChartNumber'),
    profitBarChartConfig = {
      series: [
        {
          data: [58, 28, 50, 80]
        },
        {
          data: [50, 22, 65, 72]
        }
      ],
      chart: {
        type: 'bar',
        height: 90,
        toolbar: {
          tools: {
            download: false
          }
        }
      },
      plotOptions: {
        bar: {
          columnWidth: '65%',
          startingShape: 'rounded',
          endingShape: 'rounded',
          borderRadius: 3,
          dataLabels: {
            show: false
          }
        }
      },
      grid: {
        show: false,
        padding: {
          top: -30,
          bottom: -12,
          left: -10,
          right: 0
        }
      },
      colors: [config.colors.success, config.colors_label.success],
      dataLabels: {
        enabled: false
      },
      stroke: {
        show: true,
        width: 5,
        colors: cardColor
      },
      legend: {
        show: false
      },
      xaxis: {
        categories: ['Jan', 'Apr', 'Jul', 'Oct'],
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          style: {
            colors: labelColor,
            fontSize: '13px'
          }
        }
      },
      yaxis: {
        labels: {
          show: false
        }
      }
    };
  const profitBarChart = new ApexCharts(profitBarChartEl, profitBarChartConfig);
  profitBarChart.render();

  // Session Area Chart
  // --------------------------------------------------------------------
  const sessionAreaChartEl = document.querySelector('#sessionsChart'),
    sessionAreaChartConfig = {
      chart: {
        height: 90,
        type: 'area',
        toolbar: {
          show: false
        },
        sparkline: {
          enabled: true
        }
      },
      markers: {
        size: 6,
        colors: 'transparent',
        strokeColors: 'transparent',
        strokeWidth: 4,
        discrete: [
          {
            fillColor: cardColor,
            seriesIndex: 0,
            dataPointIndex: 8,
            strokeColor: config.colors.warning,
            strokeWidth: 2,
            size: 6,
            radius: 8
          }
        ],
        hover: {
          size: 7
        }
      },
      grid: {
        show: false,
        padding: {
          right: 8
        }
      },
      colors: [config.colors.warning],
      fill: {
        type: 'gradient',
        gradient: {
          shade: shadeColor,
          shadeIntensity: 0.8,
          opacityFrom: 0.8,
          opacityTo: 0.25,
          stops: [0, 95, 100]
        }
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: 2,
        curve: 'straight'
      },
      series: [
        {
          data: [280, 280, 240, 240, 200, 200, 260, 260, 310]
        }
      ],
      xaxis: {
        show: false,
        lines: {
          show: false
        },
        labels: {
          show: false
        },
        axisBorder: {
          show: false
        }
      },
      yaxis: {
        show: false
      }
    };
  if (typeof sessionAreaChartEl !== undefined && sessionAreaChartEl !== null) {
    const sessionAreaChart = new ApexCharts(sessionAreaChartEl, sessionAreaChartConfig);
    sessionAreaChart.render();
  }

  // Total Sales Radial Bar Chart
  // --------------------------------------------------------------------
  const expensesRadialChartEl = document.querySelector('#expensesChartMonth'),
    expensesRadialChartConfig = {
      chart: {
        sparkline: {
          enabled: true
        },
        parentHeightOffset: 0,
        type: 'radialBar'
      },
      colors: [config.colors.primary],
      series: [78],
      plotOptions: {
        radialBar: {
          startAngle: -90,
          endAngle: 90,
          hollow: {
            size: '65%'
          },
          dataLabels: {
            name: {
              show: false
            },
            value: {
              fontSize: '22px',
              color: headingColor,
              fontWeight: 500,
              offsetY: 0
            }
          }
        }
      },
      grid: {
        show: false,
        padding: {
          left: -10,
          right: -10
        }
      },
      stroke: {
        lineCap: 'round'
      },
      labels: ['Progress']
    };
  if (typeof expensesRadialChartEl !== undefined && expensesRadialChartEl !== null) {
    const expensesRadialChart = new ApexCharts(expensesRadialChartEl, expensesRadialChartConfig);
    expensesRadialChart.render();
  }

  // Visitor Bar Chart
  // --------------------------------------------------------------------
  const visitorBarChartEl = document.querySelector('#visitorsChart'),
    visitorBarChartConfig = {
      chart: {
        height: 120,
        width: 200,
        parentHeightOffset: 0,
        type: 'bar',
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        bar: {
          barHeight: '75%',
          columnWidth: '40px',
          startingShape: 'rounded',
          endingShape: 'rounded',
          borderRadius: 5,
          distributed: true
        }
      },
      grid: {
        show: false,
        padding: {
          top: -25,
          bottom: -12
        }
      },
      colors: [
        config.colors_label.primary,
        config.colors_label.primary,
        config.colors_label.primary,
        config.colors_label.primary,
        config.colors_label.primary,
        config.colors.primary,
        config.colors_label.primary
      ],
      dataLabels: {
        enabled: false
      },
      series: [
        {
          data: [40, 95, 60, 45, 90, 50, 75]
        }
      ],
      legend: {
        show: false
      },
      xaxis: {
        categories: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          style: {
            colors: labelColor,
            fontSize: '13px'
          }
        }
      },
      yaxis: {
        labels: {
          show: false
        }
      },
      responsive: [
        {
          breakpoint: 1440,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 9,
                columnWidth: '60%'
              }
            }
          }
        },
        {
          breakpoint: 1300,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 9,
                columnWidth: '60%'
              }
            }
          }
        },
        {
          breakpoint: 1200,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 8,
                columnWidth: '50%'
              }
            }
          }
        },
        {
          breakpoint: 1040,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 8,
                columnWidth: '50%'
              }
            }
          }
        },
        {
          breakpoint: 991,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 8,
                columnWidth: '50%'
              }
            }
          }
        },
        {
          breakpoint: 420,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 8,
                columnWidth: '50%'
              }
            }
          }
        }
      ]
    };
  if (typeof visitorBarChartEl !== undefined && visitorBarChartEl !== null) {
    const visitorBarChart = new ApexCharts(visitorBarChartEl, visitorBarChartConfig);
    visitorBarChart.render();
  }

  // Activity Area Chart
  // --------------------------------------------------------------------
  const activityAreaChartEl = document.querySelector('#activityChart'),
    activityAreaChartConfig = {
      chart: {
        height: 120,
        width: 220,
        parentHeightOffset: 0,
        toolbar: {
          show: false
        },
        type: 'area'
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: 2,
        curve: 'smooth'
      },
      series: [
        {
          data: [15, 20, 14, 22, 17, 40, 12, 35, 25]
        }
      ],
      colors: [config.colors.success],
      fill: {
        type: 'gradient',
        gradient: {
          shade: shadeColor,
          shadeIntensity: 0.8,
          opacityFrom: 0.8,
          opacityTo: 0.25,
          stops: [0, 85, 100]
        }
      },
      grid: {
        show: false,
        padding: {
          top: -20,
          bottom: -8
        }
      },
      legend: {
        show: false
      },
      xaxis: {
        categories: ['A1', 'A2', 'A3', 'A4', 'A5', 'A6', 'A7', 'A8', 'A9'],
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          style: {
            fontSize: '13px',
            colors: labelColor
          }
        }
      },
      yaxis: {
        labels: {
          show: false
        }
      }
    };
  if (typeof activityAreaChartEl !== undefined && activityAreaChartEl !== null) {
    const activityAreaChart = new ApexCharts(activityAreaChartEl, activityAreaChartConfig);
    activityAreaChart.render();
  }
  // Order Statistics Chart
  // --------------------------------------------------------------------
  const leadsReportChartEl = document.querySelector('#leadsReportChart'),
    leadsReportChartConfig = {
      chart: {
        height: 157,
        width: 130,
        parentHeightOffset: 0,
        type: 'donut'
      },
      labels: ['Electronic', 'Sports', 'Decor', 'Fashion'],
      series: [45, 58, 30, 50],
      colors: [
        chartColors.donut.series1,
        chartColors.donut.series2,
        chartColors.donut.series3,
        chartColors.donut.series4
      ],
      stroke: {
        width: 0
      },
      dataLabels: {
        enabled: false,
        formatter: function (val, opt) {
          return parseInt(val) + '%';
        }
      },
      legend: {
        show: false
      },
      tooltip: {
        theme: false
      },
      grid: {
        padding: {
          top: 15
        }
      },
      plotOptions: {
        pie: {
          donut: {
            size: '75%',
            labels: {
              show: true,
              value: {
                fontSize: '1.5rem',
                fontFamily: 'IBM Plex Sans',
                color: headingColor,
                fontWeight: 500,
                offsetY: -15,
                formatter: function (val) {
                  return parseInt(val) + '%';
                }
              },
              name: {
                offsetY: 20,
                fontFamily: 'IBM Plex Sans'
              },
              total: {
                show: true,
                fontSize: '.7rem',
                label: '1 Week',
                color: labelColor,
                formatter: function (w) {
                  return '32%';
                }
              }
            }
          }
        }
      }
    };
  if (typeof leadsReportChartEl !== undefined && leadsReportChartEl !== null) {
    const leadsReportChart = new ApexCharts(leadsReportChartEl, leadsReportChartConfig);
    leadsReportChart.render();
  }
})();