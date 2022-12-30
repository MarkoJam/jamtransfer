<?php
/* Smarty version 3.1.32, created on 2022-12-30 10:23:49
  from 'C:\wamp\www\jamtransfer\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_63aeae255a7a79_30748238',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a1818a92b5a2f041fd91a227dabc592dea38fac2' => 
    array (
      0 => 'C:\\wamp\\www\\jamtransfer\\templates\\index.tpl',
      1 => 1672299701,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageListHeader.tpl' => 1,
    'file:pageList.tpl' => 1,
  ),
),false)) {
function content_63aeae255a7a79_30748238 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo $_smarty_tpl->tpl_vars['root_home']->value;?>
">
		
		<meta charset="UTF-8">
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

		<title>WIS <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>

		<!-- LINK TAGS -->

		<!-- bootstrap local 3.0.2 -->
		
			<!-- Bootstrpa 3.3.2 cdn: -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

			<!-- font-awesome cdn: -->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<!-- font Awesome Older: -->
		<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

		<!-- Ionicons -->
		<link href="css/ionicons.min.css" rel="stylesheet" type="text/css"/>

		<!-- Morris chart -->
		<link href="css/morris/morris.css" rel="stylesheet" type="text/css"/>

		<!-- bootstrap wysihtml5 - text editor -->
		<link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" media="screen"/>
		<link href="css/bootstrap-slider/slider.css" rel="stylesheet" type="text/css"/>
		<link href="js/summernote/summernote.css" rel="stylesheet" type="text/css" media="screen"/>

		<!-- Theme style WORKING !!!-->
		<link href="css/theme.css" rel="stylesheet" type="text/css" media="screen"/>
		<!-- Preuzeto za novu administraciju -->
		<link href="css/admin.css" rel="stylesheet">

		<!-- Misc -->
		<!-- Jquery ui css: -->
		<link rel="stylesheet" href="css/jquery-ui-1.8.9.custom.css" type="text/css" />
				<!-- pickadate old: -->
				
		<!-- colors.css -->
		<link rel="stylesheet" href="css/colors.css" media="all">
		<!-- Select 2 -->
		<link rel="stylesheet" type="text/css" href="js/select/css/select2.css">

		<!--<link rel="stylesheet" href="css/simplegrid.css" media="all">!-->

				<!-- JAMTimepicker old -->
						

				
				<!-- SCRIPT TAGS: -->

				<!-- SCRIPTS -->
				<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
				<!--[if lt IE 9]>
				<?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"><?php echo '</script'; ?>
>
				<?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"><?php echo '</script'; ?>
>
				<![endif]-->

				<!-- jQuery -->
									<!-- CDN -->
					<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-2.0.2.js"><?php echo '</script'; ?>
>
				<!-- Mainly scripts -->
				<?php echo '<script'; ?>
 src="js/main.admin.js"><?php echo '</script'; ?>
>

				
								<?php echo '<script'; ?>
 src="js/datetimepicker/build/jquery.datetimepicker.full.min.js"><?php echo '</script'; ?>
>

				
				<!-- jQuery UI 1.10.3 -->
				<?php echo '<script'; ?>
 src="js/jQuery/ui/1.10.3/jquery-ui.min.js" type="text/javascript"><?php echo '</script'; ?>
>

				<!-- Bootstrap -->
									<!-- cdn: -->
					<?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"><?php echo '</script'; ?>
>    

				<!-- Morris.js charts -->
				<?php echo '<script'; ?>
 src="js/plugins/raphael/2.1.0/raphael-min.js"><?php echo '</script'; ?>
>
				<?php echo '<script'; ?>
 src="js/plugins/morris/morris.min.js" type="text/javascript"><?php echo '</script'; ?>
>
				<!-- Sparkline -->
				<?php echo '<script'; ?>
 src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"><?php echo '</script'; ?>
>
				<!-- jQuery Knob Chart -->
				<?php echo '<script'; ?>
 src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"><?php echo '</script'; ?>
>
				<!-- Bootstrap WYSIHTML5 -->
				<?php echo '<script'; ?>
 src="js/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"><?php echo '</script'; ?>
>
				<?php echo '<script'; ?>
 src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"><?php echo '</script'; ?>
>
				<?php echo '<script'; ?>
 src="js/plugins/bootstrap-slider/bootstrap-slider.js" type="text/javascript"><?php echo '</script'; ?>
>
				<!-- iCheck -->
				<?php echo '<script'; ?>
 xsrc="js/plugins/iCheck/icheck.min.js" type="text/javascript"><?php echo '</script'; ?>
>
				<!-- Validation -->
				<?php echo '<script'; ?>
 src="js/jquery.validate.min.js"><?php echo '</script'; ?>
>
				
														<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery-clock-timepicker/jquery-clock-timepicker.min.js"><?php echo '</script'; ?>
>

					<!-- Date Picker and time picker old /  -->
					
					<!-- Pick date old -->
									
				<!-- select 2 -->
				<?php echo '<script'; ?>
 src="js/select/js/select2.js"><?php echo '</script'; ?>
>

				<!-- Moment -->
				<?php echo '<script'; ?>
 src="js/moment.min.js" type="text/javascript"><?php echo '</script'; ?>
>
				<!-- App -->
				<?php echo '<script'; ?>
 src="js/theme/app.js" type="text/javascript"><?php echo '</script'; ?>
>

				<!-- Misc -->
				<?php echo '<script'; ?>
 src="js/handlebars-v1.3.0.js"><?php echo '</script'; ?>
>
				<?php echo '<script'; ?>
 src="js/jquery.slugify.js"><?php echo '</script'; ?>
>
				<?php echo '<script'; ?>
 src="js/summernote/summernote.js"><?php echo '</script'; ?>
>
				<?php echo '<script'; ?>
 src="js/jquery.toaster.js"><?php echo '</script'; ?>
>
				<?php echo '<script'; ?>
 src="lng/<?php echo $_smarty_tpl->tpl_vars['language']->value;?>
_init.js"><?php echo '</script'; ?>
>	
				<?php echo '<script'; ?>
 src="js/cms.jquery.js"><?php echo '</script'; ?>
>


		<?php if ($_smarty_tpl->tpl_vars['pageList']->value) {?>

			<?php echo '<script'; ?>
 src="js/list.js"><?php echo '</script'; ?>
>

					
				<?php echo '<script'; ?>
 type="text/javascript">
					window.root = 'plugins/<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
/';
					window.currenturl = '<?php echo $_smarty_tpl->tpl_vars['currenturl']->value;?>
';
				<?php echo '</script'; ?>
>
			

			<?php if ($_smarty_tpl->tpl_vars['isNew']->value) {?>
			<?php echo '<script'; ?>
 type="text/javascript">
				$(document).ready(function(){
					new_Item(); 
				});	
			<?php echo '</script'; ?>
>
			<?php } else { ?>

			
			<?php echo '<script'; ?>
 type="text/javascript">
				$(document).ready(function(){
					allItems(); 
					oneItem(<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
);
				});	
			<?php echo '</script'; ?>
>
			

			<?php }?>

		<?php }?>

	</head>

		<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."/templates/add-style.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

	<body class="fixed-top" style="height:100%!important;font-size:16px">
				<div class="wrapper wrapper-edit">

						<nav class="navbar-default navbar-default-edit navbar-static-side additional-class" role="navigation">
			<i class="lab la-accessible-icon"></i>
								<div class="sidebar-collapse">
					<ul class="nav metismenu" id="side-menu">
						<li class="nav-header nav-header-top-edit">
							<div class="dropdown profile-element">
								<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<span class="clear"> 
								<span class="block m-t-xs">
									<a href="profile" >
										<img src="api/showProfileImage.php?UserID=<?php echo $_SESSION['AuthUserID'];?>
" class="img-circle" alt="User Image" style="height:2em;padding:-.5em;margin:-.5em" />
										<strong class="font-bold" style="margin:0 0 0 10px;"><?php echo $_SESSION['UserRealName'];?>
</strong>
									</a>
								</span>
								<ul class="dropdown-menu animated fadeInRight m-t-xs">
									<li><a href="profile" data-param="">Profile</a></li>
									<li class="divider"></li>
									<li><a href='logout.php'>Logout</a></li>
								</ul>
							</div>
						</li>
						
						<?php if (isset($_SESSION['UseDriverName'])) {?>
													<li class="nav-header nav-header-edit">
								<h3 id="set-as">Set as:</h3>
								<h3 class="cut-name"><?php echo $_SESSION['UseDriverName'];?>
</h3>
								<a href="setout.php" id="a-setout">Setout &nbsp;<i class="fas fa-sign-out-alt"></i></a>	
							</li>
						<?php } else { ?>
							<?php if (isset($_COOKIE['UseDriverName'])) {?>	
								<li class="nav-header nav-header-edit">
									<a href="satAsDriver/<?php echo $_COOKIE['UseDriverID'];?>
" style="padding-left:0px;padding-right:0px;">
										<h3 id="set-us-2">Set as: <i class="fas fa-sign-in-alt"></i></h3>
										<h3 class="cut-name-2"><?php echo $_COOKIE['UseDriverName'];?>
</h3>
									</a>
								</li>
							<?php }?>
						<?php }?>

						<?php
$__section_index_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['menu1']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_index_0_total = $__section_index_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_index'] = new Smarty_Variable(array());
if ($__section_index_0_total !== 0) {
for ($__section_index_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] = 0; $__section_index_0_iteration <= $__section_index_0_total; $__section_index_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']++){
?>
							<li class="<?php echo $_smarty_tpl->tpl_vars['menu1']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] : null)]['active'];?>
">
								<a href='<?php echo $_smarty_tpl->tpl_vars['menu1']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] : null)]['link'];?>
' >
									<i class="fa <?php echo $_smarty_tpl->tpl_vars['menu1']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] : null)]['icon'];?>
"></i>
									<span class="nav-label" title="<?php echo $_smarty_tpl->tpl_vars['menu1']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] : null)]['description'];?>
"><?php echo $_smarty_tpl->tpl_vars['menu1']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] : null)]['title'];?>
 <span class='badge'><?php echo $_smarty_tpl->tpl_vars['menu1']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] : null)]['activestatus'];?>
</span></span> 
									<span class="<?php echo $_smarty_tpl->tpl_vars['menu1']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] : null)]['arrow'];?>
"></span>
								</a>

								
								<?php if ($_smarty_tpl->tpl_vars['menu1']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] : null)]['menu']) {?>
																		<ul class="nav nav-second-level collapse">

										<?php
$__section_index1_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['menu1']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] : null)]['menu']) ? count($_loop) : max(0, (int) $_loop));
$__section_index1_1_total = $__section_index1_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_index1'] = new Smarty_Variable(array());
if ($__section_index1_1_total !== 0) {
for ($__section_index1_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_index1']->value['index'] = 0; $__section_index1_1_iteration <= $__section_index1_1_total; $__section_index1_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_index1']->value['index']++){
?>	
											<li class="<?php echo $_smarty_tpl->tpl_vars['menu1']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] : null)]['menu'][(isset($_smarty_tpl->tpl_vars['__smarty_section_index1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index1']->value['index'] : null)]['active'];?>
">
												<a href="<?php echo $_smarty_tpl->tpl_vars['menu1']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] : null)]['menu'][(isset($_smarty_tpl->tpl_vars['__smarty_section_index1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index1']->value['index'] : null)]['link'];?>
"><span class="nav-label" title="<?php echo $_smarty_tpl->tpl_vars['menu1']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] : null)]['menu'][(isset($_smarty_tpl->tpl_vars['__smarty_section_index1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index1']->value['index'] : null)]['description'];?>
"><?php echo $_smarty_tpl->tpl_vars['menu1']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] : null)]['menu'][(isset($_smarty_tpl->tpl_vars['__smarty_section_index1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index1']->value['index'] : null)]['title'];?>
 <span class='badge'><?php ob_start();
echo $_smarty_tpl->tpl_vars['menu1']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] : null)]['menu'][(isset($_smarty_tpl->tpl_vars['__smarty_section_index1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index1']->value['index'] : null)]['activestatus'];
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
</span></span></a>

													<?php if ($_smarty_tpl->tpl_vars['menu1']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_index']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index']->value['index'] : null)]['menu'][(isset($_smarty_tpl->tpl_vars['__smarty_section_index1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_index1']->value['index'] : null)]['title'] == 'Orders') {?>
																																								<?php }?>
											</li>
										<?php
}
}
?>

									</ul>
								<?php }?>

							</li>
						<?php
}
}
?>

				   </ul> 				   
				   
				   				   <ul id="status" style="list-style-type:none;">
						<li>A - Active</li>
						<li>T - Test</li>
						<li>D - Development</li>
						<li>P - Plan</li>
				   </ul>

				</div> 				
			</nav> 
						
						
						<div id="page-wrapper" class="content gray-bg dashbard-1" style="height: 100%;
					display: flex;
					flex-direction: column;
					flex-wrap: nowrap;
					overflow: hidden;
					">

								<div class="header row border-bottom">
						
					<nav class="navbar navbar-static-top navbar-static-top-edit" role="navigation" style="margin-bottom: 0">
						<div class="navbar-header">
													<a class="navbar-minimalize minimalize-styl-2 btn btn-primary btn-primary-edit"><i class="fa fa-bars"></i> </a>
						</div>

						<div class="navbar-header">
							<button type="button" class="minimalize-styl-2 btn btn-primary btn-primary-edit" id="cashe"><i class="fas fa-redo-alt"></i></button>
						</div>

						<ul class="nav navbar-top-links navbar-right">
							<li>
								<h2><span class="m-r-sm text-muted"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</span></h2>
							</li>

							<li>
								<a href='logout.php'>
									<i class="fa fa-sign-out"></i>Logout
								</a>
							</li>

						</ul>

					</nav>
				</div> 			
				<?php if (!$_smarty_tpl->tpl_vars['isNew']->value && $_smarty_tpl->tpl_vars['pageList']->value) {?>
										<div class="header header-edit">  
						<?php $_smarty_tpl->_subTemplateRender("file:pageListHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> 				   
					</div> 				<?php }?>

				<?php if ($_smarty_tpl->tpl_vars['pageName']->value == 'Price Rules') {?>	
										<div class="header row"> 
						<div class="pull-left">
							<span>Rule: <strong><?php echo $_REQUEST['rulesType'];?>
</strong></span>
							<?php if ($_smarty_tpl->tpl_vars['routeName']->value) {?><span>Route:<strong><?php echo $_smarty_tpl->tpl_vars['routeName']->value;?>
</strong></span><?php }?>
							<?php if ($_smarty_tpl->tpl_vars['vehicleName']->value) {?><span>Vehicle:<strong><?php echo $_smarty_tpl->tpl_vars['vehicleName']->value;?>
</strong></span><?php }?>

						</div>

					</div> 				<?php }?>
				
				
								<div class="body row white-bg white-bg-edit">

					<?php if (isset($_smarty_tpl->tpl_vars['pageOLD']->value)) {?>
						NOT MODEL VIEW CONTROL
						<?php } elseif (isset($_smarty_tpl->tpl_vars['pageName']->value) && $_smarty_tpl->tpl_vars['pageName']->value != '') {?>
							<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['root']->value)."/plugins/".((string)$_smarty_tpl->tpl_vars['base']->value)."/templates/".((string)$_smarty_tpl->tpl_vars['includeFileTpl']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
							MODEL VIEW CONTROL SMARTY		
						<?php } elseif ($_smarty_tpl->tpl_vars['pageList']->value) {?>
							<?php $_smarty_tpl->_subTemplateRender("file:pageList.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> 
							MODEL VIEW CONTROL HANDLEBARS
						<?php } else { ?>
							<?php echo $_smarty_tpl->tpl_vars['page_render']->value;?>

							SEMI MODEL VIEW CONTROL via OB_GET_CONTENTS
					<?php }?>
					
				</div> 
								<div class="footer row footer-edit">

					<?php if (!$_smarty_tpl->tpl_vars['isNew']->value && $_smarty_tpl->tpl_vars['pageList']->value) {?>				
						<div id="pageSelect" class="pull-left pull-left-edit"></div>
					<?php }?>

					<div class="pull-right pull-right-edit">
						Powered by <strong>Jamtransfer</strong>
					</div>
					
					<div class="backdrop"><div class="spiner"></div></div>

				</div>


			</div> 
		</div> 

		<input type='hidden' id='local' value='<?php echo $_smarty_tpl->tpl_vars['local']->value;?>
' name='local'>
		<input type='hidden' id='success' value='<?php echo $_smarty_tpl->tpl_vars['SUCCESS']->value;?>
' name='success'>
		<input type='hidden' id='delete' value='<?php echo $_smarty_tpl->tpl_vars['DELETE_ROW']->value;?>
' name='delete'>
		

	</body>
</html>



	<?php echo '<script'; ?>
>
		document.addEventListener("keydown", function(event) {
			//event.preventDefault();
			if (event.which==121) window.open(window.location.href+'/help','_blank');
		})	
		$(document).ready(function() {
			$('.datepicker').datetimepicker({
				// yearOffset:2,
				lang:'en',
				timepicker:false,
				format:'Y-m-d',
				formatDate:'Y-m-d',
				closeOnDateSelect:true
				// minDate:'-1970/01/02', // yesterday is minimum date
				// maxDate:'+1970/01/02' // and tommorow is maximum date calendar
			});
			$('.timepicker').clockTimePicker();
		});
		
		$.ajaxSetup({
			beforeSend: function (xhr,settings) {
				return settings;
			}
		});
	<?php echo '</script'; ?>
>



<?php echo '<script'; ?>
>
	// toggleClass:
	$(document).ready(function(){
		window.success = $("#success").val();
		window.delete = $("#delete").val();
		
		$("a.navbar-minimalize").click(function(){
			// Full navbar:
			$("nav.navbar-default").toggleClass("additional-class");
			// Hide and show status on toggle:
			$("#status").toggle(100,function(){ });
		}); // End of click
	}); // End of document.ready
<?php echo '</script'; ?>
>


<?php }
}
