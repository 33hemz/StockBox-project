<html>

  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://kit.fontawesome.com/cd1181b8ae.js" crossorigin="anonymous"></script>

  <style>

  .Navbar {
  height: 100%;
  width: 0;
  position: fixed;
  top: 0;
  left: 0;
  background-color: #2db28e;
  overflow-x: hidden;
  transition: 0.3s;
  padding-top: 60px;
}

.Navbar a {
  padding: 10px 10px 10px 32px;
  text-decoration: none;
  font-size: 18px;
  font-family: sans-serif;
  color: white;
  display: block;
  transition: 0.3s;
}

.Navbar a:hover {
  color: #D3D3D3;
}

.Navbar .close {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 25px;
  margin-left: 50px;
}

.open {
  font-size: 20px;
  cursor: pointer;
  background-color: #2db28e;
  color: white;
  padding: 10px 15px;
  border: none;
}

.open:hover {
  background-color: #1b6b55;
}

#collapse {
  transition: margin-left .5s;
  padding: 16px;
}

  </style>
  
  </head>
  
  <body>
  <header>
 <div id="collapse">
 <button class="open" onclick="openNav()"><i class="fa-solid fa-bars"></i></button>
 
 </div>
 
 
 <nav id="navbar" class="Navbar">
  <a href="javascript:void(0)" onclick="closeNav()" class="close"><i class="fa-solid fa-circle-xmark"></i></a>
 <ul>
   <a href=""><i class="fa-solid fa-gauge"></i> Dashboard Page</a>
   <a href=""><i class="fa-solid fa-user"></i> About Us</a>
 </ul>
 </nav>
 </header>

 <script>
 function openNav() {
document.getElementById("navbar").style.width = "260px";
document.getElementById("collapse").style.marginLeft = "260px";
}
function closeNav() {
  document.getElementById("navbar").style.width = "0";
  document.getElementById("collapse").style.marginLeft= "0";
}
 </script>
  </body>
</html>
