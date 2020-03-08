<!DOCTYPE html>
<html>
	<head>
		<title>SiKarang</title>
		<style>
		body {
			height: 100vh;
			
			/*background: linear-gradient(to right, #5c6a73, #ffffff, #5c6a73);*/
			background-image: url('<?php echo base_url()?>assets/images/bg-lines.jpg');
			font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
		}
		.loader {
		  border: 16px solid #f3f3f3;
		  border-radius: 50%;
		  border-top: 16px solid #3498db;
		  width: 120px;
		  height: 120px;
		  -webkit-animation: spin 2s linear infinite; /* Safari */
		  animation: spin 2s linear infinite;
		  margin-top: calc(50vh - 60px);
		  margin-left: calc(50vw - 60px);
		}
		
		/* Safari */
		@-webkit-keyframes spin {
		  0% { -webkit-transform: rotate(0deg); }
		  100% { -webkit-transform: rotate(360deg); }
		}
		
		@keyframes spin {
		  0% { transform: rotate(0deg); }
		  100% { transform: rotate(360deg); }
		}
		</style>
	</head>
<body onkeydown="fungsiKeyPress()">
<!-- Modal -->
<div id="loadingpopup" style="position: fixed; width: 100vw; height: 100vh; z-index: 1001; background-color: #333333; opacity: 0.6">
	<div class="loader"></div>
</div>