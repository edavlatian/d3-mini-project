 var w = 360,
    h = 360,
    r = 160,
    inner = 90,
    color = d3.scale.category20c();

//Current Year Pie Chart
d3.json("yearlySales.php?yeartype=cur_fiscal_year", function (data){

	var total = d3.sum(data, function(d) {
	    return d3.sum(d3.values(d));
	});

	var vis = d3.select("#cur-year-pie")
	    .append("svg:svg")
	    .data([data])
	        .attr("width", w)
	        .attr("height", h)
	    .append("svg:g")
	        .attr("transform", "translate(" + r * 1.1 + "," + r * 1.1 + ")")

	var textTop = vis.append("text")
	    .attr("dy", ".35em")
	    .style("text-anchor", "middle")
	    .attr("class", "textTop")
	    .text( "TOTAL" )
	    .attr("y", -10),
	textBottom = vis.append("text")
	    .attr("dy", ".35em")
	    .style("text-anchor", "middle")
	    .attr("class", "textBottom")
	    .text(total.toFixed(2))
	    .attr("y", 10);

	var arc = d3.svg.arc()
	    .innerRadius(inner)
	    .outerRadius(r);

	var arcOver = d3.svg.arc()
	    .innerRadius(inner + 5)
	    .outerRadius(r + 5);

	var pie = d3.layout.pie()
	    .value(function(d) { return d.cur_fiscal_year; });
	var arcs = vis.selectAll("g.slice")
	    .data(pie)
	    .enter()
	        .append("svg:g")
	            .attr("class", "slice")
	            .on("mouseover", function(d) {
	                d3.select(this).select("path").transition()
	                    .duration(200)
	                    .attr("d", arcOver)
	                
	                textTop.text(d3.select(this).datum().data.branch_name)
	                    .attr("y", -10);
	                textBottom.text(d3.select(this).datum().data.cur_fiscal_year)
	                    .attr("y", 10);
	            })
	            .on("mouseout", function(d) {
	                d3.select(this).select("path").transition()
	                    .duration(100)
	                    .attr("d", arc);
	                
	                textTop.text( "TOTAL" )
	                    .attr("y", -10);
	                textBottom.text(total.toFixed(2));
	            });

	arcs.append("svg:path")
	    .attr("fill", function(d, i) { return color(i); } )
	    .attr("d", arc);

	var legend = d3.select("#cur-year-pie").append("svg")
	  .attr("class", "legend")
	  .attr("width", r)
	  .attr("height", r * 2)
	  .selectAll("g")
	  .data(data)
	  .enter().append("g")
	  .attr("transform", function(d, i) { return "translate(0," + i * 20 + ")"; });

	legend.append("rect")
	  .attr("width", 18)
	  .attr("height", 18)
	  .style("fill", function(d, i) { return color(i); });

	legend.append("text")
	  .attr("x", 24)
	  .attr("y", 9)
	  .attr("dy", ".35em")
	  .text(function(d) { return d.branch_name; });
});

//Last Year Pie Chart
d3.json("yearlySales.php?yeartype=last_fiscal_year", function (data){

	var total = d3.sum(data, function(d) {
	    return d3.sum(d3.values(d));
	});

	var vis = d3.select("#last-year-pie")
	    .append("svg:svg")
	    .data([data])
	        .attr("width", w)
	        .attr("height", h)
	    .append("svg:g")
	        .attr("transform", "translate(" + r * 1.1 + "," + r * 1.1 + ")")

	var textTop = vis.append("text")
	    .attr("dy", ".35em")
	    .style("text-anchor", "middle")
	    .attr("class", "textTop")
	    .text( "TOTAL" )
	    .attr("y", -10),
	textBottom = vis.append("text")
	    .attr("dy", ".35em")
	    .style("text-anchor", "middle")
	    .attr("class", "textBottom")
	    .text(total.toFixed(2))
	    .attr("y", 10);

	var arc = d3.svg.arc()
	    .innerRadius(inner)
	    .outerRadius(r);

	var arcOver = d3.svg.arc()
	    .innerRadius(inner + 5)
	    .outerRadius(r + 5);


	var pie = d3.layout.pie()
	    .value(function(d) { return d.last_fiscal_year; });
	var arcs = vis.selectAll("g.slice")
	    .data(pie)
	    .enter()
	        .append("svg:g")
	            .attr("class", "slice")
	            .on("mouseover", function(d) {
	                d3.select(this).select("path").transition()
	                    .duration(200)
	                    .attr("d", arcOver)
	                
	                textTop.text(d3.select(this).datum().data.branch_name)
	                    .attr("y", -10);
	                textBottom.text(d3.select(this).datum().data.last_fiscal_year)
	                    .attr("y", 10);
	            })
	            .on("mouseout", function(d) {
	                d3.select(this).select("path").transition()
	                    .duration(100)
	                    .attr("d", arc);
	                
	                textTop.text( "TOTAL" )
	                    .attr("y", -10);
	                textBottom.text(total.toFixed(2));
	            });	



	arcs.append("svg:path")
	    .attr("fill", function(d, i) { return color(i); } )
	    .attr("d", arc);

	var legend = d3.select("#last-year-pie").append("svg")
	  .attr("class", "legend")
	  .attr("width", r)
	  .attr("height", r * 2)
	  .selectAll("g")
	  .data(data)
	  .enter().append("g")
	  .attr("transform", function(d, i) { return "translate(0," + i * 20 + ")"; });

	legend.append("rect")
	  .attr("width", 18)
	  .attr("height", 18)
	  .style("fill", function(d, i) { return color(i); });

	legend.append("text")
	  .attr("x", 24)
	  .attr("y", 9)
	  .attr("dy", ".35em")
	  .text(function(d) { return d.branch_name; });

});
//Current Month Pie Chart
d3.json("monthlySales.php?monthtype=cur_month", function (data){

	var total = d3.sum(data, function(d) {
	    return d3.sum(d3.values(d));
	});

	var vis = d3.select("#cur-month-pie")
	    .append("svg:svg")
	    .data([data])
	        .attr("width", w)
	        .attr("height", h)
	    .append("svg:g")
	        .attr("transform", "translate(" + r * 1.1 + "," + r * 1.1 + ")")

	var textTop = vis.append("text")
	    .attr("dy", ".35em")
	    .style("text-anchor", "middle")
	    .attr("class", "textTop")
	    .text( "TOTAL" )
	    .attr("y", -10),
	textBottom = vis.append("text")
	    .attr("dy", ".35em")
	    .style("text-anchor", "middle")
	    .attr("class", "textBottom")
	    .text(total.toFixed(2))
	    .attr("y", 10);

	var arc = d3.svg.arc()
	    .innerRadius(inner)
	    .outerRadius(r);

	var arcOver = d3.svg.arc()
	    .innerRadius(inner + 5)
	    .outerRadius(r + 5);

	var pie = d3.layout.pie()
	    .value(function(d) { return d.cur_month; });

	var arcs = vis.selectAll("g.slice")
	    .data(pie)
	    .enter()
	        .append("svg:g")
	            .attr("class", "slice")
	            .on("mouseover", function(d) {
	                d3.select(this).select("path").transition()
	                    .duration(200)
	                    .attr("d", arcOver)
	                
	                textTop.text(d3.select(this).datum().data.branch_name)
	                    .attr("y", -10);
	                textBottom.text(d3.select(this).datum().data.cur_month)
	                    .attr("y", 10);
	            })
	            .on("mouseout", function(d) {
	                d3.select(this).select("path").transition()
	                    .duration(100)
	                    .attr("d", arc);
	                
	                textTop.text( "TOTAL" )
	                    .attr("y", -10);
	                textBottom.text(total.toFixed(2));
	            });

	arcs.append("svg:path")
	    .attr("fill", function(d, i) { return color(i); } )
	    .attr("d", arc);

	var legend = d3.select("#cur-month-pie").append("svg")
	  .attr("class", "legend")
	  .attr("width", r)
	  .attr("height", r * 2)
	  .selectAll("g")
	  .data(data)
	  .enter().append("g")
	  .attr("transform", function(d, i) { return "translate(0," + i * 20 + ")"; });

	legend.append("rect")
	  .attr("width", 18)
	  .attr("height", 18)
	  .style("fill", function(d, i) { return color(i); });

	legend.append("text")
	  .attr("x", 24)
	  .attr("y", 9)
	  .attr("dy", ".35em")
	  .text(function(d) { return d.branch_name; });
});

//Last Month Pie Chart
d3.json("monthlySales.php?monthtype=last_month", function (data){

	var total = d3.sum(data, function(d) {
	    return d3.sum(d3.values(d));
	});

	var vis = d3.select("#last-month-pie")
	    .append("svg:svg")
	    .data([data])
	        .attr("width", w)
	        .attr("height", h)
	    .append("svg:g")
	        .attr("transform", "translate(" + r * 1.1 + "," + r * 1.1 + ")")

	var textTop = vis.append("text")
	    .attr("dy", ".35em")
	    .style("text-anchor", "middle")
	    .attr("class", "textTop")
	    .text( "TOTAL" )
	    .attr("y", -10),
	textBottom = vis.append("text")
	    .attr("dy", ".35em")
	    .style("text-anchor", "middle")
	    .attr("class", "textBottom")
	    .text(total.toFixed(2))
	    .attr("y", 10);

	var arc = d3.svg.arc()
	    .innerRadius(inner)
	    .outerRadius(r);

	var arcOver = d3.svg.arc()
	    .innerRadius(inner + 5)
	    .outerRadius(r + 5);


	var pie = d3.layout.pie()
	    .value(function(d) { return d.last_month; });
	    
	var arcs = vis.selectAll("g.slice")
	    .data(pie)
	    .enter()
	        .append("svg:g")
	            .attr("class", "slice")
	            .on("mouseover", function(d) {
	                d3.select(this).select("path").transition()
	                    .duration(200)
	                    .attr("d", arcOver)
	                
	                textTop.text(d3.select(this).datum().data.branch_name)
	                    .attr("y", -10);
	                textBottom.text(d3.select(this).datum().data.last_month)
	                    .attr("y", 10);
	            })
	            .on("mouseout", function(d) {
	                d3.select(this).select("path").transition()
	                    .duration(100)
	                    .attr("d", arc);
	                
	                textTop.text( "TOTAL" )
	                    .attr("y", -10);
	                textBottom.text(total.toFixed(2));
	            });	



	arcs.append("svg:path")
	    .attr("fill", function(d, i) { return color(i); } )
	    .attr("d", arc);

	var legend = d3.select("#last-month-pie").append("svg")
	  .attr("class", "legend")
	  .attr("width", r)
	  .attr("height", r * 2)
	  .selectAll("g")
	  .data(data)
	  .enter().append("g")
	  .attr("transform", function(d, i) { return "translate(0," + i * 20 + ")"; });

	legend.append("rect")
	  .attr("width", 18)
	  .attr("height", 18)
	  .style("fill", function(d, i) { return color(i); });

	legend.append("text")
	  .attr("x", 24)
	  .attr("y", 9)
	  .attr("dy", ".35em")
	  .text(function(d) { return d.branch_name; });

});
