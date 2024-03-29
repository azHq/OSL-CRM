var data = getReportsList();

console.log(data);

// Bar chart
new Chart(document.getElementById("bar-chart"), {
  type: 'bar',
  data: {
    labels: ["2006", "2010", "2011", "2012", "2018"],
    datasets: [
      {
        label: "Projects",
        backgroundColor: ["#fe7096", "#9a55ff", "#fe7096", "#e8c3b9", "#9a55ff"],
        data: [2478, 5267, 734, 784, 433]
      }
    ]
  },
  options: {
    legend: { display: false },
    title: {
      display: true,
      text: 'Counselor Performance'
    }
  }
});


// Bar chart
new Chart(document.getElementById("bar-chart-2"), {
  type: 'bar',
  data: {
    labels: ["2006", "2010", "2011", "2012", "2018"],
    datasets: [
      {
        label: "Projects",
        backgroundColor: ["#fe7096", "#9a55ff", "#fe7096", "#e8c3b9", "#9a55ff"],
        data: [2478, 5267, 734, 784, 433]
      }
    ]
  },
  options: {
    legend: { display: false },
    title: {
      display: true,
      text: 'Lead Report'
    }
  }
});

// Bar chart
new Chart(document.getElementById("bar-chart-3"), {
  type: 'bar',
  data: {
    labels: ["2006", "2010", "2011", "2012", "2018"],
    datasets: [
      {
        label: "Projects",
        backgroundColor: ["#fe7096", "#9a55ff", "#fe7096", "#e8c3b9", "#9a55ff"],
        data: [2478, 5267, 734, 784, 433]
      }
    ]
  },
  options: {
    legend: { display: false },
    title: {
      display: true,
      text: 'Application Performance'
    }
  }
});

// Bar chart
new Chart(document.getElementById("bar-chart-4"), {
  type: 'bar',
  data: {
    labels: ["2006", "2010", "2011", "2012", "2018"],
    datasets: [
      {
        label: "Projects",
        backgroundColor: ["#fe7096", "#9a55ff", "#fe7096", "#e8c3b9", "#9a55ff"],
        data: [2478, 5267, 734, 784, 433]
      }
    ]
  },
  options: {
    legend: { display: false },
    title: {
      display: true,
      text: 'Application Reports'
    }
  }
});


/*pie chart*/

new Chart(document.getElementById("pie-chart"), {
  type: 'pie',
  data: {
    labels: ["Asia", "Europe"],
    datasets: [{
      label: "Population (millions)",
      backgroundColor: ["#9a55ff", "#fe7096"],
      data: [2478, 5267]
    }]
  },
  options: {
    title: {
      display: true,
      text: ''
    }
  }
});

/*horixzontal bar chart*/
new Chart(document.getElementById("bar-chart-horizontal"), {
  type: 'horizontalBar',
  data: {
    labels: ["2000", "2010", "2011", "2015", "2020"],
    datasets: [
      {
        label: "Products",
        backgroundColor: ["#fe7096", "#9a55ff", "#3cba9f", "#e8c3b9", "#9a55ff"],
        data: [2478, 5267, 734, 784, 433]
      }
    ]
  },
  options: {
    legend: { display: false },
    title: {
      display: true,
      text: ''
    }
  }
});

/*grouped bar chart*/
new Chart(document.getElementById("bar-chart-grouped"), {
  type: 'bar',
  data: {
    labels: ["0", "100", "150", "200"],
    datasets: [
      {
        label: "Total Cost",
        backgroundColor: "#fe7096",
        data: [133, 221, 783, 2478]
      }, {
        label: "Total Revenue",
        backgroundColor: "#9a55ff",
        data: [408, 547, 675, 734]
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: ''
    }
  }
});

/*mixed chart*/
new Chart(document.getElementById("mixed-chart"), {
  type: 'bar',
  data: {
    labels: ["Task 1", "Task 2", "Task 3", "Task 4"],
    datasets: [{
      label: "Completed",
      type: "line",
      borderColor: "#8e5ea2",
      data: [408, 547, 675, 734],
      fill: false
    }, {
      label: "In progress",
      type: "line",
      borderColor: "#fe7096",
      data: [133, 221, 783, 2478],
      fill: false
    }, {
      label: "completed",
      type: "bar",
      backgroundColor: "rgba(0,0,0,0.2)",
      data: [408, 547, 675, 734],
    }, {
      label: "Started",
      type: "bar",
      backgroundColor: "rgba(0,0,0,0.2)",
      backgroundColorHover: "#fe7096",
      data: [133, 221, 783, 2478]
    }
    ]
  },
  options: {
    title: {
      display: true,
      text: ''
    },
    legend: { display: false }
  }
});

function getReportsList() {
  $.ajax({
    type: 'GET',
    url: "{{ route('reports.list') }}",
    success: function (data) {
      return data;
    }
  });
}