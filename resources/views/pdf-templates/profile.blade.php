<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <!-- FONTS -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<style>
    * {
  box-sizing: border-box;
  transition: 0.35s ease;
}
.rela-block {
  display: block;
  position: relative;
  margin: auto;
  top: ;
  left: ;
  right: ;
  bottom: ;
}
.rela-inline {
  display: inline-block;
  position: relative;
  margin: auto;
  top: ;
  left: ;
  right: ;
  bottom: ;
}
.floated {
  display: inline-block;
  position: relative;
  margin: false;
  top: ;
  left: ;
  right: ;
  bottom: ;
  float: left;
}
.abs-center {
  display: false;
  position: absolute;
  margin: false;
  top: 50%;
  left: 50%;
  right: false;
  bottom: false;
  transform: translate(-50%, -50%);
  text-align: center;
  width: 88%;
}
body {
  font-family: 'Open Sans';
  font-size: 18px;
  letter-spacing: 0px;
  font-weight: 400;
  line-height: 28px;
  background: url("http://kingofwallpapers.com/leaves/leaves-016.jpg") right no-repeat;
  background-size: cover;
}
body:before {
  content: "";
  display: false;
  position: fixed;
  margin: 0;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(255,255,255,0.92);
}
.caps {
  text-transform: uppercase;
}
.justified {
  text-align: justify;
}
p.light {
  color: #777;
}
h2 {
  font-family: 'Open Sans';
  font-size: 30px;
  letter-spacing: 5px;
  font-weight: 600;
  line-height: 40px;
  color: #000;
}
h3 {
  font-family: 'Open Sans';
  font-size: 21px;
  letter-spacing: 1px;
  font-weight: 600;
  line-height: 28px;
  color: #000;
}
.page {
  width: 100%;
  max-width: 1200px;
  margin: 80px auto;
  background-color: #fff;
}
.top-bar {
  height: 220px;
  background-color: #848484;
  color: #fff;
}
.name {
  display: false;
  position: absolute;
  margin: false;
  top: false;
  left: calc(350px + 5%);
  right: 0;
  bottom: 0;
  height: 120px;
  text-align: center;
  font-family: 'Raleway';
  font-size: 58px;
  letter-spacing: 8px;
  font-weight: 100;
  line-height: 60px;
}
.name div {
  width: 94%;
}
.side-bar {
  display: false;
  position: absolute;
  margin: false;
  top: 60px;
  left: 5%;
  right: false;
  bottom: 0;
  width: 250px;
  background-color: #f7e0c1;
  padding: 320px 20px 50px;
}
.mugshot {
  display: false;
  position: absolute;
  margin: false;
  top: 50px;
  left: 20px;
  right: false;
  bottom: false;
  height: 210px;
  width: 210px;
}
.mugshot .logo {
  margin: -20px;
}
.logo {
  display: false;
  position: absolute;
  margin: false;
  top: 0;
  left: 0;
  right: false;
  bottom: false;
  z-index: 100;
  margin: 0;
  color: #000;
  height: 250px;
  width: 250px;
}
.logo .logo-svg {
  height: 100%;
  width: 100%;
  stroke: #000;
  cursor: pointer;
}
.logo .logo-text {
  display: false;
  position: absolute;
  margin: false;
  top: 58%;
  left: ;
  right: 16%;
  bottom: ;
  cursor: pointer;
  font-family: "Montserrat";
  font-size: 55px;
  letter-spacing: 0px;
  font-weight: 400;
  line-height: 58.333333333333336px;
}
.social {
  padding-left: 60px;
  margin-bottom: 20px;
  cursor: pointer;
}
.social:before {
  content: "";
  display: false;
  position: absolute;
  margin: false;
  top: -4px;
  left: 10px;
  right: false;
  bottom: false;
  height: 35px;
  width: 35px;
  background-size: cover !important;
}
.social.twitter:before {
  background: url("https://cdn3.iconfinder.com/data/icons/social-media-2026/60/Socialmedia_icons_Twitter-07-128.png") center no-repeat;
}
.social.pinterest:before {
  background: url("https://cdn3.iconfinder.com/data/icons/social-media-2026/60/Socialmedia_icons_Pinterest-23-128.png") center no-repeat;
}
.social.linked-in:before {
  background: url("https://cdn3.iconfinder.com/data/icons/social-media-2026/60/Socialmedia_icons_LinkedIn-128.png") center no-repeat;
}
.social.facebook:before {
  background: url("https://cdn3.iconfinder.com/data/icons/social-media-2026/60/Socialmedia_icons_Facebook-128.png") center no-repeat;
}

.side-header {
  font-family: 'Open Sans';
  font-size: 18px;
  letter-spacing: 4px;
  font-weight: 600;
  line-height: 28px;
  margin: 60px auto 10px;
  padding-bottom: 5px;
  border-bottom: 1px solid #888;
}
.list-thing {
  padding-left: 25px;
  margin-bottom: 10px;
}
.content-container {
  margin-right: 0;
  width: calc(95% - 250px);
  padding: 25px 40px 50px;
}
.content-container > * {
  margin: 0 auto 25px;
}
.content-container > h3 {
  margin: 0 auto 5px;
}
.content-container > p.long-margin {
  margin: 0 auto 50px;
}
.title {
  width: 80%;
  text-align: center;
}
.separator {
  width: 240px;
  height: 2px;
  background-color: #999;
}
.greyed {
  background-color: #ddd;
  width: 100%;
  max-width: 580px;
  text-align: center;
  font-family: 'Open Sans';
  font-size: 18px;
  letter-spacing: 6px;
  font-weight: 600;
  line-height: 28px;
}
@media screen and (max-width: 1150px) {
  .name {
    color: #fff;
    font-family: 'Raleway';
    font-size: 38px;
    letter-spacing: 6px;
    font-weight: 100;
    line-height: 48px;
  }
}

</style>
  </head>
<!-- PAGE STUFF -->
<body>
<div class="rela-block page">
    <div class="rela-block top-bar">
        <div class="caps name"><div class="abs-center">{{ $user->name }}</div></div>
    </div>
    <div class="side-bar">
        <div class="mugshot">
            <div class="logo">
                <img src={{ $profile->avatar ?? $profile->image_path }} width="100%" height="auto" style="border-radius:100%" />
            </div>
        </div>
        <p>{{ $profile->address }}</p>
        <p>{{ $profile->state }}, {{ $profile->country }}</p>
        <p>{{ $user->phone }}</p>
        <p>{{ $user->email }}</p><br>
        @if($profile->twitter !== null)
          <p class="rela-block social twitter">{{ $profile->twitter }}</p>
        @endif
        @if($profile->twitter !== null)
          <p class="rela-block social facebook">{{ $profile->facebook }}</p>
        @endif
        {{-- <p class="rela-block social pinterest">Pinterest things</p> --}}
        @if($profile->twitter !== null)
          <p class="rela-block social linked-in">{{ $profile->linkedin }}</p>
        @endif
        <p class="rela-block caps side-header">Expertise</p>
        <p class="rela-block list-thing">{{ $profile->skills }}</p>
        <p class="rela-block caps side-header">Education</p>
        @if($user->education !== null)
          @foreach($user->education as $education)
            <p class="rela-block list-thing">{{ $education->description }}</p>
          @endforeach
        @endif
    </div>
    <div class="rela-block content-container">
        <h2 class="rela-block caps title">{{ $profile->professional_headline }}</h2>
        <div class="rela-block separator"></div>
        <div class="rela-block caps greyed">Profile</div>
        <p class="long-margin">{{ $profile->about_me }}</p>
        <div class="rela-block caps greyed">Experience</div>
          @if($user->expirience !== null)
            @foreach($user->expirience as $expirience)
              <h3>{{ $expirience->job_title }}</h3>
              <p class="light">{{ $expirience->start_date }} - {{ $expirience->end_date }}</p>
              <p class="justified">{{ $expirience->description }}</p>
            @endforeach
          @endif
        </div>
</div>
</body>
</html>