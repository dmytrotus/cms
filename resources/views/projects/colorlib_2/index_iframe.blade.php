<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>


	<style>
		body{
			margin:0;
			 height: -webkit-fill-available;
		}
		iframe{
	width: 80%;
    margin: 0 10%;
    height: -webkit-fill-available;
		}
	</style>


	
</head>
<body>

	@component('projects.header_and_footer.header')
	@endcomponent

	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium consequatur veniam alias deleniti consectetur iure est nihil voluptatibus saepe, temporibus illum officiis pariatur ratione unde rem et. Iure, rem, est?</p>

	<iframe src="{{url('/')}}/projects/colorlib1"></iframe>

	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium consequatur veniam alias deleniti consectetur iure est nihil voluptatibus saepe, temporibus illum officiis pariatur ratione unde rem et. Iure, rem, est?</p>
	
</body>
</html>