<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $title.' - '.APPNAME; //APPNAME defined in index.php?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="/css/admin.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

		<!-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script> -->

		<script src="/js/tinymce/tinymce.min.js"></script>

		<script>

		// tinymce.init({
		// 	selector : "textarea",
		// 	theme : "modern"
		// });


		// tinymce.init({
		// 		selector: "textarea", theme: "modern", height: 300,
		// 		plugins: [
		// 				"advlist autolink link image lists charmap print preview hr anchor pagebreak",
		// 				"searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
		// 				"table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
		// 	],
		// 	toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
		// 	toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
		// 	image_advtab: true ,

		// 	external_filemanager_path:"/filemanager/",
		// 	filemanager_title:"Responsive Filemanager" ,
		// 	external_plugins: { "filemanager" : "/filemanager/plugin.min.js"}
		// });


		// tinymce.init({
		// 			selector: "textarea",
		// 			theme: 'modern',
		// 			height: 300,
		// 			language : cur_lang, // Здесь добавлен параметр языка, значение которого соответствует языку сайта

		// 			image_advtab: true,

		//       plugins: [
		//           "advlist autolink lists link image charmap print preview anchor",
		//           "searchreplace visualblocks code fullscreen",
		//           "insertdatetime media table contextmenu paste"
		//       ],
		// 			toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
			
		// 			content_css: [
		// 			'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
		// 			]
		//   });


		tinymce.init({
		selector: 'textarea',
		theme: 'modern',
		height: 300,

		plugins: [
			'advlist autolink lists link image charmap print preview hr anchor pagebreak',
			'searchreplace wordcount visualblocks visualchars code fullscreen',
			'insertdatetime media nonbreaking save table contextmenu directionality',
			'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
		],

		// insert_toolbar: 'quickimage quicktable media codesample',
		// selection_toolbar: 'bold italic | quicklink h2 h3 blockquote',

		image_advtab: true,
		content_css: [
		'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
		]
		});

		</script>
  </head>
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="/">Admin</a></h1>
	              </div>
	           </div>
	           <div class="col-md-5">
	              <div class="row">
	                <div class="col-md-12">
	                  <div class="input-group form">
	                       <input type="text" class="form-control" placeholder="Search...">
	                       <span class="input-group-btn">
	                         <button class="btn btn-primary" type="button">Search</button>
	                       </span>
	                  </div>
	                </div>
	              </div>
	           </div>
	           <div class="col-md-2">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
                          <a href="#" data-rel="reload"><i class="dropdown-toggle glyphicon glyphicon-cog"></i></a>

	                        <ul class="dropdown-menu animated fadeInUp">
	                          <li><a href="profile.html">Profile</a></li>
	                          <li><a href="login.html">Logout</a></li>
	                        </ul>
	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>
