<?php
	require '../session.php';
	require '../header.php';
?>
<body>
<div>
	<form action="result.php" method="post">
		<div class="">

		<h2>Genaral Medical Question</h2>

		<p>Do you have Diabetes ? </p>

		<input type="radio" name="q1" value="Yes"><label><b> Yes</b></label></br>

		<input type="radio" name="q1" value="No"><label><b> No</b></label>

	</div>

	<div class="">

		<h2>Genaral Medical Question</h2>

		<p>Have you ever had cancer ? </p>

		<input type="radio" name="q2" value="Yes"><label><b> Yes</b></label></br>

		<input type="radio" name="q2" value="No"><label><b> No</b></label>

	</div>

	<div class="question">

		<h2>General Medical Question</h2>

		<p>Have you ever had kidney or blood problems ?</p>

		<input type="radio" name="q3" value="Yes"><label><b> Yes</b></label></br>

		<input type="radio" name="q3" value="No"><label><b> No</b></label>

	</div>

	<div class="question">

		<h2>Life Style Question</h2>

		<p>In the last 3 months have you had a tattoo ?</p>

		<input type="radio" name="q4" value="Yes"><label><b> Yes</b></label></br>

		<input type="radio" name="q4" value="No"><label><b> No</b></label>

	</div>

	<div class="question">

		<h2>Life Style Question</h2>

		<p>Are you suffering from a social-deceases ?</p>

		<input type="radio" name="q5" value="Yes"><label><b> Yes</b></label></br>

		<input type="radio" name="q5" value="No"><label><b> No</b></label>

	</div>

	</form>

</div>
	
</body>

</html>