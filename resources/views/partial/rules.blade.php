@extends('main')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Rules</h3>
        </div>
        <div class="card-body text-left" style="padding: 20px;">
        	<h2>Top scoring squad</h2> 
            <ul>
            	<li>You can create a squad consisting of eleven (11) players who you think will score the most goals during the entire tournament (mostly strikers).</li>
            	<li>Once you select the squald of 11 player you need to lock the squad to start earing points.</li>
            	<li>The points are added to your account only when you loack the squad (Earlier the better to start collecting points from the first match).</li>
            	<li>This squad can't be changed once you lock it through the entire tournament.</li>
				<li>Each Goal scored by the player in your squad will earn you <b>{{env('SQUAD_GOAL_POINTS')}}</b>⭐ points.</li>
				<li>You should select a CAPTAIN in your squad, who will earn you double the points. So choose wisely.</li>
				<li>Points will be calculated after all the matches are played for the day and will be updated in your account</li>
            </ul>
            <h2>Match score predictions</h2>
            <ul>
            	<li>You can earn more points by predicting the scores of eatch match</li>
            	<li>If you predict the scores correctly the you will earn <b>{{env('MATCH_PREDICTION_CORRECT_POINTS')}}</b>⭐</li>
            	<li>If the socre prediction was wrong but you predict the winner or the result of the match correctly then you can earn <b>{{env('MATCH_PREDICTION_WORNG_RESULT_POINTS')}}</b>⭐</li>
            	<li>Also when the score prediction is wrong, you can get <b>{{env('MATCH_PREDICTION_WORNG_ONETEAM_POINTS')}}</b>⭐ points if one of the team score you predicted correctly.</li>
            </ul>
			<h2>Bonus points</h2>
			<ul>
				<li>You can earn bonus points by predicting the various WINNERS</li>
				<li>Predict the winner of 2018 FIFA world cup correctly and earn <b>120</b>⭐ bouns points</li>
				<li>Predict the winner of Golden boot and earn <b>100</b>⭐ bonus points</li>
				<li>Predict the winner of Golden glove and earn <b>100</b>⭐ bonus points</li>
				<li>Predict the winner of Golden ball and earn <b>100</b>⭐ bonus points</li>
			</ul>
			<h2>Competition's details</h2>
			<ul>
				<li>There are 3 different compettions for which we will be giving aways prozes</li>
				<li><b>TOP SQUAD</b>:  Top 3 users who earn the most points in with the squad will win gift hampers</li>
				<li><b>PREFECT PREDICTOR</b>: Top 3 users that earn the most points in the predictions will win gift hampers</li>
				<li><b>TOTAL STAR</b>: Top 3 users the earn most point accross all the competitions with combined bonus points will win gift hampers</li>
			</ul>
			<h3>YOU CAN ALSO ENROLL IN OUR CONTRIBUTED GAME TO WIN CASH PRIZES. CONTACT US FOR MORE DETAILS. YOU CAN CONTACT VIA CHAT ON HOME PAGE OR email US: <a href="mailto:fifa8teen@gmail.com">fifa8teen@gmail.com</a>
			</h3>
			<h2>GOOD LUCK..!! LIVE FOOTBALL..!! GOA..!!</h2>
        </div>
    </div>
</div>


@endsection
