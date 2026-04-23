function loadData() {
  fetch("data.json")
    .then(res => res.json())
    .then(data => {

      let table = document.getElementById("table");

      // Reset table
      table.innerHTML = `
        <tr>
          <th>Device ID</th>
          <th>Water Used</th>
          <th>Status</th>
        </tr>
      `;

      let labels = [];
      let values = [];

      data.forEach(item => {

        let color = "black";

        if (item.status === "Normal") color = "green";
        else if (item.status === "High Usage") color = "orange";
        else if (item.status === "Possible Leakage") color = "red";

        let row = `<tr>
          <td>${item.device_id}</td>
          <td>${item.water_used}</td>
          <td style="color:${color}; font-weight:bold;">
            ${item.status}
          </td>
        </tr>`;

        table.innerHTML += row;

        labels.push(item.device_id);
        values.push(item.water_used);
      });

      // Chart
      new Chart(document.getElementById("chart"), {
        type: "bar",
        data: {
          labels: labels,
          datasets: [{
            label: "Water Usage",
            data: values,
            backgroundColor: ["green", "green", "orange", "red"]
          }]
        }
      });

    });
}
