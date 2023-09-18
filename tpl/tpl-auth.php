<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url("https://fonts.googleapis.com/css?family=Karla:400,700");
        body {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        font-size: 16px;
        font-family: 'Karla', sans-serif !important;
        }

        textarea, input {
        border: none;
        background-image: none;
        background-color: transparent;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
        min-height: 50px;
        background-color: #F7F7F7;
        padding: 15px;
        box-sizing: border-box;
        font-family: 'Karla', sans-serif !important;
        border-radius: 25px;
        }
        textarea:focus, input:focus {
        outline: none;
        }

        button {
        border: none;
        background-image: none;
        background-color: transparent;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
        -webkit-box-shadow: 0vw 1vh 3vh -1vh rgba(0, 0, 0, 0.3);
        -moz-box-shadow: 0vw 1vh 3vh -1vh rgba(0, 0, 0, 0.3);
        box-shadow: 0vw 1vh 3vh -1vh rgba(0, 0, 0, 0.3);
        padding: 10px;
        text-align: center;
        height: 50px;
        min-width: 80px;
        font-family: 'Karla', sans-serif !important;
        border-radius: 25px;
        box-sizing: border-box;
        font-weight: 800;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        }
        button:focus {
        outline: none;
        }

        #background {
        position: fixed;
        background-color: #F8CB98;
        width: 100%;
        height: 100%;
        transition: all 0.3s ease-in-out;
        }

        #background.two {
        background-color: #AE94DE;
        }

        #panel-box {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        margin: auto;
        -webkit-box-shadow: 0vw 3vh 6vh -2vh rgba(0, 0, 0, 0.4);
        -moz-box-shadow: 0vw 3vh 6vh -2vh rgba(0, 0, 0, 0.4);
        box-shadow: 0vw 3vh 6vh -2vh rgba(0, 0, 0, 0.4);
        position: absolute;
        height: 700px;
        min-width: 800px;
        width: 60%;
        max-width: 1000px;
        box-sizing: border-box;
        overflow: hidden;
        background-color: white;
        border-radius: 20px;
        }

        .panel {
        display: inline-block;
        position: relative;
        height: 100%;
        }
        .panel:nth-child(1) {
        float: left;
        width: 40%;
        overflow: hidden;
        }
        .panel:nth-child(1) .auth-form {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        margin: auto;
        width: 70%;
        max-width: 250px;
        left: 100%;
        text-align: center;
        opacity: 0;
        transition: all 0.3s ease-in-out;
        }
        .panel:nth-child(1) .auth-form.on {
        opacity: 1;
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        margin: auto;
        }
        .panel:nth-child(2) {
        float: right;
        width: 60%;
        }
        .panel:nth-child(2) #switch {
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-box-shadow: 0vw 1vh 3vh -1vh rgba(0, 0, 0, 0.8);
        -moz-box-shadow: 0vw 1vh 3vh -1vh rgba(0, 0, 0, 0.8);
        box-shadow: 0vw 1vh 3vh -1vh rgba(0, 0, 0, 0.8);
        cursor: pointer;
        padding: 10px;
        text-align: center;
        line-height: 30px;
        height: 50px;
        min-width: 124px;
        display: block;
        z-index: 99;
        position: absolute;
        box-sizing: border-box;
        border-radius: 50px;
        background: #AE94DE;
        color: white;
        font-weight: bold;
        top: 40px;
        left: -62px;
        transition: all 0.3s ease-in-out;
        }
        .panel:nth-child(2) #switch.two {
        background: #F8CB98;
        }

        .auth-form:nth-child(1) {
        height: 350px;
        }
        .auth-form:nth-child(1) #form-title {
        font-size: 2em;
        font-weight: bold;
        margin: 15px;
        color: #F8CB98;
        }
        .auth-form:nth-child(1) input {
        width: 100%;
        margin: 8px 0;
        }
        .auth-form:nth-child(1) input:focus {
        border: solid #F8CB98;
        }
        .auth-form:nth-child(1) button {
        background-color: #F8CB98;
        color: white;
        margin: 20px 0;
        }

        .auth-form:nth-child(2) {
        height: 350px;
        }
        .auth-form:nth-child(2) #form-title {
        font-size: 2em;
        font-weight: bold;
        margin: 15px;
        color: #AE94DE;
        }
        .auth-form:nth-child(2) input {
        width: 100%;
        margin: 8px 0;
        }
        .auth-form:nth-child(2) input:focus {
        border: solid #AE94DE;
        }
        .auth-form:nth-child(2) button {
        background-color: #AE94DE;
        color: white;
        margin: 20px 0;
        }

        #image-side {
        position: absolute;
        width: 100%;
        height: 100%;
        left: 0;
        top: 0;
        /* background:url("../assets/img/Background-auth.jpg"); */
        background-size: auto;
        background-position: center center;
        background-repeat: no-repeat;
        }

        #image-overlay {
        display: block;
        position: absolute;
        z-index: 9;
        height: 100%;
        width: 100%;
        opacity: 0.3;
        background-color: #F8CB98;
        transition: all 0.3s ease-in-out;
        }

        #image-overlay.two {
        background-color: #AE94DE;
        }
    </style>
    <title><?=SITE_TITLE?></title>
</head>
<body>
<div id="background">
	<div id="panel-box">
		<div class="panel">
			<div class="auth-form on" id="login">
				<div id="form-title">Log In</div>
				<form action="../auth.php?action=login" method="POST">
					<input name="email" type="email" required="required" placeholder="Email" />
					<input name="password" type="password" required="required" placeholder="Password" />
					<button type="Submit">Log In</button>
				</form>
			</div>
			<div class="auth-form" id="signup">
				<div id="form-title">Register</div>
				<form action="../auth.php?action=signup" method="POST">
					<input name="username" type="text" required="required" pattern=".*\S.*" placeholder="Username" />
					<input name="email" type="email" required="required" placeholder="Email" />
					<input name="password" type="password" required="required" placeholder="Password" />
					<button type="Submit">Sign Up</button>
				</form>
			</div>
		</div>
		<div class="panel">
			<div id="switch">Sign Up</div>
			<div id="image-overlay"></div>
			<div id="image-side"></div>
		</div>
	</div>
</div>
<script src='https://code.jquery.com/jquery-3.3.1.min.js'></script>
<script>
    $('#switch').click(function(){
	$(this).text(function(i, text){
		return text === "Sign Up" ? "Log In" : "Sign Up";
	});
	$('#login').toggleClass("on");
	$('#signup').toggleClass("on");
	$(this).toggleClass("two");
	$('#background').toggleClass("two");
	$('#image-overlay').toggleClass("two");
})
</script>
</body>
</html>