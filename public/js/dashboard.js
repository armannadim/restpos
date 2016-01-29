$(document).ready(function() {	
	var graph;
	var rick;
	$('#groups-list').slimScroll({
		height: '90px',
		alwaysVisible: false
	});
	$('#favourites-list').slimScroll({
		height: '150px',
		alwaysVisible: false
	});
	loadServerChart();
	loadSampleChart();
	
function loadServerChart(){
	/*var seriesData = [ [], []];
	var random = new Rickshaw.Fixtures.RandomData(50);

	for (var i = 0; i < 50; i++) {
		random.addData(seriesData);
	}

	graph = new Rickshaw.Graph( {
		element: document.querySelector("#chart"),
		height: 200,
		renderer: 'area',
		series: [
			{
				data: seriesData[0],
				color: 'rgba(0,144,217,0.51)',
				name:'DB Server'
			},{
				data: seriesData[1],
				color: '#eceff1',
				name:'Web Server'
			}
		]
	} );
	var hoverDetail = new Rickshaw.Graph.HoverDetail( {
		graph: graph
	});

	setInterval( function() {
		random.removeData(seriesData);
		random.addData(seriesData);
		graph.update();

	},1000);*/
}
function loadSampleChart(){
/*var seriesData = [ [], [],[]];
	var random = new Rickshaw.Fixtures.RandomData(50);

	for (var i = 0; i < 50; i++) {
		random.addData(seriesData);
	}

	rick = new Rickshaw.Graph( {
		element: document.querySelector("#ricksaw"),
		height: 200,
		renderer: 'area',
		series: [
			{
				data: seriesData[0],
				color: '#736086',
				name:'Downloads'
			},{
				data: seriesData[1],
				color: '#f8a4a3',
				name:'Uploads'
			},
			{
				data: seriesData[2],
				color: '#eceff1',
				name:'All'
			}
		]
	} );
	var hoverDetail = new Rickshaw.Graph.HoverDetail( {
		graph: rick
	});
	
	random.addData(seriesData);
	rick.update();
	
	var ticksTreatment = 'glow';
	
	var xAxis = new Rickshaw.Graph.Axis.Time( {
	graph: rick,
	ticksTreatment: ticksTreatment,
	timeFixture: new Rickshaw.Fixtures.Time.Local()
	});

	xAxis.render();

	var yAxis = new Rickshaw.Graph.Axis.Y( {
		graph: rick,
		tickFormat: Rickshaw.Fixtures.Number.formatKMBT,
		ticksTreatment: ticksTreatment
	});
	
	var legend = new Rickshaw.Graph.Legend( {
	graph: rick,
	element: document.getElementById('legend')
	});	
	
	yAxis.render();
	
	var shelving = new Rickshaw.Graph.Behavior.Series.Toggle( {
		graph: rick,
		legend: legend
	} );

	var order = new Rickshaw.Graph.Behavior.Series.Order( {
		graph: rick,
		legend: legend
	} );

	var highlighter = new Rickshaw.Graph.Behavior.Series.Highlight( {
		graph: rick,
		legend: legend
	} );	*/
}
  
var cityAreaData = [
        500.70,
        410.16,
        210.69,
        120.17,
        64.31,
        150.35,
        130.22,
        120.71,
        100.32
      ]
/*$('#world-map').vectorMap({
   map: 'us_lcc_en',
    scaleColors: ['#C8EEFF', '#0071A4'],
    normalizeFunction: 'polynomial',
    focusOn:{
		   x: 5,
		  y: 1,
		  scale: 1.8
	},
	zoomOnScroll:false,
	zoomMin:0.85,
    hoverColor: false,
	regionStyle:{
		  initial: {
			fill: '#a5ded9',
			"fill-opacity": 1,
			stroke: '#a5ded9',
			"stroke-width": 0,
			"stroke-opacity": 0
		  },
		  hover: {
			"fill-opacity": 0.8
		  },
		  selected: {
			fill: 'yellow'
		  },
		  selectedHover: {
		  }
		},
    markerStyle: {
		  initial: {
			fill: '#f35958',
			stroke: '#f35958',
			"fill-opacity": 1,
			"stroke-width": 6,
			"stroke-opacity": 0.5,
			r: 3
		  },
		  hover: {
			stroke: 'black',
			"stroke-width": 2
		  },
		  selected: {
			fill: 'blue'
		  },
		  selectedHover: {
		  }
		},
    backgroundColor: '#ffffff',
     markers :[
        {latLng: [30.22, -81.88], name: 'Cecil,FL'},
        {latLng: [25.8,-80.28], name: 'Miami Intl,FL'},
        {latLng: [32.33, -85.00], name: 'Fort Benning,GA'},
        {latLng: [34.35, -85.17 ], name: 'Rome/Russell,GA'},
        {latLng: [35.90, -82.82], name: 'Hot Springs,NC'},
        {latLng: [35.85, -77.88], name: 'Rocky Mt,NC'},
        {latLng: [32.90, -97.03], name: 'Dallas/FW,TX'},
        {latLng: [39.37, -75.07], name: 'Millville,NJ'},
        {latLng: [39.37, -60.70], name: 'Goodland,KS'}
      ],
	series: {
      markers: [{
        attribute: 'r',
        scale: [3, 7],
        values: cityAreaData
      }]
    },
  });
  
 $('.todo-list').click(function () {
	$(this).parent().children('label').toggleClass('done');
});
*/
 /*   $('#easy-pie-custom1').easyPieChart({
       barColor:'#02679a',
	   trackColor:'#fff',
	   scaleColor:false,
	   lineCap:'square',
	   lineWidth:'10',
	   	   size:'70'
    });
	
	$('#easy-pie-custom-2').easyPieChart({
       barColor:'#0aa699',
	   trackColor:'#fff',
	   scaleColor:false,
	   lineCap:'square',
	   lineWidth:'10',
	   	   size:'70'
    });
 
	$("#mini-chart-orders").sparkline([1,4,6,2,0,5,6,4,6], {
    type: 'bar',
    height: '30px',
    barWidth: 6,
    barSpacing: 2,
    barColor: '#f35958',
    negBarColor: '#f35958'});

	$("#mini-chart-other").sparkline([1,4,6,2,0,5,6,4], {
    type: 'bar',
    height: '30px',
    barWidth: 6,
    barSpacing: 2,
    barColor: '#0aa699',
    negBarColor: '#0aa699'});*/	
});


//var plot = $.plotAnimator("#placeholder",[data: d2, animator: {steps: 136, duration: 500, start:0}],options);


/*** Animated Weather Icon **/
/*var icons = new Skycons({"color": "white"});
icons.set("partly-cloudy-day", Skycons.PARTLY_CLOUDY_DAY);
icons.set("rain", Skycons.RAIN);
icons.set("wind", Skycons.WIND);
icons.play();
*/