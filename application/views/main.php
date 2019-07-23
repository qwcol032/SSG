<!DOCTYPE HTML>
<!--
	Hielo by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Hielo by TEMPLATED</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="/static/css/main.css" />
	</head>
	<body>
		<?php include (APPPATH."views/modal/post_modal.php"); ?>
		<header id="header">
			<div class="logo"><a href="/main/get/1">HELL CAMP</a></div>
			<a href="#menu">Menu</a>
		</header>


		<!-- Nav -->
		<nav id="menu">
			<ul class="links">
				<li><a href="/">Home</a></li>
				<li><a href="/"><?php echo $this->session->userdata('username'); ?>님</a></li>
				<li><a href="/index.php/api/logout">Logout</a></li>
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
		<!-- Header -->

		<section id="one" class="wrapper style2">
			<div class="inner">

					<div class="plus_btn" id="plus_btn" >PLUS</div>
		</secion>

		<!-- One -->
			<section id="one" class="wrapper style2">
				<div class="inner">
					<div class="grid-style">


            <?php
              foreach ($result as $item) {
                echo "<div><div class='box'><div class='content'><header class='align-center'>";
                echo "<h2>".$item->title."</h2></header>";
                echo "<p style='text-align:center;'>".$item->description."</p>";
                echo "<footer class='align-center'><a id='detail' onclick=\"show_detail(".$item->id.", '".$item->title."', '".$item->description."')\" class='button alt'>Learn More</a>";
                echo "</footer></div></div></div>";
              }
             ?>


					</div>
				</div>
			</section>



		<!-- Two -->

		<!-- Scripts -->
			<script src="/static/js/jquery.min.js"></script>
			<script src="/static/js/jquery.scrollex.min.js"></script>
			<script src="/static/js/skel.min.js"></script>
			<script src="/static/js/util.js"></script>
			<script src="/static/js/main.js"></script>

			<script>


			$("div#post_btn_delete").on("click", function(){
				var id = $("div#post_btn").attr("uid");
				var data = new FormData();
				data.append("id", id);
				$.ajax({
					type: "POST",
					url: "/index.php/api/delete",
					data: data,
					dataType: "json",
					processData: false,
					contentType: false,
					success: function(data) {
						if (data['status'] != "success"){
							alert(data['reason']);
						} else {
							alert("Success");
							location.reload();
						}
					}
				});
			});

			function show_detail(id , title, description){
				$("input#title").val(title);
				$("textarea#textarea").val(description);
				$("div#post_btn").attr("status", "edit");
				$("div#post_btn").attr("uid", id);
				$("div#post_btn_delete").show();
				$("div#post_modal").show();
				$("div#modal_background").show();
			}

			$("div#plus_btn").on("click", function(){
				$("div#post_btn").attr("status", "add");
				$("div#post_btn_delete").hide();
				$("div#post_modal").show();
				$("div#modal_background").show();
			})

			$("div#post_btn_close").on("click", function(){

				$("input#title").val('');
				$("textarea#textarea").val(''); //기존의 사용자 입력값을 제거

				$("div#post_modal").hide();
				$("div#modal_background").hide();
			});

		  $("div#post_btn").on("click", function(){
				var status = $("div#post_btn").attr("status");

				if(status=="add"){
					var title = $("input#title").val();
					var description = $("textarea#textarea").val();
					var data = new FormData();
					data.append("title", title);
					data.append("description", description);
					$.ajax({
						type: "POST",
						url: "/index.php/api/add",
						data: data,
						dataType: "json",
						processData: false,
						contentType: false,

						success: function(data) {
							if (data['status']!="success"){
								alert(data['reason']);
							} else {
								alert("Success");
								location.reload();
							}
						}
					});
				} else {
					var id = $("div#post_btn").attr("uid");
					var title = $("input#title").val();
					var description = $("textarea#textarea").val();
					var data = new FormData();
					data.append("id", id);
					data.append("title", title);
					data.append("description", description);
					$.ajax({
						type: "POST",
						url: "/index.php/api/edit",
						data: data,
						dataType: "json",
						processData: false,
						contentType: false,

						success: function(data) {
							if (data['status']!="success"){
								alert(data['reason']);
							} else {
								alert("Success");
								location.reload();
							}
						}
					});
				}
			});
			</script>

	</body>
</html>
