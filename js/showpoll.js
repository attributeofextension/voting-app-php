  function makePollDataURL(pollid) {
  return "/api/getpolldata.php?id=" + pollid;
}

function generateChart(jsondata) {
  var pollArr = [['Option', 'Votes']];
  var isData = false;
  console.log(jsondata);
  for(var i = 0;i < jsondata.options.length;i++) {
      if(parseInt(jsondata.options[i].votes) > 0) {
        isData = true;
      }
      pollArr.push([jsondata.options[i].option,parseInt(jsondata.options[i].votes)]);
  }
  if(!isData) {
    pollArr.push(["No Votes Yet",1]);
  }
  
  
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(pollArr);

        var options = {
        };

        var chart = new google.visualization.PieChart(document.getElementById('voteChart'));
        chart.draw(data, options);
      }

}

function loaded(event) {
  var pollid = document.getElementById("pollid").value;

  $.getJSON(makePollDataURL(pollid),generateChart);
  
}
$("document").ready(loaded);
