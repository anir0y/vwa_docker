<!DOCTYPE html>
<html>
<head>
	<title>Web Application Challenge</title>
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-aiZQg+3q3UzxdDGjlHBy6UvRG6ZJP5d5XQ8WJ7B5vOwzOrI/ggvofL8WY/sVJsLAVRjPpXN44gI8MUCv7nKjQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<style>
		.container {
			display: flex;
			align-items: center;
			justify-content: center;
			height: 100vh;
			width: 100%;
			flex-direction: row;
			position: relative;
		}
		.left {
			position: absolute;
			top: 50%;
			left: 10%;
			transform: translateY(-50%);
		}
		.right {
			position: absolute;
			top: 50%;
			right: 10%;
			transform: translateY(-50%);
		}
		.line {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			height: 80%;
			border-left: dotted 2px;
		}
		button {
			padding: 10px 20px;
			font-size: 16px;
			border-radius: 5px;
			background-color: #007bff;
			color: #fff;
			border: none;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="left">
			<img src="https://upload.wikimedia.org/wikipedia/commons/6/63/T%C3%9CV_S%C3%BCd_logo.svg" width="30%" height="auto"></img>
		</div>
		<div class="line"></div>
		<div class="right">
            <form action="login.php">
                <button type="submit" style="display: flex; align-items: center; justify-content: center; padding: 20px 20px; font-size: 27px; height: 30px;">
                  <i class="fal fa-sign-in" style="margin-right: 5px;"></i>
                  Let's Start!
                </button>
              </form>
              </div>
        <div class="right" style="position: relative;">
            
            <pre>
                <em>
                    you have to loign to the app and solve challenges to find all flags.
                </em>
              </pre>
        </div>
              
	</div>
</body>
</html>
