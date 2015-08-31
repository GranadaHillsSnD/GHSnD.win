@extends('master')

@section('title', 'Meet the Staff')

@section('styles')
  <style>
    .category {
      font-size: 125%;
    }
    .card {
      background-color: #fff;
      border-radius: 3px;
      margin-bottom: 60px;
      margin-left: -1px;
      margin-right: -1px;
      border: 1px solid #edeeee;
      clear:both;
      padding: 1em 2em 1em 2em;
    }
    .card h2 {
      text-align: center;
      font-size: 30px;
      line-height: 30px;
      padding-bottom: 1em;
    }
    .card h3 {
      text-align: center;
    }
    .big-info {
      border-bottom: 1px solid;
      margin-bottom: 3em;
      margin-top: 2em;
    }
    .about {
      text-align: justify;
      -moz-text-align-last: justify;
      text-align-last: justify;
    }
    .officer-section img {
      height: 100px;
      padding-right: 8px;
    }
  </style>
@stop

@section('content')
<div class="card officer-info">
  <h2>Know Your Officers</h2>

  <div class="officer-section">
    <p><img class="pull-left" src="https://lh6.googleusercontent.com/WCDODrdtVabhyzWoIMaJaJdvOrwHo2j4TpgYcm1mWFxJWEGttYViID6OzztgooMgBHVo07buRZ-u0y6EgGiEXQjwyEm_XkzqcJZY7DrqRABHwsXaquNiJmrZEF2qRP0kgeDJBAA"><h1><strong>Vikas “Ficus” Chauhan</strong></h1>Vikas is the 2015-2016 Debate Captain. He really only does Debate but that might change. He is a junior who likes to listen to rap music and eat lots of pizza. He never leaves B12 so you know where to find him.<h1>(818-216-8194)</h1></p>
  </div>

  <div class="officer-section">
    <p class="pull-left"><img class="pull-left" src="https://lh4.googleusercontent.com/XCnzjjFdtkJt_a097VG_g5-KNbOEYN6dY484wLFmrXPzDTRRuRa_igzzfCJMiNrbNT21b0699hCt12vDCpmf-ngjARqpwWHsFOICDQOMpaBtNMpfoIMB0_sYu85JtoQeldIot0g"><h1><strong>Aaron “Air-Bear” Rubanowitz</strong></h1>Aaron is the 2015-2016 Speech Captain. He is a senior and this is his third year on the team. He is ranked on the state level in oratorical and dramatic interpretation; he is ranked nationally in dramatic interpretation. He’s looking forward to a great year in speech and debate.<h1>(818-825-2618)</h1></p>
  </div>

  <div class="officer-section">
    <p class="pull-left"><img class="pull-left" src="https://lh3.googleusercontent.com/K7IbYYLW-vk3iNd_B0gd_hCLabFVy5bNiWF2cV3-oJCv_qBVDDRM0mIMiNnKYFODXZWCbtJmtFJtlEShU-p1MDDHpU5YAOn4ACzYq7tHvt0UlKJnVl7GV6p-PS_SjpqiCvq1RWA"><h1><strong>Gurbir "Grubber" Singh</strong></h1>Gurbir is the Secretary for the 2015-2016 year. He is a second year junior who has experience in Speech, Debate, and is starting Congress. He loves meeting new people so come say Hi! Also he is looking for new shows on Netflix, so if you have a recommendation, let him know.<h1>(818-294-6279)</h1></p>
  </div>

  <div class="officer-section">
    <p class="pull-left"><img class="pull-left" src="https://lh4.googleusercontent.com/4WPRsIF8W8BUwqLGXENVPRmbxwNyQZAOBQ3RM1BUBFsqjZ5qMRC1pEjoy4Ha67TfTWGe-CZIiLyZaaIUgbRJgz9ewf0eqaJcjkS3QbKzECzXtoRR1pYzk6deBnUBX2qeB0QgzSI"><h1><strong>Mohib "The Bro Wonder" Jafri</strong></h1>Mohib is the Treasurer for the 2015-16 year. He is a second year junior that focuses on Debate, but does Speech and Congress as well. He enjoys brief walks on the beach and listens to tepid mix tapes. He also gives out free signatures on your new planner on Mondays in B12, ($3.50 for a picture).<h1>(818-401-3963)</h1></p>
  </div>

  <div class="officer-section">
    <p class="pull-left"><img class="pull-left" src="https://lh3.googleusercontent.com/P5mmTi3Pl_fyP2LgmzcHlfV35ulG4_zPYh67TjIey9MwlfgEqN8mt7xsoSrXN-6Pj31HAA7L9YPyESQF5ngsfRZCzHkY-IE8lRcZijaO3nCUGaWWCp5IOzMmfAp7xfbdD2kI5zA"><h1><strong>Cory “The Boi Wonder” Cunanan</strong></h1>Cory is the 2015-2016 Head Historian and manager of the GHCHS website. He is a junior who has been on this team for 3 years, doing Congress, Speech, and Debate regularly. You can buy his mixtape “Straight Fire” on Soundcloud for 4.99.<h1>(818-671-9282)</h1></p>
  </div>

  <div class="officer-section">
    <p class="pull-left"><img class="pull-left" src="https://lh4.googleusercontent.com/DvklfHtlzlacgbkGKHUj1JaS_dnzEY4n5WjsJ9PVXuy1s-TcfIySx4oK7Ivv6IEoI1VbUwwDESBfFa1PzD4nY_Ej30iEvo8-uECPqtBaPFsxYrH8RKvhBz1kO7dmrMQC9_nSHFY"><h1><strong>Mr. Robinson</strong></h1>Mr. Robinson is the GHCHS Speech and Debate Head Coach. Mr. Robinson has a double black diamond pin, the highest achievement given by the National Speech and Debate Association and has almost 20 years of coaching experience under his belt. He teaches ninth grade English in B12, where he can be found every day.<h1><a href="mailto:jrobinson@ghchs.com">jrobinson@ghchs.com</a></h1></p>
  </div>

  </div>
</div>

@stop
