<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>AAGM Full Display Dashboard</title>
	<style>
		body,
		html {
			margin: 0;
			padding: 0;
			height: 100%;
			overflow: hidden;
		}

		.full-screen-container {
			display: flex;
			width: 100%;
			height: 100%;
			position: relative;
		}

		.image-container {
			flex: 1;
			display: flex;
			justify-content: center;
			align-items: center;
			background-color: black;
		}

		img {
			max-width: 100%;
			max-height: 100%;
			object-fit: contain;
			/* Ensures the entire image fits inside the container */
		}

		.button-container {
			position: fixed;
			top: 50%;
			right: 0;
			transform: translateY(-50%);
			width: 45px;
			background-color: #222;
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
			gap: 5px;
			padding: 5px;
			box-shadow: -2px 0 5px rgba(0, 0, 0, 0.5);
		}

		.image-button {
			width: 40px;
			height: 40px;
			background-color: #555;
			color: white;
			border: none;
			border-radius: 5px;
			font-size: 16px;
			cursor: pointer;
			text-align: center;
		}

		.image-button:hover {
			background-color: #777;
		}
	</style>
</head>

<body>
	<div class="full-screen-container">
		<div class="image-container">
			<img id="image" src="https://365tsel.sharepoint.com/:i:/r/sites/Analytics_Dashboard/Shared%20Documents/TV/blackscreen.png?csf=1&web=1&e=dkKav1" alt="Image Viewer">
		</div>
		<div class="button-container" id="button-container">
			<!-- Buttons will be dynamically added here -->
		</div>
	</div>

	<script>
		// Image URLs
		const images = [
			"https://365tsel.sharepoint.com/:i:/r/sites/Analytics_Dashboard/Shared%20Documents/TV/dashboard.png?csf=1&web=1&e=eRXLty",
			"https://365tsel.sharepoint.com/:i:/r/sites/Analytics_Dashboard/Shared%20Documents/TV/dashboard_2.png?csf=1&web=1&e=htiaP7",
			"https://365tsel.sharepoint.com/:i:/r/sites/Analytics_Dashboard/Shared%20Documents/TV/dashboard_8.png?csf=1&web=1&e=utnUND",
			"https://365tsel.sharepoint.com/:i:/r/sites/Analytics_Dashboard/Shared%20Documents/TV/dashboard_4.png?csf=1&web=1&e=sjFcLq",
			"https://365tsel.sharepoint.com/:i:/r/sites/Analytics_Dashboard/Shared%20Documents/TV/dashboard_5.png?csf=1&web=1&e=m7dH7a",
			"https://365tsel.sharepoint.com/:i:/r/sites/Analytics_Dashboard/Shared%20Documents/TV/dashboard_3.png?csf=1&web=1&e=iX9g4g",
			"https://365tsel.sharepoint.com/:i:/r/sites/Analytics_Dashboard/Shared%20Documents/TV/dashboard_6.png?csf=1&web=1&e=SF4OLt",
			"https://365tsel.sharepoint.com/:i:/r/sites/Analytics_Dashboard/Shared%20Documents/TV/dashboard_7.png?csf=1&web=1&e=Doe4Gp",
			"https://365tsel.sharepoint.com/:i:/r/sites/Analytics_Dashboard/Shared%20Documents/TV/dashboard_10.png?csf=1&web=1&e=xdjtdB"
		];

		let currentImageIndex = -1;

		function isBlankTime() {
			const now = new Date();
			const hours = now.getHours();
			const day = now.getDay(); // 0 = Sunday, 6 = Saturday
			return (hours >= 17 || hours < 8) || (day === 0 || day === 6);
		}

		function changeImage() {
			if (isBlankTime()) {
				document.getElementById("image").src = "https://365tsel.sharepoint.com/:i:/r/sites/Analytics_Dashboard/Shared%20Documents/TV/dashboard.png?csf=1&web=1&e=eRXLty";
			} else {
				currentImageIndex = (currentImageIndex + 1) % images.length;
				document.getElementById("image").src = images[currentImageIndex] + '?' + new Date().getTime();
			}
		}

		function showImage(index) {
			currentImageIndex = index;
			document.getElementById("image").src = images[index] + '?' + new Date().getTime();
		}

		// Create buttons dynamically
		const buttonContainer = document.getElementById('button-container');
		images.forEach((_, index) => {
			const button = document.createElement('button');
			button.className = 'image-button';
			button.textContent = (index + 1).toString();
			button.onclick = () => showImage(index);
			buttonContainer.appendChild(button);
		});

		// Initial image load
		changeImage();

		// Periodic change
		setInterval(changeImage, 300000);
	</script>
</body>

</html>