<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hello World</title>
	<link rel="apple-touch-icon" href="<?php echo base_url(); ?>public/img/favicon.png" sizes="180x180">
	<link rel="icon" href="<?php echo base_url(); ?>public/img/favicon.png" sizes="32x32" type="image/png">
	<link rel="icon" href="<?php echo base_url(); ?>public/img/favicon.png" sizes="16x16" type="image/png">
	<link rel="mask-icon" href="<?php echo base_url(); ?>public/img/favicon.png" color="#7952b3">
	<link rel="icon" href="<?php echo base_url(); ?>public/img/favicon.png">
	<!-- CSS HERE -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/cgpls.css" />
</head>

<body class="theme-dark">

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">Hello World</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
								<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
								<polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
								<path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
								<path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
							</svg> Dashboard</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-ad-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
								<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
								<path d="M11.933 5h-6.933v16h13v-8"></path>
								<path d="M14 17h-5"></path>
								<path d="M9 13h5v-4h-5z"></path>
								<path d="M15 5v-2"></path>
								<path d="M18 6l2 -2"></path>
								<path d="M19 9h2"></path>
							</svg> Link</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">

							<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list-details" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
								<path stroke="none" d="M0 0h24v24H0z" fill="none" />
								<path d="M13 5h8" />
								<path d="M13 9h5" />
								<path d="M13 15h8" />
								<path d="M13 19h5" />
								<rect x="3" y="4" width="6" height="6" rx="1" />
								<rect x="3" y="14" width="6" height="6" rx="1" />
							</svg> Forms
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="#">Action</a></li>
							<li><a class="dropdown-item" href="#">Another action</a></li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li><a class="dropdown-item" href="#">Something else here</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<a class="nav-link disabled">
							<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-files" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
								<path stroke="none" d="M0 0h24v24H0z" fill="none" />
								<path d="M15 3v4a1 1 0 0 0 1 1h4" />
								<path d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z" />
								<path d="M16 17v2a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2" />
							</svg>


							Links</a>
					</li>
				</ul>
				<div class="d-flex text-light">
					<span><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
							<circle cx="12" cy="12" r="9"></circle>
							<circle cx="12" cy="10" r="3"></circle>
							<path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
						</svg> CodingSometime@gmail.com</span>
				</div>
			</div>
		</div>
	</nav>


	<main class="container">
		<!-- breadcrumbs -->
		<div class="row my-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Library</a></li>
					<li class="breadcrumb-item active" aria-current="page">Hello World</li>
				</ol>
			</nav>
		</div>

		<div class="my-3 p-3 rounded shadow bg-body">
			<h5 class="border-bottom pb-2 mb-0">Hello World</h5>
			<div class="my-1 p-3 rounded">
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Email address</label>
					<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
				</div>
				<div class="mb-3">
					<label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
					<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
				</div>
				<div><?php echo button_save("Save Changes"); ?>
					<?php echo button_edit("Warning Something"); ?>
					<?php echo button_delete("Remove All"); ?></div>
			</div>

		</div>

		<div class="my-3 rounded shadow bg-body">
			<h5 class="border-bottom p-3 mb-0">Hello World</h5>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>Col 1</th>
							<th>Col 2</th>
							<th>Col 3</th>
							<th>Col 4</th>
							<th>Col 5</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Col 1</td>
							<td>Col 2</td>
							<td>Col 3</td>
							<td>Col 4</td>
							<td>Col 5</td>
						</tr>
						<tr>
							<td>Col 1</td>
							<td>Col 2</td>
							<td>Col 3</td>
							<td>Col 4</td>
							<td>Col 5</td>
						</tr>
						<tr>
							<td>Col 1</td>
							<td>Col 2</td>
							<td>Col 3</td>
							<td>Col 4</td>
							<td>Col 5</td>
						</tr>
						<tr>
							<td>Col 1</td>
							<td>Col 2</td>
							<td>Col 3</td>
							<td>Col 4</td>
							<td>Col 5</td>
						</tr>
						<tr>
							<td>Col 1</td>
							<td>Col 2</td>
							<td>Col 3</td>
							<td>Col 4</td>
							<td>Col 5</td>
						</tr>
				</table>
			</div>
			<div class="card-footer d-flex align-items-center">
				<p class="m-0 text-muted">Showing <span>1</span> to <span>8</span> of <span>16</span> entries</p>
				<ul class="pagination m-0 ms-auto">
					<li class="page-item disabled">
						<a class="page-link" href="#" tabindex="-1" aria-disabled="true">
							<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
							<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
								<path stroke="none" d="M0 0h24v24H0z" fill="none" />
								<polyline points="15 6 9 12 15 18" />
							</svg>
							prev
						</a>
					</li>
					<li class="page-item"><a class="page-link" href="#">1</a></li>
					<li class="page-item active"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item"><a class="page-link" href="#">4</a></li>
					<li class="page-item"><a class="page-link" href="#">5</a></li>
					<li class="page-item">
						<a class="page-link" href="#">
							next
							<!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
							<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
								<path stroke="none" d="M0 0h24v24H0z" fill="none" />
								<polyline points="9 6 15 12 9 18" />
							</svg>
						</a>
					</li>
				</ul>
			</div>

		</div>
	</main>


	<footer class="footer footer-transparent d-print-none mb-3">
		<div class="container-xl">
			<div class="row text-center align-items-center flex-row-reverse">
				<div class="col-lg-auto ms-lg-auto">
					<ul class="list-inline list-inline-dots mb-0">
						<li class="list-inline-item"><a href="#docs" class="link-secondary">Documentation</a></li>
						<li class="list-inline-item"><a href="#license" class="link-secondary">License</a></li>

					</ul>
				</div>
				<div class="col-12 col-lg-auto mt-3 mt-lg-0">
					<ul class="list-inline list-inline-dots mb-0">
						<li class="list-inline-item">
							Copyright &copy; 2022
							<a href="#" class="link-secondary">Coding Sometime..</a>.
							All rights reserved.
						</li>
						<li class="list-inline-item">
							<a href="#changelog" class="link-secondary" rel="noopener">
								v1.0.0-beta5
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<script src="<?php echo base_url(); ?>public/js/bootstrap.min.js"></script>
</body>

</html>