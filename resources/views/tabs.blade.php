<style>
    section {
  display: none;
  padding: 20px 0 0;
  border-top: 1px solid #ddd;
}

input {
  display: none;
}
.fa-chevron-up {
  color:greenyellow;
}
.fa-chevron-down{
  color:red;
}
.label {
    position: relative;
    height: 20px;
    left: -19px;
    bottom: -14px;
    font-size: 11px;
    width: 20px;
    display: inline-block;
    border-radius: 30px;
    padding-top: 4px;
    padding-left: 5px;
}
label {
  display: inline-block;
  margin: 0 0 -1px;
  padding: 15px 25px;
  font-weight: 600;
  text-align: center;
  color: #bbb;
  border: 1px solid transparent;
}

label:before {
  font-family: fontawesome;
  font-weight: normal;
  margin-right: 10px;
}

/* label[for*='1']:before { content: '\f1cb'; }
label[for*='2']:before { content: '\f17d'; }
label[for*='3']:before { content: '\f16b'; } */

label:hover {
  color: #888;
  cursor: pointer;
}

input:checked + label {
  color: #555;
  border: 1px solid #ddd;
  border-top: 2px solid #88b02c;
  border-bottom: 1px solid #fff;
}

#tab1:checked ~ #content1,
#tab2:checked ~ #content2,
#tab3:checked ~ #content3,
#tab4:checked ~ #content4 {
  display: block;
}

@media screen and (max-width: 650px) {
  label {
    font-size: 10px;
  }
  label:before {
    margin: 0;
    font-size: 18px;
  }
}

@media screen and (max-width: 400px) {
  label {
    padding: 15px;
  }
}
</style>
<input id="tab2" type="radio" name="tabs" {{$type=='predictions' || !$type ? 'checked' : ''}}>
<label for="tab2">
    <i class="fa fa-signing"></i> Match Predictor
    <i class="fa fa-info-circle" title="Top match scores predictors ranking " data-toggle="tooltip" title="Hooray!"></i>
</label>
<input id="tab1" type="radio" name="tabs" {{$type=='squads' ? 'checked' : ''}}>
<label for="tab1">
    <i class="fa fa-soccer-ball-o"></i>  Goal Scorers 
    <i class="fa fa-info-circle" title="Top goal scorer squads ranking" data-toggle="tooltip" title="Hooray!"></i>
</label> 


<input id="tab3" type="radio" name="tabs" {{$type=='all' ? 'checked' : ''}}>
<label for="tab3">
<i class="fa fa-pied-piper"></i> Dominators
    <i class="fa fa-info-circle" title="Main ranking" data-toggle="tooltip" title="Hooray!"></i>
</label>


<section id="content1">
@include('leaderboard.squad')
</section>

<section id="content2">
    @include('leaderboard.match-prediction')
</section>

<section id="content3">
    @include('leaderboard.all')
</section>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
  