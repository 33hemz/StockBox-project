@extends('templates.master')

@section('title', 'User Manual')

@section('head')
<style>

  .sidebar {
    position: sticky;
    left: 0;
    top: 0;
    margin-bottom: -1000px;
    width: 300px;
    background-color: #e0e0e0;
    height: 1000px;
  }
  .sidebar a {
    display: block;
    font-size: 20px;
    font-weight:500;
    text-decoration: none;
    color: #2db490;
    padding-left: 30px;
  }

  .sidebar li {
    color:#1d8369
  }

  .ml-1 {
    margin-left: 300px;
    position: sticky;
    right: 0;
    left: 0;
    font-weight:200;
    background-color:#2db490;
    padding-left: 50px;
    border-radius: 5px 0 0 0;
  }

  .title {
    padding-top: 40px;
    text-align: center;
    font-size: 30px;
    font-weight: 600;
  }
  
  .subtitle {
    font-size: 20px;
    font-weight: 400;
  }

  .para {
    padding-inline: 50px;
    padding-right: 100px;
  }

  .picture {
    width: 750px;
    display: block;
    margin-left: auto;
    margin-right: auto;
    border: 1px solid #3f3f3f;
    box-shadow: 20px 20px #3f3f3f;
  }

  .unknown_info {
    color:#1f553e
  }

</style>
@endsection

@section('content') 

<div style="height: 2vh;"></div>

{{--Sidebar--}}
<div id="sidebar" class="sidebar">
  <img src="{{ asset('assets/Full Logo/PNG/StokBox-Square-01.png') }}" style="display: block; width: 120px; position: 
  relative; margin-left: 85px; margin-right: auto;">
  <a><b style="position:relative; right: 10px">Contents:</b></a>
  <a href="#intro">Introduction</a>
  <a href="#landing">Landing Page</a>
  <a href="#login">Login</a>
  <li><a href="#login_retrieve" style="font-size: 17px; margin-left: 10px;"> Retrieving your login</a></li>
  <li><a href="#login_initial" style="font-size: 17px; margin-left: 10px;">Initial login</a></li>
  <li><a href="#login_login" style="font-size: 17px; margin-left: 10px;">Logging in</a></li>
  </div>

  {{--Main Page--}}
  <div class="ml-1">
    <div class="main" style="color: #ececec; right: 0;">

    {{--Title--}}
    <h1 class='title' style="font-size: 50px; text-align: left;">Stokbox: User Manual
      <img src="{{ asset('assets/Full Logo/PNG/StokBox-Square-02(B&W).png') }}" 
      style="width: 90px; position: absolute; top: 25px"></h1>

    {{--Introduction--}}
    <h2 id="intro" class="title">Introduction</h2>
    <div class="para">
    <p>
    Welcome to Stokbox Analytics. This is a platform that allows your company to view and generate  personas of customers. 
    From this, you can then be provided with information about the audience that are likely to purchase a given product.
    </p><p>
    Our platform allows you to query our database using filters and searches (narrowing it down to a specific product or
    group of products). Our database contains lots of information about thousands of products sold in UK supermarkets. 
    The database then queries another database containing user data which is used by our algorithm to generate your persona.
    All data can then be found on your user dashboard. 
    </p><p>
    We understand navigating a new platform can be daunting, 
    which is why we have created this simple interface that guides you through the process. Let us show you how to get
    started and get set up with our website...
    </p>
    </div>

    {{--Landing--}}
    <h2 id="landing" class="title">Landing Page</h2>
    <div class="para">
      <p>
      The landing page can be found by pressing “<b>Home</b>” from the top navigation bar by using the link: 
      <b class="unknown_info">http//www.stokbox.co.uk/landing</b>. Once you have navigated there, you should see the
      following page:
      </p>
      <br>
      <img class="picture" src="{{ asset('assets/User Manual Images/landing_page_image.png ') }}" alt="">
      <br><br>
      <p>
        This page serves as a gateway to allow users who are not logged in to access certain areas of our website.
        Specifically, this allows you to navigate to three areas:
        <ol>
          <li>"<b>Home</b>" - This will redirect you to the same page.</li>
          <li>"<b>Help</b>" - This is where you are currently viewing this help notice.</li>
          <li>"<b>Sign In</b>" - This take you to our login page, where you can sign in and access more areas of our
            website.</li>
    </div>

    {{--Login--}}
    <h2 id="login" class="title">Logging In</h2>
    <div class="para">
      <p>
        Logging into our website is simple. However, it requires that you receive your login details from one of our admins…
      </p>
      <p id="login_retrieve"class="subtitle">Retrieving your login</p>
      <p>To create an account with Stokbox Analytics, you will need to follow the following steps:</p>
      <ol>
        <li>Contact us by emailing <b class="unknown_info">support@stokbox.co.uk</b> and requesting an account.</li>
        <li>Our administrators will respond promptly and provide you with your details in an email.</li>
        <li>Use the account details to log in for the first time.</li>
      </ol>
      <p>
        It is important that you ensure that you do not share your login credentials with anyone when logging onto our system.
      </p>
      <p id="login_initial" class="subtitle">Initial log in</p>
      <p id="login_login" class="subtitle">Logging in</p>
      <p>
        To be taken to the login page, press "<b>Sign In</b>" from the landing page. From here, you should see the following...
      </p>
      <br>
      <img class="picture" src="{{ asset('assets/User Manual Images/login_page_image.png ') }}" alt="">
      <br><br>
      <p>
        As prompted, enter your username and password into the text boxes and press the “<b>Log In</b>” button. This will take you to your 
        dashboard. However, if your credentials are incorrect, or you did not fill out both boxes, you will receive an error message informing
         you what actions to perform.
      </p>
    </div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

{{--
 w  c(..)o    (
  \__( -)    __)
      / \   (
     /(_ )___)
    w / |
     |  \
    m   m
--}}
@endsection