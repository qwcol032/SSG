<!DOCTYPE HTML>
<!--
	Hielo by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<head>
  <title>HellCamp</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="/static/css/main.css" />
</head>
<body>
  <?php include (APPPATH."views/modal/join_modal.php"); ?>
  <header id="header">
    <div class="logo"><a href="/main/get/1">HELL CAMP</a></div>
    <a href="#menu">Menu</a>
  </header>


  <!-- Nav -->
  <nav id="menu">
    <ul class="links">
      <li><a href="/">Home</a></li>
      <li><a href="/">사용자님</a></li>
      <li><a href="/">Logout</a></li>
    </ul>
  </nav>

  <!-- One -->
  <section id="One" class="wrapper style3">
    <div class="inner">
      <header class="align-center">
        <p>WELCOME</p>
        <h2>HELL CAMP</h2>
      </header>
    </div>
  </section>

		<!-- Main -->
			<div id="main" class="container" style="text-align:center;">

				<!-- Elements -->

								<h3>Login</h3>

							<form method="post" action="#">
									<div class="row uniform">
										<div class="6u 12u$(xsmall)">
											<input type="text" name="userid" id="login_userid" value="" placeholder="ID" />
										</div>
										<div class="6u$ 12u$(xsmall)">
											<input type="password" name="password" id="login_password" value="" placeholder="PW" />
										</div>
										<div class="12u$" style="">

												<div class="btn" id="login_btn" value="Login">Login</div>
                        <div class="btn" style="margin-top:10px;"  id="join_show" value="Join">Join</div>

										</div>
									</div>
								</form>
            </div


		<!-- Footer -->


		<!-- Scripts -->
			<script src="/static/js/jquery.min.js"></script>
			<script src="/static/js/jquery.scrollex.min.js"></script>
			<script src="/static/js/skel.min.js"></script>
			<script src="/static/js/util.js"></script>
			<script src="/static/js/main.js"></script>
      <script>
        $("div#join_show").on("click", function(){
          $("div#join_modal").show();
          $("div#modal_background").show();
        });

        $("div#join_btn_close").on("click", function(){
          $("div#join_modal").hide();
          $("div#modal_background").hide();
        });


        $("div#login_btn").on("click", function(){
          var userid = $("input#login_userid").val();
          var password = $("input#login_password").val();
          var data = new FormData();
          data.append("userid", userid);
          data.append("password", password);

          $.ajax({
            type: "POST",
            url: "/index.php/api/login",
            data: data,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function(data) {
              if (data['status']!="success"){
                alert(data['reason']);
              } else {
                alert("Login Success");
                location.reload();
              }
            }
          });
        });



        $("div#join_btn").on("click", function(){
          var userid = $("input#userid").val();
          var password = $("input#password").val();
          var pw_check = $("input#pw_check").val();
          var name = $("input#username").val();
          var email = $("input#email").val();
          var data = new FormData();
          data.append("userid", userid);
          data.append("password", password);
          data.append("pw_check", pw_check);
          data.append("name", name);
          data.append("email", email);
          $.ajax({
            type: "POST",
            url: "/index.php/api/join",
            data: data,
            dataType: "json",
            processData: false,
            contentType: false,

            success: function(data) {
              if (data['status']!="success"){
                alert(data['reason']);
              } else {
                alert("Join Success");
                location.reload();
              }
            }

          });
        });

      </script>


	</body>

</html>
