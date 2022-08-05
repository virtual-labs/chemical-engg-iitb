<HTML>
<HEAD>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<TITLE>Virtual labs project</TITLE>
<STYLE>
body, input{
	font-family: Calibri, Arial;
}
#accordion {
	list-style: none;
	padding: 0 0 0 0;
	width: 600px;
}
#accordion li{
	display: block;
	background-color: #FF9927;
	font-weight: bold;
	margin: 1px;
	cursor: pointer;
	padding: 5 5 5 7px;
	list-style: circle;
	-moz-border-radius: 10px;
	-webkit-border-radius: 10px;
	border-radius: 10px;
}
#accordion ul {
	list-style: none;
	padding: 0 0 0 0;
	display: none;
}
#accordion ul li{
	font-weight: normal;
	cursor: auto;
	background-color: #fff;
	padding: 0 0 0 7px;
}
#accordion a {
	text-decoration: none;
}
#accordion a:hover {
	text-decoration: underline;
}

</STYLE>
</HEAD>
<BODY>
<center>
<H2>Vapor Liquid Equilibrium (VLE)</H2>
<br>
<h4>
In the following exercises you will learn about Vapor Liquid Equilibrium (VLE)</h4>
<ul id="accordion">
	<li>What is Vapor Liquid Equilibrium (VLE)?</li>
	<ul>
		<li><b>Vapor-liquid equilibrium (VLE)</b> is a condition where a liquid and its vapor (gas phase) are in equilibrium with each other  and  the rate of evaporation (liquid changing to vapor) equals the rate of condensation (vapor changing to liquid) on a molecular level such that there is no net  vapor-liquid inter conversion. Although in theory equilibrium takes forever to reach, such an equilibrium is practically reached in a relatively closed location if a liquid and its vapor are allowed to stand in contact with each other long enough with no interference or only gradual interference from the outside. </li>

	</ul>
	<li>What will be the boiling point of a binary solution of two components with different boiling points?</li>
	<ul>
		<li> The net boiling point of binary mixture will depend on the concentration of each component and will lie within the range of Boiling Point (BP) of the two components. However in special binary solutions called azeotropes, the net BP may be higher or lower than both the components. </li>
	</ul>
	<li>what is an Ideal Solution?</li>
	<ul>
		<li>In an ideal solution, the enthalpy of mixing is zero because the average interaction between like molecules (say component A with component A) and unlike molecules (Component A and Component B) are same. The vapor liquid equilibrium of such an ideal solution follows Raoults law according to which the partial vapour pressure (P<sub>A</sub>) of a component in a binary solution is the product of its concentration (x<sub>A</sub>) and saturation vapour pressure of its pure solution (P<sub>A</sub><sup>sat</sup>)<br>P<sub>A</sub>=x<sub>A</sub>P<sub>A</sub><sup>sat</sup></li>
	</ul>


	<li> How is deviation from ideality quantified for a binary solution?</li>
	<ul>
		<li>As real binary solution are bound to deviate from ideality activity coefficient is used to represent the deviation of a component from ideality. The VLE is described by the modified Raoult’s law <br>
		P<sub>A</sub>=y<sub>A</sub>x<sub>A</sub>P<sub>A</sub><sup>sat</sup>
	
	</li>
	</ul>

	<li>How is VLE data collected?</li>
	<ul>
		<li>Vapour liquid equilibrium data is essentially a set of vapour and liquid phase concentrations obtained as isotherms (P-x-y) (Different pressure but constant T) or Isobars (T-x-y) (Constant pressure and different temperatures). An Other’s Still is used to establish vapor liquid equilibrium at different pressure or temperatures. In this experiment we will be collecting Isobaric VLE data.</li>
	</ul>
	
	<li>How is the concentration of a binary solution measured?How is the concentration of a binary solution measured?</li>
	<ul>
		<li>A refractive index meter is used to measure the concentration of a binary solution</li>
	</ul>
	
	<li>Is the data collected always reliable?</li>
	<ul>
		<li>Due to inherent errors in experimental procedures the data may not be accurate. Before accepting the data, consistency checks are done to make sure the data collected follows Gibbs Duhem Rule (Reference).</li>
	</ul>

	<li>In what form is the data fitted for different binary systems? </li>
	<ul>
		<li>The vapour liquid equilibrium data thus collected is used to fit model parameters defining relationship between logarithm of activity coefficient and the concentration of the binary solution. Different models are prescribed in the literature however in this experiment we will look into two such elementary models- Margules and Van Laar.</li>
	</ul>


	
</ul>
<br>
<br>
<a href="index.php?mode=home"><img border=0 src="images/next.jpg"></a>
</center>
</BODY>
<SCRIPT>
$("#accordion > li").click(function(){

	if(false == $(this).next().is(':visible')) {
		$('#accordion > ul').slideUp(300);
	}
	$(this).next().slideToggle(300);
});

$('#accordion > ul:eq(0)').show();

</SCRIPT>
</HTML>
