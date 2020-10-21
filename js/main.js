(function($){
	var rs_spot = {
		names:[],
		spotIdPrefix:'spot_',
		spotMarkup:[],
		init:function(){
			var that = this;
			/*add new item*/
			$('body').on('click', '.add_new_vehicle', function(event) {
				event.preventDefault();
				$(this).prev('.items').append(that.getNewItemHtml($(this).attr('data-name')));
			});
			/*Delete Items*/
			$('body').on('click', '.delete_item', function(event) {
				event.preventDefault();
				$(this).closest('.row').remove();
			});
			/*Delete Group*/
			$('body').on('click', '.delete_item_group', function(event) {
				event.preventDefault();
				$(this).closest('.single_ntp_group').remove();
			});
		},
		setFromJson:function(data){
			console.log(data);
			for (var i = data.spots.length - 1; i >= 0; i--) {
				//this.addSpot(data.spots[i]);
				this.addName(data.spots[i]);
			}
		},
		addSpot:function(name){
			
			this.addName(name);
			this.displaySpotList();
			this.generateFromTo(name);
		},
		addName:function(name){
			for (var i = this.names.length - 1; i >= 0; i--) {
				if(this.names[i].name == name)
					return;
			}
			this.names[this.names.length] = {
				name:name,
				id:this.spotIdPrefix+this.names.length,
			};
		},
		removeSpot:function(name){
			
		},
		displaySpotList:function(){
			var spot = '';
			var spotInput = '';
			for (var i = this.names.length - 1; i >= 0; i--) {
				spotInput+=' <input type="hidden" name="'+this.spotIdPrefix+'all_spot[]" value="'+this.names[i].name+'"/>';
				spot+=' <button class="btn btn-info btn-sm" type="button">'+this.names[i].name+'</button>';
			}
			$('.all_spot_list').html(spot+spotInput);
		},
		generateFromTo:function(name){
			
			if(this.names.length<=1)
			{
				return;
			}
			for (var i = this.names.length - 1; i >= 0; i--) {
				if(this.names[i].name == name)
					continue;
				this.newSportMarkup(this.names[i].name,name);
			}
		},
		newSportMarkup:function(name,name2){
			var isExist = false;
			
			for (var i = this.names.length - 1; i >= 0; i--) {
				if(this.names[i].name == name){
					isExist = true;
					break;
				}
			}

			if(isExist && name2 == null){
				alert("Spot Exist");
				return;
			}
			var markupId = this.generateId(name)+'_'+this.generateId(name2);
			for (var i = this.spotMarkup.length - 1; i >= 0; i--) {
				if(this.spotMarkup[i].id == markupId)
					return;
			}
			var markup = 	'<div class="single_ntp_group">'
							+'<h6>'+name+' <strong>To</strong> '+name2+' <span>OR</span> '+name2+' <strong>To</strong> '+name+' <a  data-name="'+markupId+'"  href="" style="float: right;" class="btn btn-default btn-sm delete_item_group"><i class="fa fa-trash-alt"></i></a></h6>'
							+'<input class="form-control" name="nbp_distance['+markupId+']" required placeholder="Distance" type="text">'
							+'<div class="items">'+this.getNewItemHtml(markupId)+'</div>'
							+'<a href="javascript:void(0);" data-name="'+markupId+'" class="btn btn-info btn-block add_new_vehicle"><i class="fa fa-plus-square "></i></a>'
							+'<div>';
			var markupObj = $.parseHTML(markup);
			this.spotMarkup[this.spotMarkup.length] = {
				id:markupId,
				contents:markupObj,
			};
			$('.fare_nearby_tp').append(markupObj);
		},
		addNewItem:function(object , name){
		},
		getNewItemHtml:function(groupId){
			var html = '<div class="row">'
						+'<div class="col-xs-12 col-md-4">'
						+'<input class="form-control" name="nbp_journey_by['+groupId+'][]" required placeholder="Vehicle Name" type="text">'
						+'</div>'
						+'<div class="col-xs-12 col-md-2">'
						+'<input class="form-control" name="nbp_journey_fare['+groupId+'][]" required placeholder="Fare" type="text">'
						+'</div>'
						+'<div class="col-xs-12 col-md-6">'
						+'<input class="form-control col-sm-8" style="float:left;" name="nbp_journey_time['+groupId+'][]" required placeholder="Approximate time" type="text">'
						+'<a href="" style="float: right" class="btn btn-danger delete_item"><i class="fa fa-trash-alt"></i></a>'
						+'</div>'
						+'</div>';
			return html;

		},
		generateId:function(name){
			return this.spotIdPrefix+(name.toLowerCase()).replace(/\s/g,'')
		}
	}
	rs_spot.init();
	if($('.all_spot_list').hasClass('edit_form')){
		var jsonData = $.parseJSON($('#spot_json_data').html());
		rs_spot.setFromJson(jsonData);
	}
	$('#add_new_spot').on('click', function(event) {
		event.preventDefault();
		rs_spot.addSpot($('#make_torist_spt').val());
	});

	$('#btn_add_foods').on('click', function(event) {
		event.preventDefault();
		var html = '<div class="row">'
					+'<div class="col-xs-12 col-md-4">'
					+'<input class="form-control" name="food_name[]" required placeholder="Food Name" type="text">'
					+'</div>'
					+'<div class="col-xs-12 col-md-4">'
					+'<input class="form-control" name="food_details[]" required placeholder="Details" type="text">'
					+'</div>'
					+'<div class="col-xs-12 col-md-4">'
					+'<input class="form-control col-sm-8" style="float:left;" name="food_price[]" required placeholder="Price" type="text">'
					+'<a href="" style="float: right" class="btn btn-danger rs_remove_food"><i class="fa fa-trash-alt"></i></a>'
					+'</div>'
					+'</div>';
		$('#popular_foods_bank').append(html);	
	});
	$('#btn_add_facility').on('click', function(event) {
		event.preventDefault();
		var html = 	'<div class="row mt-2">'
					+'<div class="col-xs-12 col-md-5">'
					+'<input class="form-control" name="facility_name[]" required placeholder="Title" type="text">'
					+'</div>'
					+'<div class="col-xs-12 col-md-7">'
					+'<a href="" style="float: right" class="btn btn-danger   rs_remove_food"><i class="fa fa-trash-alt"></i></a>'
					+'<input class="form-control form-control col-md-10" name="facility_details[]" required placeholder="Details" type="text">'
					+'</div>'
					+'</div>';
		$('#facility_bank').append(html);	
	});
	$('body').on('click','.rs_remove_food', function(event) {
		event.preventDefault();
		$(this).closest('.row').remove();	
	});

	/*find spots*/
	$('#btn_spot_details').on('click', function(event) {
		event.preventDefault();
		var data = {
			"action":'find_spot',
			"id": $('#place_id').val(),
			"from": $('#spot_from').val(),
			"to": $('#spot_to').val()
		};
		$('.nearby_place').addClass('loading');
		$.post('ajax.php', data, function(res) {
			setTimeout(function(){
				$('.nearby_place').removeClass('loading');
				$('#vehiclesList').html(res);
			}, 300)
			
		});
	});

	var Package = {
		names:[]
	};
	$('#create_package').on('click', function(event) {
		event.preventDefault();
		var that = this;
		var data = {
			"action":'package_form',
		};
		$.post('ajax.php', data, function(res) {
			$("#package_canvas").append(res);
		});
	});
	$('body').on('click', '.add_item', function(event) {
		event.preventDefault();
		var packageName = $(this).closest('.single_package').find('.package_name').val();
		if(packageName.length<=0){
			alert("Type name please");
			return;
		}
		$(this).closest('.single_package').find('.package_items').append('<br /><input required class="form-control" placeholder="Details" name="items['+packageName+'][]" type="text">');
	});
	$('body').on('click', '.remove_package', function(event) {
		event.preventDefault();
		$(this).closest('.col-xs-12').remove();
	});

	$("#seat_select").on("change",function(){
		if( parseInt($(this).val()) > parseInt($(this).attr("max"))){
			alert("Seat are not available.")
			$("#total_amount").html(0);
		}else{
		 $("#total_amount").html( ($(this).val() * $(this).attr('data-price') )+"Tk" );
		}
	})

}(jQuery))