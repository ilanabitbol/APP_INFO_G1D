var $canvas = $("#tbcanvas")[0];
var ctx = $canvas.getContext("2d");

function drawGraph() {
    var xLabel;
    var yLabel;
    var startX = Math.floor($canvas.width * 0.25);
    var startY = Math.floor($canvas.height * 0.25);
    var displaceX = $canvas.width - (startX * 2);
    var displaceY = $canvas.height - (startY * 2);
    var tbody = $("table tbody");
    var thead = $("table thead");
    var dataPoints = [];
    var dataLabels = [];
    var index = 0;
    
    //get graph title and display top center
    ctx.font = ("24px Arial");
    ctx.fillStyle = "#cc0000";    
    ctx.fillText($("table").find("caption").eq(0).text(), 125, 75);
    
    //get axis labels
    thead.find("tr").each(function () {
        var th = $(this).find("th");
        xLabel = th.eq(0).text();
        yLabel = th.eq(1).text();
    });
    
    //pull data points from table
    tbody.find("tr").each(function () {
        var th = $(this).find("th");
        dataLabels[index] = th.eq(0).text();
        index++;
    });
    
    //grab data labels
    index = 0;
    tbody.find("tr").each(function () {
        var td = $(this).find("td");
        dataPoints[index] = td.eq(0).text();
        index++;
    });
    
    //display vertical and horizontal axis
    draw(startX, startY, 0, displaceY);
    draw(startX, (startY + displaceY), displaceX, 0);
    
    //display data labels and hash marks along X axis
    ctx.font = "18px Arial";
    ctx.fillText(xLabel, 180, 360);
    index = dataLabels.length - 1;
    ctx.font = "12px Arial";
    ctx.fillStyle = "#000000";
    for(i = (startX + displaceX); i >= startX; i -= 40){ 
        drawDataHash(i, startY + (displaceY - 6), true);
        if (index >= 0 ) {
            ctx.fillText(dataLabels[index], i - 12, startY + (displaceY + 30));
        }
        index--;
    }
    
    //display data labels and hash marks along Y axis
    ctx.save();
    ctx.font = "18px Arial";
    ctx.fillStyle = "#cc0000";
    ctx.translate(0, 0);
    ctx.rotate(Math.PI / 2);
    ctx.fillText(yLabel, 150, -25);
    ctx.restore();
    index = 50;
    for(i = startY; i <= (startY + displaceY); i += 40){ 
        drawDataHash(startX - 6, i, false);
        ctx.fillText(index, startX - 30, i);
        index -= 10;        
    }
        
    //plot points on graph
    startY += displaceY;
    displaceX = 40;
    for(i = 0; i < dataPoints.length; i += 1){ 
        drawDataPoint(startX + displaceX, startY - (dataPoints[i] * 4));
        //connect the dots
        ctx.beginPath();
        ctx.moveTo(startX + displaceX, startY - (dataPoints[i] * 4));
        displaceX += 40;
        ctx.lineTo(startX + displaceX, startY - (dataPoints[i + 1] * 4));
        ctx.stroke();
    }
    
    
}
//**********************************************************
function draw(startX, startY, displaceX, displaceY) {
    ctx.beginPath();
    ctx.moveTo(startX, startY);
    ctx.lineTo(startX + displaceX, startY + displaceY);
    ctx.stroke();
}

function drawDataPoint(x, y) {
    ctx.beginPath();
    ctx.arc(x, y, 3, 0, 2 * Math.PI);
    ctx.fill();
}

function drawDataHash(x, y, horiz){
    if(horiz) {
        draw(x, y, 0, 12);
    } else {
        draw(x, y, 12, 0);
    }
}
//**********************************************************
drawGraph();