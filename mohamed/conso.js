

d3.csv("conso_mensuelle_retravaille.csv", 
  function(data){
  	//console.log(data[0].avril);

    //Déclaration  
    const height = 600;
    const width = 1000;
    const inner = 0;
    const outer = 150;

    //var a = 0, b = 0, c = 0, d = 0, e = 0, f = 0, h = 0, g = 0, h = 0, i = 0, j = 0, k = 0, l = 0;

    var tabMois = [];
    var tabConso = [];
    var tabCouple = [];

    tabMois.push('janvier', 'fevrier', 'mars', 'avril', 'mai', 'juin', 'juillet', 'aout', 'septembre', 'octobre', 'novembre', 'decembre');
    tabConso.push(data[0].janvier, data[0].fevrier, data[0].mars, data[0].avril, data[0].mai, data[0].juin, data[0].juillet, data[0].aout, data[0].septembre, data[0].octobre, data[0].novembre, data[0].decembre);
    //console.log(tabMois);
    




    /* Couples clé/valeur => incidents/nbrOccurences */

    for(var i=0; i<12; i++){

      tabCouple.push(

        {
          mois: tabMois[i],
          consommation: tabConso[i]
        }

      );
      }


    let svg = d3.select('body')
        .append('svg')
        .attr('width', width)
        .attr('height', height);

    let g = svg
        .append('g')
        .attr('transform', `translate(${width/2}, ${height/2})`);

    //Configuration des couleurs avec hsl      
    let couleurs = [];
    let couleurs2 = [];
    let delta = 360 / 12;

    for(let i=0; i<12; i++) {
        couleurs.push(d3.hsl(delta*i, 0.5, 0.6));
        couleurs2.push(d3.hsl(delta * i, 0.9, 0.6));
    }
    console.log(tabCouple);
    //Tracé du camembert  
    let camembert = function() {

        console.log(tabCouple);
        //Configuration des marges
        var margin = { top: 10, right: 20, bottom: 30, left: 50 };

        //Calcul des angles
        const sum = d3.sum(tabConso);
        const nb = tabConso.length;
        let dataAngle = [];
        let angle = 0;

        for(let i=0; i<nb; i++) {
            dataAngle.push(angle);
            angle += tabConso[i]*360/sum;
        }
        dataAngle.push(angle);

        let secteurs = g.selectAll('path')
            .data(tabConso);

        secteurs.enter()
            .append('path')
            .attr('d', function(d, i) {

        let arc = d3.svg.arc()
            .innerRadius(inner)
            .outerRadius(outer)
            .startAngle(Math.PI * 2 * dataAngle[i] / 360)
            .endAngle(Math.PI * 2 * dataAngle[i + 1] / 360);
            return arc();
        })
        .attr('fill', function(d, i) {
            return couleurs[i];
        })
        .on('mouseover', function(d, i){
            d3.select(this)
              .attr('fill', couleurs2[i]);
        })
        .on('mouseout', function (d, i) {
            d3.select(this)
              .attr('fill', couleurs[i]);
        });

      secteurs.attr('d', function (d, i) {
          let arc = d3.svg.arc()
              .innerRadius(inner)
              .outerRadius(outer)
              .startAngle(Math.PI * 2 *dataAngle[i]/360)
              .endAngle(Math.PI * 2 * dataAngle[i+1] / 360);
          return arc();
      })
      .attr('fill', function (d, i) {
        return couleurs[i];
    })

    /* Légende*/    
    var leg=svg.selectAll("g").data(tabCouple);

    leg.enter() 
       .append("g")
       .attr("class","legende")
       .attr("transform",function(d,i){
        return "translate(450,"+(100+30*i)+")";
        });
    var z = 25;

    //Petits rectangles pour la légende  
    leg.append("rect")
       .attr("x", 205 + z)
       .attr('y', 12 + z)
       .attr("width",15)
       .attr("height",15)
       .attr("fill",function (d,i){
        return couleurs[i];

        });

    //Texts associés aux rectangles
    leg.append("text")
       .attr("x", 225 + z)
       .attr('y', 22 + z)
       .attr("fill","black")
       .style("font-size","12px")
       .text(function(d,i) {
        return tabCouple[i].mois;
        });

    g.append("text")
     .attr("x", 20)             
     .attr("y", -200)
     .attr("text-anchor", "middle")
     .style("fill", "#5a5a5a")
     .style("font-family", "Raleway")
     .style("font-weight", "300")
     .style("font-size", "20px")
     .text("Répartition de la consommation sur les mois");

    z = z + 15;
    secteurs.exit().remove();
  }
   /*camembert();*/

   function histogramme(tabHist){

        var margin = {top: 40, right: 20, bottom: 30, left: 70},
        width = 960 - margin.left - margin.right,
        height = 500 - margin.top - margin.bottom;

        var formatPercent = d3.format(".0%");

        var x = d3.scale.ordinal()
            .rangeRoundBands([0, width], .1);

        var y = d3.scale.linear()
            .domain([Math.min(tabCouple[0].consommation, tabCouple[1].consommation,
            	tabCouple[2].consommation, tabCouple[3].consommation, tabCouple[4].consommation,
            	tabCouple[5].consommation, tabCouple[6].consommation, tabCouple[7].consommation,
            	tabCouple[8].consommation, tabCouple[9].consommation, tabCouple[10].consommation,
            	tabCouple[11].consommation), Math.max(tabCouple[0].consommation, tabCouple[1].consommation,
            	tabCouple[2].consommation, tabCouple[3].consommation, tabCouple[4].consommation,
            	tabCouple[5].consommation, tabCouple[6].consommation, tabCouple[7].consommation,
            	tabCouple[8].consommation, tabCouple[9].consommation, tabCouple[10].consommation,
            	tabCouple[11].consommation)])
            .range([height, 0]);

        var xAxis = d3.svg.axis()
            .scale(x)
            .orient("bottom");

        var yAxis = d3.svg.axis()
            .scale(y)
            .orient("left")
            //.tickFormat(formatPercent);

        /*var tip = d3.tip()
          .attr('class', 'd3-tip')
          .offset([-10, 0])
          .html(function(d) {
            return "<strong>Nombre d'accidents:</strong> <span style='color:red'>" + d.values + "</span>";
          });*/

        var svg = d3.select("body").append("svg")
            .attr("width", width + margin.left + margin.right)
            .attr("height", height + margin.top + margin.bottom)
            .append("g")
            .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

        //svg.call(tip);

        x.domain(tabHist.map(function(d) { return d.mois; }));
        y.domain([0, d3.max(tabHist, function(d) { return d.consommation; })]);

        svg.append("g")
            .attr("class", "x axis")
            .attr("transform", "translate(0," + height + ")")
            .call(xAxis);

        svg.append("g")
            .attr("class", "y axis")
            .call(yAxis)
            .append("text")
            .attr("transform", "rotate(-90)")
            .attr("y", 6)
            .attr("dy", ".71em")
            .style("text-anchor", "end")
            .text("consommation");

        svg.selectAll(".bar")
            .data(tabHist)
            .enter().append("rect")
            .attr("class", "bar")
            .attr("x", function(d) { return x(d.mois); })
            .attr("width", x.rangeBand())
            .attr("y", function(d) { return y(d.consommation); })
            .attr("height", function(d) { return height - y(d.consommation); })
            /*.on('click', function(d,i){
              let color = d3.select(this).attr('fill');
              let svg = d3.select("svg");
              svg.selectAll("*").remove();
              pieChart(tabHist[i].mois);
            })*/
            /*.on('mouseover', tip.show)
            .on('mouseout', tip.hide)*/

        }
        histogramme(tabCouple)
        camembert();

  });