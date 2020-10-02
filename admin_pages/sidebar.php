<div class="sidebar_menu">
	<ul>
		<li class="<?php echo getMenuClass("dashboard,add_tour_place",$page); ?>">
			<a href=""><i class="fa fa-plane-departure "></i><span>Tour Places</span></a>
			<ul>
				<li><a href="admin.php?p=dashboard">All Tour Places</a></li>
				<li><a href="admin.php?p=add_tour_place">Add New</a></li>
			</ul>
		</li>
		<li class="<?php echo getMenuClass("gallery",$page); ?>"><a href=""><i class="fa fa-images"></i><span>Gallery</span></a>
			<ul>
				<li><a href="admin.php?p=gallery">All Images</a></li>
				<li><a href="admin.php?p=add_gallery">Add New</a></li>
			</ul>
		</li>
		<li class="<?php echo getMenuClass("package,package_add",$page); ?>">
			<a href="admin.php?p=package"><i class="fa fa-list-alt"></i><span>Packages</span></a>
			<ul>
				<li><a href="admin.php?p=package">All Packages</a></li>
				<li><a href="admin.php?p=package_add">Add New</a></li>
				<li><a href="admin.php?p=package_reservations">Reservations</a></li>
			</ul>
		</li>
		<li class="<?php echo getMenuClass("hotel,hotel_form",$page); ?>">
			<a href="admin.php?p=hotel"><i class="fa fa-hotel"></i><span>Hotels</span></a>
			<ul>
				<li><a href="admin.php?p=hotel">All Hotels</a></li>
				<li><a href="admin.php?p=hotel_form">Add New</a></li>
			</ul>
		</li>
		<li class="<?php echo getMenuClass("restaurants,restaurants_create,restaurants_edit",$page); ?>">
			<a href="admin.php?p=restaurants"><i class="fa fa-utensils"></i><span>Restaurants</span></a>
			<ul>
				<li><a href="admin.php?p=restaurants">All Restaurants</a></li>
				<li><a href="admin.php?p=restaurants_create">Add New</a></li>
			</ul>
		</li>
		<li class="<?php echo getMenuClass("place,place_add",$page); ?>">
			<a href="admin.php?p=place"><i class="fa fa-map-marker-alt "></i><span>All Places</span></a>
			<ul>
				<li><a href="admin.php?p=place">All Places</a></li>
				<li><a href="admin.php?p=place_add">Add New</a></li>
			</ul>
		</li>
		<li class="<?php echo getMenuClass("users",$page); ?>">
			<a href="admin.php?p=users"><i class="fa fa-users"></i><span>All Usears</span></a>
		</li>
		<li class="<?php echo getMenuClass("email_type",$page); ?>">
			<a href="admin.php?p=email_type"><i class="fa fa-mail-bulk"></i><span>Email</span></a>
		</li>
	</ul>
</div>