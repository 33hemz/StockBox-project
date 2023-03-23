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

  .pictureSmaller {
    display: block;
    margin-left: auto;
    margin-right: auto;
    border: 1px solid #3f3f3f;
    box-shadow: 20px 20px #3f3f3f;
  }

  .bigger {
  font-size: 2em;
  font-weight: bold;
}


  .unknown_info {
    color:#1f553e
  }

</style>
@endsection

@section('content') 

<div style="height: 2vh;"></div>

{{--Sidebar--}}
<div id="sidebar" class="sidebar bg-body-secondary">
  <img src="{{ asset('assets/Full Logo/PNG/StokBox-Square-01.png') }}" style="display: block; width: 120px; position: 
  relative; margin-left: 85px; margin-right: auto;">
  <a><b style="position:relative; right: 10px">Contents:</b></a>
  <a href="#intro">Introduction</a>
  <a href="#landing">Landing Page</a>
  <a href="#user_features" style="font-size: 1.5em; font-weight: bold"; >User Features</a>
  <a href="#login">Logging You In</a>
  <a href="#dash">Dashboard Page</a>
  <a href="#forgotten">Forgotten Password</a>
  <a href="#brand">Brand Page</a>
  <a href="#nav">Navigation Bar</a>
  <a href="#admin" style="font-size: 1.5em; font-weight: bold">Admin Features</a>
  <a href="#update">Updating The Database</a>
  <a href="#addingNewUser">Adding a New User</a>

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
    <h2 id=user_features class="title bigger"> User Features</h2>
    <h2 id="login" class="title">Logging You In…</h2>
    <div class="para">
      <p>
        From the landing page, press sign in to navigate to the landing page…</p>
        <br>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/sign_in_page_button_image.png ') }}" alt="">
        <br><br>
        Enter your credentials into the box provided and press Log in…
        <br>  <br>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture4.jpg') }}" alt="">
        <br>
        <p>
          If you put the wrong credentials in, you’ll get a message telling you so…
        </p>
        <br>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture5.jpg') }}" alt="">
        <br><br>

        <h2 id="dash" class="title">Dashboard Page</h2>
        <p>Once logged in, you can see your dashboard…
        At a glance, you can see all analytics relevant to your company and queries…
        </p>

        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture7.jpg') }}" alt="">
        <br> <br>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture8.jpg') }}" alt="">
      </p>
      <br>
      <h2 id="forgotten" class="title">Forgotten Password</h2>      
      <p>
        If you forgot password, it’s no problem
        Simply click forgot password…
      </p>
      <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture9.jpg') }}" alt="">
      <br><br>
      <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture10.jpg') }}" alt="">
      <br>
      <p> …and you’ll be sent a recovery email </p>

      <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture11.jpg') }}" alt="">

      <br>

      <p> Follow the Reset Password link, and enter your new credentials. <p>

        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture12.jpg') }}" alt="">
      <br>
        <h1>
        <h2 id="brand" class="title">Brand Page</h2>
        </h1>
        <p>
          You can customize the data we present by adding categories to your brand page…
          Simply select and Submit a new category. It’ll be added and stored to your brand page.

        </p>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture13.jpg') }}" alt="">
        <br>
        <br>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture14.jpg') }}" alt="">
        <br>
        <h1>
          <h2 id="nav" class="title">Navigation Bar</h2>
        </h1>
        <p>
          You can move around the various features of the webapp by using the navigation bar
        </p>

        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture15.jpg') }}" alt="">
        <br>
        <h1>
          <h2 id="admin" class="title bigger">Admin Features</h2>
        </h1>
        <h2>
          <h2 id="update" class="title">Updating The Database</h2>
        </h2>
        <p>
          An admin can update the database by uploading a new CSV
          Simply choose a new file, in the relevant formats and in the correct
        </p>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture16.jpg') }}" alt="">
        <br>
        <h1>
          <h2 id="addingNewUser" class="title">Adding a New User</h2>
        </h1>
        <p>
          An admin can add a new user…
          Simply select and add what company they are part of and submit it…
          Then input your user details
        </p>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture17.jpg') }}" alt="">

    
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